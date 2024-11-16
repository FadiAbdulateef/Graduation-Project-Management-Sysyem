document.getElementById('file-upload').addEventListener('change', function() {
    var fileInfo = document.getElementById('file-info');
    fileInfo.textContent = 'الملف المحدد: ' + this.files[0].name;
});
