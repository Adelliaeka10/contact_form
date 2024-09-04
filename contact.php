<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Contact Form</h2>

        <?php
        // Koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "t3e";

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $database);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil data dari form
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $kelas = $_POST['kelas'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $pesan = $_POST['pesan'];

            // Query untuk memasukkan data
            $sql = "INSERT INTO data (nama, nim, kelas, gender, email, pesan) VALUES ('$nama', '$nim', '$kelas', '$gender', '$email', '$pesan')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Data berhasil disimpan!</p>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select id="kelas" class="form-control" name="kelas" required>
                    <option value="T3A">T3A</option>
                    <option value="T3B">T3B</option>
                    <option value="T3C">T3C</option>
                    <option value="T3D">T3D</option>
                    <option value="T3E">T3E</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" class="form-control" name="gender" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
            <a href="data.php" class="btn btn-secondary">Lihat Data</a>
        </form>
    </div>

</body>
</html>

<?php require_once('footer.php'); ?>
