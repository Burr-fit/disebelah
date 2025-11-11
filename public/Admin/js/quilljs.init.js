"use strict";

function cleanQuillContent(content) {
    return content.replace(/<p><br><\/p>/g, "").trim();
}

document.addEventListener("DOMContentLoaded", function () {
    const quillInstances = {};

    for (let i = 1; i <= 7; i++) {
        const quillId = `quill-editor${i}`;
        const textareaId = `idtextarea${i}`;

        const quillElement = document.getElementById(quillId);
        const textarea = document.getElementById(textareaId);

        if (quillElement && textarea) {
            const quill = new Quill(`#${quillId}`, {
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

            quill.root.innerHTML = textarea.value;

            quill.on("text-change", function () {
                const editorContent = cleanQuillContent(quill.root.innerHTML);
                textarea.value = editorContent;
            });

            quillInstances[quillId] = { quill, textarea };
        }
    }
});
