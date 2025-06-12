<?php
if (isset($_GET['file'])) {
    $file = urldecode($_GET['file']);
    $filepath = "uploads/" . $file;

    if (file_exists($filepath)) {
        unlink($filepath);
        echo "<script>alert('File berhasil dihapus'); window.location.href='list_fileupload.php';</script>";
    } else {
        echo "<script>alert('File tidak ditemukan'); window.location.href='list_fileupload.php';</script>";
    }
}
?>
