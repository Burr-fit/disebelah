<div class="offcanvas offcanvas-end cart-offcanvas" tabindex="-1" id="cartOffcanvas">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title">My Cart (3)</h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas">
            <i class="ri-close-line"></i>
        </button>
    </div>
    <div class="offcanvas-body">

        <div class="sidebar-title">
            <a href="#!">Clear Cart</a>
        </div>

        <div class="cart-media">
            <ul class="cart-product">
                <li>
                    <div class="media">
                        <a href="#!">
                            <img src="https://themes.pixelstrap.com/multikart/assets/images/fashion-1/product/5.jpg"
                                class="img-fluid" alt="Classic Jacket">
                        </a>
                        <div class="media-body">
                            <a href="#!">
                                <h4>Couture Edge</h4>
                            </a>
                            <h4 class="quantity">
                                <span>1 x $6.74</span>
                            </h4>

                            <div class="qty-box">
                                <div class="input-group qty-container">
                                    <button class="btn qty-btn-minus">
                                        <i class="ri-subtract-line"></i>
                                    </button>
                                    <input type="number" readonly name="qty" class="form-control input-qty"
                                        value="1">
                                    <button class="btn qty-btn-plus">
                                        <i class="ri-add-line"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="close-circle">
                                <button class="close_button edit-button" data-bs-toggle="modal"
                                    data-bs-target="#variationModal">
                                    <i class="ri-pencil-line"></i>
                                </button>
                                <button class="close_button delete-button" type="submit">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <ul class="cart_total">
                <li>
                    <div class="total">
                        <h5>Sub Total : <span>$36.74</span>
                        </h5>
                    </div>
                </li>
                <li>
                    <div class="buttons">
                        <a href="" class="btn checkout">Check Out</a>
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

        // Klik checkout → tampilkan login modal kalau belum login
        checkoutBtn.addEventListener("click", function(e) {
            if (!isLoggedIn) {
                e.preventDefault();
                loginModal.show();
            } else {
                window.location.href = "/checkout";
            }
        });

        // Manual login form
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            e.preventDefault();
            localStorage.setItem("isLoggedIn", "true");
            bootstrap.Modal.getInstance(document.getElementById("loginModal")).hide();
            window.location.href = "/checkout";
        });

        window.onload = function() {
            google.accounts.id.initialize({
                client_id: "571487130354-pskpr255fc73e097og2qff4htvb6qthl.apps.googleusercontent.com", // 👉 Ganti dengan Client ID kamu
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

        // Callback hasil login Google
        function handleCredentialResponse(response) {
            // Decode token JWT Google (dapat nama, email, dll)
            const data = parseJwt(response.credential);
            console.log("Google user:", data);

            // Simpan login di localStorage
            localStorage.setItem("isLoggedIn", "true");
            localStorage.setItem("userName", data.name);
            localStorage.setItem("userEmail", data.email);
            bootstrap.Modal.getInstance(document.getElementById("loginModal")).hide();

            // Redirect ke halaman checkout
            window.location.href = "/checkout";
        }

        // Decode JWT
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
