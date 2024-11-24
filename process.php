<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $dob = trim($_POST["dob"]);
    $file = $_FILES["file"];

    // Validasi server-side
    if (strlen($name) < 3) {
        die("Nama minimal 3 karakter.");
    }

    if (!preg_match("/^\d{10,13}$/", $phone)) {
        die("Nomor telepon tidak valid.");
    }

    if ($file["size"] > 100 * 1024 || $file["type"] !== "text/plain") {
        die("File harus berupa .txt dan tidak lebih dari 100KB.");
    }

    // Upload file
    $uploadDir = "uploads/";
    $filePath = $uploadDir . basename($file["name"]);
    if (!move_uploaded_file($file["tmp_name"], $filePath)) {
        die("Gagal mengunggah file.");
    }

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO pendaftaran (name, email, phone, dob, file_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $dob, $filePath);
    if (!$stmt->execute()) {
        die("Gagal menyimpan data: " . $stmt->error);
    }

    header("Location: result.php");
}
?>
