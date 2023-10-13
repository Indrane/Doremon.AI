<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_FILES['image']['tmp_name'];
    
    // Generate a unique filename for the PDF
    $pdfFileName = 'converted_' . time() . '.pdf';

    // Create PDF using ImageMagick (make sure ImageMagick is installed on your server)
    $command = "convert $image $pdfFileName";
    exec($command, $output, $returnCode);

    if ($returnCode === 0) {
        // File conversion successful, prompt the user to download the PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $pdfFileName . '"');
        readfile($pdfFileName);

        // Delete the temporary PDF file
        unlink($pdfFileName);
    } else {
        // File conversion failed
        echo 'File conversion failed.';
    }
}
?>
