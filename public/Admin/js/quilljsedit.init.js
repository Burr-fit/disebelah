function normalizeNbsp(html) {
    if (!html) return "";
    return html.replace(/&nbsp;/gi, " ").replace(/\u00a0/g, " ");
}

function cleanQuillContent(html) {
    if (!html) return "";
    return normalizeNbsp(html)
        .replace(/\u200B/g, "")
        .replace(/<p>(?:\s|&nbsp;|\u00a0|<br\s*\/?>)*<\/p>/gi, "")
        .trim();
}

document.addEventListener("show.bs.modal", (e) => {
    if (e.target.id !== "modalEdit") return;
    if (e.target.contains(document.activeElement)) {
        document.activeElement.blur();
    }
});

document.addEventListener("shown.bs.modal", (e) => {
    if (e.target.id !== "modalEdit") return;

    const editor = e.target.querySelector("#quill-editor2");
    const ta = e.target.querySelector("#idtextarea2");
    const form = e.target.querySelector("#formModalEdit");

    if (editor && !editor.dataset.inited) {
        quill2 = new Quill(editor, {
            theme: "snow",
            modules: {
                toolbar: [
                    ["bold", "italic", "underline"],
                    [{ list: "bullet" }, { list: "ordered" }],
                    ["link"],
                    ["clean"],
                ],
            },
        });

        const cleaned = cleanQuillContent(ta?.value || "");
        if (cleaned) {
            quill2.clipboard.dangerouslyPasteHTML(0, cleaned);
        } else {
            quill2.setContents([{ insert: "\n" }], "silent");
        }

        quill2.on("text-change", () => {
            if (!ta) return;
            const raw =
                typeof quill2.getSemanticHTML === "function"
                    ? quill2.getSemanticHTML()
                    : quill2.root.innerHTML;
            ta.value = raw;
        });

        editor.dataset.inited = "1";
    }

    if (form && !form.dataset.boundSync) {
        form.addEventListener(
            "submit",
            () => {
                if (!quill2 || !ta) return;
                const raw =
                    typeof quill2.getSemanticHTML === "function"
                        ? quill2.getSemanticHTML()
                        : quill2.root.innerHTML;

                const cleaned = cleanQuillContent(raw);

                if (quill2.getText().trim() === "") {
                    ta.value = "";
                } else {
                    ta.value = cleaned;
                }
            },
            true
        );
        form.dataset.boundSync = "1";
    }
});

document.addEventListener("hidden.bs.modal", (e) => {
    if (e.target.id !== "modalEdit") return;
    quill2 = null;
});
