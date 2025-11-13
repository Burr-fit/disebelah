<div class="offcanvas offcanvas-end cart-offcanvas" tabindex="-1" id="cartOffcanvas">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title">
            Keranjang Saya
        </h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas">
            <i class="ri-close-line"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="cart-media">
            <ul class="cart-product">
                <!-- Isi keranjang akan di-render di sini oleh JavaScript -->
            </ul>

            <ul class="cart_total">
                <li>
                    <div class="total">
                        <h5>Sub Total : <span></span></h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="Order" class="btn checkout">Buat Pesanan</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 rounded-3 border-0 shadow">
            <div class="modal-header border-0 pb-0">
                <h4 class="modal-title fw-bold">Masuk ke Akun</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="nama@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" placeholder="••••••••" required>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="#!" class="text-decoration-none small text-muted">Lupa kata sandi?</a>
                        <a href="#!" class="text-decoration-none small fw-semibold">Daftar baru</a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-semibold mb-3">Masuk</button>

                    <!-- Google Login Button -->
                    <div id="g_id_signin" class="d-flex justify-content-center"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Google API -->
<script src="https://accounts.google.com/gsi/client" async defer></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkoutBtn = document.querySelector(".btn.checkout");
        const loginModal = new bootstrap.Modal(document.getElementById("loginModal"));

        let isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

        if (checkoutBtn) {
            checkoutBtn.addEventListener("click", function(e) {
                if (!isLoggedIn) {
                    e.preventDefault();
                    loginModal.show();
                }
            });
        }

        document.getElementById("loginForm").addEventListener("submit", function(e) {
            e.preventDefault();
            localStorage.setItem("isLoggedIn", "true");
            bootstrap.Modal.getInstance(document.getElementById("loginModal")).hide();
            window.location.href = "/";
        });

        window.onload = function() {
            google.accounts.id.initialize({
                client_id: "571487130354-pskpr255fc73e097og2qff4htvb6qthl.apps.googleusercontent.com",
                callback: handleCredentialResponse
            });
            google.accounts.id.renderButton(
                document.getElementById("g_id_signin"), {
                    theme: "outline",
                    size: "large",
                    text: "signin_with",
                    shape: "rectangular"
                }
            );
        };

        async function handleCredentialResponse(response) {
            const data = parseJwt(response.credential);
            console.log("Google user:", data);

            localStorage.setItem("isLoggedIn", "true");
            localStorage.setItem("userName", data.name);
            localStorage.setItem("userEmail", data.email);
            localStorage.setItem("userPicture", data.picture);
            bootstrap.Modal.getInstance(document.getElementById("loginModal")).hide();

            try {
                const res = await fetch("/google-login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                            .getAttribute("content")
                    },
                    body: JSON.stringify({
                        name: data.name,
                        email: data.email,
                        picture: data.picture
                    })
                });

                const result = await res.json();
                console.log(result);

                if (result.status === "success") {
                    window.location.href = "/";
                } else {
                    alert(result.message);
                }
            } catch (err) {
                console.error("Error saving user:", err);
            }
        }

        function parseJwt(token) {
            let base64Url = token.split('.')[1];
            let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            let jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));
            return JSON.parse(jsonPayload);
        }
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const CART_KEY = "cartData";
        let cart = JSON.parse(localStorage.getItem(CART_KEY)) || [];

        const cartQtyEl = document.querySelector(".cart_qty_cls");
        const cartList = document.querySelector(".cart-product");
        const subtotalEl = document.querySelector(".cart_total span");

        const saveCart = () => localStorage.setItem(CART_KEY, JSON.stringify(cart));

        const updateCartUI = () => {
            // Render isi cart di offcanvas
            cartList.innerHTML = "";
            let subtotal = 0;

            cart.forEach((item, index) => {
                subtotal += item.harga * item.qty;
                const li = document.createElement("li");
                li.innerHTML = `
                <div class="media">
                    <a href="#!">
                        <img src="${item.gambar}" class="img-fluid" alt="${item.nama}" 
                             style="width:70px;height:70px;object-fit:cover;border-radius:8px;">
                    </a>
                    <div class="media-body">
                        <h4>${item.nama}</h4>
                        <h4 class="quantity"><span>${item.qty} x Rp ${item.harga.toLocaleString("id-ID")}</span></h4>
                        <div class="qty-box">
                            <div class="input-group qty-container">
                                <button class="btn qty-btn-minus" data-index="${index}">
                                    <i class="ri-subtract-line"></i>
                                </button>
                                <input type="number" readonly value="${item.qty}" class="form-control input-qty">
                                <button class="btn qty-btn-plus" data-index="${index}">
                                    <i class="ri-add-line"></i>
                                </button>
                            </div>
                        </div>
                        <div class="close-circle">
                            <button class="close_button delete-button" data-index="${index}">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                    </div>
                </div>`;
                cartList.appendChild(li);
            });

            // Update subtotal
            subtotalEl.textContent = `Rp ${subtotal.toLocaleString("id-ID")}`;

            // Update badge jumlah item
            const totalQty = cart.reduce((a, b) => a + b.qty, 0);
            cartQtyEl.textContent = totalQty;
            cartQtyEl.classList.add("bump");
            setTimeout(() => cartQtyEl.classList.remove("bump"), 300);

            // Simpan ke localStorage
            saveCart();
        };

        // Render saat pertama kali halaman load
        updateCartUI();

        document.querySelectorAll(".add-to-cart-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                const id = btn.dataset.id;
                const nama = btn.dataset.nama;
                const harga = parseInt(btn.dataset.harga);
                const gambar = btn.dataset.gambar;

                const existing = cart.find(i => i.id == id);
                if (existing) {
                    existing.qty += 1;
                } else {
                    cart.push({
                        id,
                        nama,
                        harga,
                        gambar,
                        qty: 1
                    });
                }

                updateCartUI();
            });
        });

        cartList.addEventListener("click", e => {
            const index = e.target.closest("button")?.dataset.index;
            if (index === undefined) return;

            if (e.target.closest(".qty-btn-plus")) cart[index].qty++;
            if (e.target.closest(".qty-btn-minus") && cart[index].qty > 1) cart[index].qty--;
            if (e.target.closest(".delete-button")) cart.splice(index, 1);

            updateCartUI();
        });

        document.querySelector(".sidebar-title a")?.addEventListener("click", e => {
            e.preventDefault();
            if (confirm("Hapus semua isi keranjang?")) {
                cart = [];
                updateCartUI();
            }
        });
    });
</script>
