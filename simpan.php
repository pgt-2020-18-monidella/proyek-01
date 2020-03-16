<?php 

include "koneksi.php";
$a  = $_REQUEST['a'];
$b  = $_REQUEST['b'];
$c = $a+$b;
  echo "<name=c value=$c>";
$mysqli  = "INSERT INTO perhitungan (a, b, c) VALUES ('$a', '$b', '$c')";
$result  = mysqli_query($conn, $mysqli);
if ($result) {
echo "$c";
} 
//else {
// echo "Gabisa Input";
//}
//mysqli_close($conn);
?>