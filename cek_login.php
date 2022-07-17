<?php

include "koneksi.php";
session_start();

if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $password = $_POST['pass'];

  $sql = "SELECT * FROM mahasiswa WHERE npm='$user' and password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<script>window.location.href='welcome.php'</script>";
    }
  } else {
        echo "LOGIN GAGAL!";
  }
}

$_SESSION['user'] = $user;

$conn->close();
?>