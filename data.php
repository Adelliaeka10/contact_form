<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <div class="container mt-5">
            <h2 class="text-center">Data</h2>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "t3e";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            $sql = "SELECT nama, nim, kelas, gender, email, pesan FROM data";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table table-striped'><thead><tr><th>Nama</th><th>NIM</th><th>Kelas</th><th>Gender</th><th>Email</th><th>Pesan</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["nama"] . "</td><td>" . $row["nim"] . "</td><td>" . $row["kelas"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["email"] . "</td><td>" . $row["pesan"] . "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>Tidak ada data ditemukan.</p>";
            }

            $conn->close();
            ?>

            <a href="contact.php" class="btn btn-secondary">Kembali</a>
        </div>
        
        <?php require_once('footer.php'); ?>
    </body>
</html>
