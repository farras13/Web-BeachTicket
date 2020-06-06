 <?php
  include 'koneksi.php';
  
$qr=$_GET["qr"];
$sql = "SELECT * FROM booking WHERE codeqr='$qr'";
$result=$con->query($sql);

    if ($result -> num_rows >0){
      //echo "berhasil";
      $sql2 = "SELECT * FROM booking WHERE codeqr='$qr'";
      $result1=mysqli_query($con, $sql2);
      $cari=mysqli_fetch_assoc($result1);
      $isi=$cari['kodepan'];

      if($isi != 1){
        $byk = substr("$qr",0,1);
        if ("$byk" == 1 ){
        echo "1111111111111 ";
        }
        if ("$byk" == 2 ){
        echo "111111111111 ";
        }
        if ("$byk" == 3 ){
        echo "1111";
        }
        if ("$byk" == 4 ){
        echo "11111";
        }
        if ("$byk" == 5 ){
        echo "111111";
        }
        if ("$byk" == 6 ){
        echo "11111111";
        }
        if ("$byk" == 7 ){
        echo "111111111";
        }
        if ("$byk" == 8 ){
        echo "1111111111";
        }
         if ("$byk" == 9 ){
        echo "11111111111";
        }

      } else {
        echo "111";
      }      

      $query="UPDATE `booking` SET `kodepan` = '1' WHERE `booking`.`codeqr` = '$qr'";
      $memek=mysqli_query($con, $query);

    }else{
      echo"1";
  }
?>