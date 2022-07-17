<?php
include "../koneksi.php";
session_start();

if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM dosen WHERE nidn ='$user' and password ='$pass'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $_SESSION['nidn'] = $user;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['mk'] = $data['nama_mk'];
            echo "<script>window.location.href='welcome_dosen.php'</script>";
        }
    }

    else{
        echo "LOGIN GAGAL!";
    }
}

$_SESSION['user'] = $user;

$conn->close();
?>