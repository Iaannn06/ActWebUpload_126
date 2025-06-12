<?php
$target_dir = "uploads/";


if (isset($_GET['file'])) {
    $file = urldecode($_GET['file']);
    $filepath = $target_dir . $file;

    if (file_exists($filepath)) {
        unlink($filepath);
        echo "<script>alert('File berhasil dihapus'); window.location.href='list_fileupload.php';</script>";
    } else {
        echo "<script>alert('File tidak ditemukan'); window.location.href='list_fileupload.php';</script>";
    }
    exit;
}

// Upload file
if (isset($_POST["submit"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location: list_fileupload.php?uploadsuccess=1");
        exit;
    } else {
        echo "<script>alert('Maaf, upload gagal.'); window.location.href='index.html';</script>";
    }
}
?>
