<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAMIK</title>
    <style>
        table, tr, td, th{
            border: 1px solid black;
        }
        table{
            width: 50%;
        }
    </style>
</head>
<body>
    <h1>SISTEM INFORMASI AKADEMIK</h1>
    <h1>SIAMIK</h1>
    <table id="tabel_krs">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Semester</th>
            <th>Alamat</th>
            <th>Pilih</th>
            
        </tr>

        <?php
            include "../koneksi.php";
            $nidn = $_SESSION['nidn'];
            $sql = "SELECT * FROM mahasiswa WHERE nidn = '$nidn'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row['npm'] ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['jurusan'] ?></td>
                     <td><?php echo $row['semester'] ?></td>
                    <td><?php echo $row['alamat'] ?></td>
                    <td><button><a href="krs.php?param=<?php echo $row['npm'] ?>">KRS</a></button></td>
                </tr>
        <?php
                }
            }
        ?>
    </table>
    <!-- <a href="login.php">Kembali</a><br> -->
    <a href="login.php">Keluar</a>
</body>
</html>