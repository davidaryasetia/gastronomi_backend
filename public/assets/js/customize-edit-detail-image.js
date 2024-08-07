document.addEventListener("DOMContentLoaded", function () {
    const fileInputsState = {};

    document.querySelectorAll(".file-input").forEach((input) => {
        const fileListId = "fileList" + input.id.replace("fileInput", "");
        const fileList = document.getElementById(fileListId);
        const deletePhotosInputId =
            "deletePhotosInput" + input.id.replace("fileInput", "");
        const deletePhotosInput = document.getElementById(deletePhotosInputId);

        fileInputsState[input.id] = [];

        input.addEventListener("change", function () {
            Array.from(this.files).forEach((file) => {
                if (file.type.startsWith("image/")) {
                    fileInputsState[this.id].push(file);
                }
            });

            renderFileList(fileList, fileInputsState[this.id]);
        });

        fileList.addEventListener("click", function (event) {
            if (event.target.classList.contains("delete-btn")) {
                const fileId = event.target.getAttribute("data-id");
                let deletePhotos = JSON.parse(deletePhotosInput.value);
                if (!Array.isArray(deletePhotos)) {
                    deletePhotos = [];
                }
                deletePhotos.push(parseInt(fileId)); // Convert to integer
                deletePhotosInput.value = JSON.stringify(deletePhotos);

                const itemToRemove = event.target.closest(
                    ".existing-file-item"
                );
                itemToRemove.parentNode.removeChild(itemToRemove);
            }
        });
    });

    function renderFileList(fileList, files) {
        const existingItems = fileList.querySelectorAll(".existing-file-item");
        fileList.innerHTML = "";
        existingItems.forEach((item) => fileList.appendChild(item));

        files.forEach((file, index) => {
            const fileItem = document.createElement("div");
            fileItem.className = "file-item";

            const img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.onload = () => URL.revokeObjectURL(img.src);

            const deleteBtn = document.createElement("button");
            deleteBtn.className = "delete-btn";
            deleteBtn.innerHTML = "&times;";
            deleteBtn.addEventListener("click", () => {
                files.splice(index, 1);
                renderFileList(fileList, files);
            });

            fileItem.appendChild(img);
            fileItem.appendChild(deleteBtn);
            fileList.appendChild(fileItem);
        });
    }
});
