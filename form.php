<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Form Pendaftaran</title>
</head>
<body>
    <div class="header-container">
        <a href="javascript:void(0);" onclick="history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
            </svg>
        </a>
        <h2>Form Pendaftaran</h2>
        <div></div>
    </div>

    <div class="form-container">
        <form action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan Nama" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan Email" required>

            <label for="phone">Nomor Telepon:</label>
            <input type="text" id="phone" name="phone" placeholder="Masukkan Nomor Telepon" required>

            <label for="dob">Tanggal Lahir:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="file">Upload File (txt):</label>
            <input type="file" id="file" name="file" accept=".txt" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        function validateForm() {
            const name = document.getElementById("name").value.trim();
            const phone = document.getElementById("phone").value.trim();
            const file = document.getElementById("file").files[0];

            if (name.length < 3) {
                alert("Nama harus memiliki minimal 3 karakter.");
                return false;
            }

            if (!/^\d{10,13}$/.test(phone)) {
                alert("Nomor telepon harus berupa angka dan panjangnya 10-13.");
                return false;
            }

            if (file) {
                const fileSize = file.size / 1024; // KB
                const fileType = file.type;

                if (fileSize > 100) {
                    alert("File tidak boleh lebih dari 100KB.");
                    return false;
                }

                if (fileType !== "text/plain") {
                    alert("File harus berupa .txt.");
                    return false;
                }
            }

            return true;
        }
    </script>
</body>
</html>
