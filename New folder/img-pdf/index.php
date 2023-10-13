<!DOCTYPE html>
<html>
<head>
    <title>Image to PDF Converter</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <h1>Image to PDF Converter</h1>
    <form id="imageForm" enctype="multipart/form-data">
        <input type="file" id="imageInput" accept="image/*">
        <button type="button" onclick="convertToPDF()">Convert to PDF</button>
    </form>
    <div id="result"></div>
</body>
</html>
