<?php
// Check if the file parameter is set and not empty
if(isset($_POST['file']) && !empty($_POST['file'])) {
    // Get the file path from the POST parameter
    $filePath = $_POST['file'];

    // Check if the file exists
    if(file_exists($filePath)) {
        // Set headers for file download
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        // Flush the output buffer
        ob_clean();
        flush();
        // Read the file and output its contents
        readfile($filePath);
        // Exit the script
        exit;
    } else {
        // If the file does not exist, display an error message
        echo 'File not found.';
    }
} else {
    // If the file parameter is not set or empty, display an error message
    echo 'Invalid file parameter.';
}
?>
