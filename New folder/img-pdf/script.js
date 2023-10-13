function convertToPDF() {
    var imageInput = document.getElementById('imageInput');
    var file = imageInput.files[0];

    if (file) {
        var formData = new FormData();
        formData.append('image', file);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'convert.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var result = document.getElementById('result');
                result.innerHTML = '<a href="' + xhr.responseText + '" target="_blank">Download PDF</a>';
            } else {
                alert('Error occurred while converting image to PDF.');
            }
        };
        xhr.send(formData);
    } else {
        alert('Please select an image file.');
    }
}
