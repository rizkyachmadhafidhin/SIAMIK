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
    <h1>KRS</h1>
    <p>Nama: <?php echo $_SESSION['nama'];?></p>
    <p>NPM: <?php echo $_SESSION['npm'];?></p>

    <table id="tabel_krs_matkul">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Jurusan</th>
            <th>Pilih</th>
        </tr>

        <?php
            include "koneksi.php";
            $nomormatkul = 1;

            $sql = "SELECT * FROM mata_kuliah";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td>
                        <?php 
                            echo $nomormatkul;
                        ?>
                    </td>
                    <td><?php echo $row['kode_mk'] ?></td>
                    <td><?php echo $row['nama_mk'] ?></td>
                    <td><?php echo $row['sks'] ?></td>
                    <td><?php echo $row['jurusan'] ?></td>                    
                    <td><button><a href="inputdata.php?param=<?php echo $row['kode_mk'] ?>">Select</a></button></td>
                    <?php 
                        $nomormatkul++;
                    ?>
                </tr>
        <?php
                }
            }
        ?>
    </table>
    <a href="menu_krs.php">Kembali</a><br>
    <a href="welcome.php">Beranda</a>
</body>
</html>