<?php
include 'koneksi.php';

// Ambil semua data dari database
$result = $conn->query("SELECT * FROM pendaftaran");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Hasil Pendaftaran</title>
</head>
<body>
    <div class="header-container">
        <a href="javascript:void(0);" onclick="history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
            </svg>
        </a>
        <h2>Daftar Pendaftar</h2>
        <div></div>
    </div>

    <div class="result-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Tanggal Lahir</th>
                <th>Nama File</th>
                <th>Tanggal Daftar</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row["id"]) ?></td>
                    <td><?= htmlspecialchars($row["name"]) ?></td>
                    <td><?= htmlspecialchars($row["email"]) ?></td>
                    <td><?= htmlspecialchars($row["phone"]) ?></td>
                    <td><?= htmlspecialchars($row["dob"]) ?></td>
                    <td><a target="_blank" href="<?php echo $row["file_name"] ?>"><?= htmlspecialchars(basename($row["file_name"])) ?></a></td>
                    <td><?= htmlspecialchars($row["created_at"]) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
