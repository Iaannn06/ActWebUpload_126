<!DOCTYPE html>
<html>
<head>
    <title>Daftar File</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        a.button {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 3px;
            font-size: 14px;
        }
        .hapus { background: #e74c3c; }
        .hapus:hover { background: #c0392b; }
        .unduh { background: #3498db; }
        .unduh:hover { background: #2980b9; }
    </style>
</head>
<body>

<h2>Daftar File yang Telah Diupload</h2>

<?php
if (isset($_GET['uploadsuccess'])) {
    echo "<p style='color:green;'>✅ File berhasil diunggah!</p>";
}

$dir = "uploads/";

if (is_dir($dir)) {
    $files = scandir($dir);
    $files = array_diff($files, array('.', '..'));

    if (count($files) > 0) {
        echo "<table><tr><th>No</th><th>Nama File</th><th>Aksi</th></tr>";
        $no = 1;
        foreach ($files as $file) {
            $encoded = urlencode($file);
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td><a href='$dir$file' target='_blank'>$file</a></td>";
            echo "<td>
                    <a class='button unduh' href='$dir$encoded' download>Unduh</a>
                    <a class='button hapus' href='upload.php?file=$encoded' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                  </td>";
            echo "</tr>";
            $no++;
        }
        echo "</table>";
    } else {
        echo "<p>⚠️ Tidak ada file yang diunggah.</p>";
    }
} else {
    echo "<p>❌ Folder uploads tidak ditemukan.</p>";
}
?>

<p><a href="index.html">← Kembali ke Upload</a></p>

</body>
</html>
