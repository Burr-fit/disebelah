"use strict";

function cleanQuillContent(content) {
    return content.replace(/<p><br><\/p>/g, "").trim();
}

document.addEventListener("DOMContentLoaded", function () {
    const quillInstances = {};

    function initQuillEditor(quillId, textareaId) {
        const quillEl = document.getElementById(quillId);
        const textareaEl = document.getElementById(textareaId);

        if (!quillEl || !textareaEl) return null;

        const quill = new Quill(`#${quillId}`, { theme: "snow" });
        quill.root.innerHTML = textareaEl.value;

        quill.on("text-change", function () {
            textareaEl.value = cleanQuillContent(quill.root.innerHTML);
        });

        return quill;
    }

    function resetQuillEditor(i) {
        const quillId = `quill-editor${i}`;
        const textareaId = `idtextarea${i}`;
        const wrapper = document.getElementById(quillId)?.parentNode;

        // console.log(quillId, textareaId);
        if (!wrapper) return;

        const oldEditor = document.getElementById(quillId);
        if (oldEditor) oldEditor.remove();

        const newEditor = document.createElement("div");
        newEditor.id = quillId;
        newEditor.style.height = "200px";
        wrapper.appendChild(newEditor);

        quillInstances[i] = initQuillEditor(quillId, textareaId);
    }

    function setupModalQuillReset(modalId, indexes = []) {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        modal.addEventListener("show.bs.modal", function () {
            indexes.forEach((i) => {
                resetQuillEditor(i);
            });
        });

        modal.addEventListener("hidden.bs.modal", function () {
            indexes.forEach((i) => {
                const textarea = document.getElementById(`idtextarea${i}`);
                if (textarea) textarea.value = "";
            });
        });
    }

    function setupModalQuillResetOnce(modalId, indexes = []) {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        let initialized = false;

        modal.addEventListener("show.bs.modal", function () {
            if (!initialized) {
                indexes.forEach((i) => {
                    const quillId = `quill-editor${i}`;
                    const textareaId = `idtextarea${i}`;
                    quillInstances[i] = initQuillEditor(quillId, textareaId);
                });
                initialized = true;
            }
        });

        modal.addEventListener("hidden.bs.modal", function () {
            indexes.forEach((i) => {
                const textarea = document.getElementById(`idtextarea${i}`);
                if (textarea) textarea.value = "";
            });
        });
    }

    setupModalQuillResetOnce("modalAdd", [1, 2, 3, 4, 5]);
    setupModalQuillReset("modalEdit", [6, 7, 8, 9, 10]);
});
