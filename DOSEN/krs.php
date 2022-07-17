<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KRS</title>
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
    <h1>ACC KRS</h1>

    <table id="tabel_krs">
        <tr>
            <th>ID KRS</th>
            <th>NPM</th>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <!-- <th>hari_mk</th> -->
            <th>Kategori</th>
            <th>Kunci</th>
        </tr>

        <?php
            include "../koneksi.php";

            $id = $_GET['param'];
            $sql = "SELECT * FROM krs WHERE npm = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row['id_krs'] ?></td>
                    <td><?php echo $row['npm'] ?></td>
                    <td><?php echo $row['kode_mk'] ?></td>
                    <td><?php echo $row['nama_mk'] ?></td>
                    <td><?php echo $row['sks'] ?></td>
                    <!-- <td><?php echo $row['hari_mk'] ?></td> -->
                    <td><?php echo $row['kategori'] ?></td>
                    <td><?php if ($row['kunci'] == 0){
                    echo '<button><a href="kunci.php?param='.$row['id_krs'].'">ACC</a></button>';
                }else{
                        echo 'KRS Disetujui!';
                    } ?></td>
                    
                </tr>
        <?php
                }
            }
        ?>
    </table>
    <a href="welcome_dosen.php">Kembali</a><br>
    <a href="login.php">Beranda</a>
</body>
</html>