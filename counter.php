<?php

include'koneksi.php';

$counter = $_GET['counter'];
// $sql = "SELECT * FROM booking WHERE codeqr='$qr'";
// $result=$con->query($sql);
$query="INSERT INTO `datacounter` (`counter`) VALUES ('$counter');";
$g  = "UPDATE datacounter SET counter=$counter";
if ($con->query($g)) {
      echo "berhasil";
      } else {
          echo "Error : ". $query . "<br>" . $con->error;
      }
?>
