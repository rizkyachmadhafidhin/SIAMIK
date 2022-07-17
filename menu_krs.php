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
    <h1>KARTU RENCANA STUDI</h1>
    <a href="tambah_krs.php">Tambah KRS</a><br>

    <?php $npm = $_SESSION['npm'];?>
    <?php $nama = $_SESSION['nama'];?>
    <p>NPM: <?php echo $npm;?></p>
    <p>Nama: <?php echo $nama;?></p>

    <table id="tabelkrs">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Kelas</th>
            <th>Kunci</th>
        </tr>

        <?php
            include "koneksi.php";
            $nomor_krs = 1;

            $sql = "SELECT * FROM krs WHERE npm = '$npm'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td>
                        <?php 
                            echo $nomor_krs;
                        ?>
                    </td>
                    <td><?php echo $row['kode_mk'] ?></td>
                    <td><?php echo $row['nama_mk'] ?></td>
                    <td><?php echo $row['sks'] ?></td>
                    <td><?php echo $row['kelas'] ?></td>
                    <td><?php if ($row['kunci'] == 1){
                            echo 'KRS Disetujui';
                        } ?></td>
                    <?php 
                        $nomor_krs++;
                    ?>
                </tr>
        <?php
                }
            }
            else {
        ?>
                <tr>
                    <td colspan="6">TIDAK ADA DATA</td>
                </tr>
                <?php
            }
        ?>
    </table>
    <a href="welcome.php">Kembali</a><br>
    <a href="welcome.php">Beranda</a>
</body>
</html>