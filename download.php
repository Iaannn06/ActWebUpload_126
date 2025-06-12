<?php
if (isset($_GET['file'])) {
    $filename = basename($_GET['file']); 
    $filepath = 'Uploads/' . $filename;

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        echo "❌ File tidak ditemukan.";
    }
} else {
    echo "❗ Parameter file tidak ditemukan.";
}
?>
