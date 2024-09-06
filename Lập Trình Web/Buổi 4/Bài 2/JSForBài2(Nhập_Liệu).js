document.addEventListener('DOMContentLoaded', function() {
    var fileInput = document.getElementById('fileupload');
    var fileInfo = document.getElementById('file-info');
    var browser = document.getElementById('p_input_area');
    var browser2 = document.getElementById('p_input_area_2');
    var maxFileSize = 1; 
    

    document.getElementById('custom-upload').addEventListener('click', function() {
        fileInput.click();
    });

    fileInput.addEventListener('change', function() {
        if (fileInput.files.length > 0) {
            var file = fileInput.files[0];
            var fileName = file.name;
            var fileSize = file.size;
            var fileSizeInMB = (fileSize / (1024 * 1024)).toFixed(2);

            if (fileSizeInMB > maxFileSize) {
                fileInfo.style.display = 'none';
                browser.textContent = `Your file is too large. The maximum possible size of the file is ${maxFileSize}MB.`;
                browser2.style.display = 'none';
            } else {
                browser.style.display = 'none';
                browser2.style.display = 'none';
                fileInfo.textContent = `Selected file: ${fileName} (${fileSizeInMB} MB)`;
            }
        } else {
            browser.textContent = `Browse Files`;
            browser.style.display = 'block';
            browser2.style.display = 'block';
        }
    });
});
