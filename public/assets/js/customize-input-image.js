 // Create an object to hold files for each input
 const fileInputsState = {};

 document.querySelectorAll('.file-input').forEach(input => {
     // Initialize file state for each input
     fileInputsState[input.id] = [];

     input.addEventListener('change', function() {
         const fileListId = 'fileList' + this.id.replace('fileInput', '');
         const fileList = document.getElementById(fileListId);

         // Add new files to the existing files array
         Array.from(this.files).forEach(file => {
             if (file.type.startsWith('image/')) {
                 fileInputsState[this.id].push(
                     file); // Add new files to the corresponding input
             }
         });

         renderFileList(fileList, fileInputsState[this.id]); // Render the updated file list
     });
 });

 function renderFileList(fileList, files) {
     fileList.innerHTML = ''; // Clear the previous file list

     files.forEach((file, index) => {
         const fileItem = document.createElement('div');
         fileItem.className = 'file-item';

         const img = document.createElement('img');
         img.src = URL.createObjectURL(file);
         img.onload = () => URL.revokeObjectURL(img.src); // Free memory

         const fileName = document.createElement('span');
         fileName.textContent = file.name;

         const deleteBtn = document.createElement('button');
         deleteBtn.className = 'delete-btn';
         deleteBtn.innerHTML = '&times;';
         deleteBtn.addEventListener('click', () => {
             files.splice(index, 1); // Remove the file from the files array
             renderFileList(fileList, files); // Re-render the file list
         });

         fileItem.appendChild(img);
         fileItem.appendChild(fileName);
         fileItem.appendChild(deleteBtn);
         fileList.appendChild(fileItem);
     });
 }