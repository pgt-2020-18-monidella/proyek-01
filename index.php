<?php 

?>
<!DOCTYPE html>
<html>
<head>
<title>Hitung</title>
</head>
<body><center>
<h3>Coba Hitung Geh</h3>
<hr></hr>
  <form method="get" action="">
    A : <input type="number" name="a" /><br />
    B : <input type="number" name="b" /><br />
    <input type="submit" name="count" value="Hitung" /><br />
  </form>
  <h3>Hasil Perhitungan</h3>
  <hr></hr>
<table border="1">
	<tr>
<th width="80px">NO.</th>
<th width="80px">A</th>
<th width="80px">B</th>
<th width="80px">HASIL</th>
<th width="80px">KET</th>
</tr>
<tbody>
  <?php
if (isset($_GET['count'])) {
    
    $a=$_GET['a'];
	$b=$_GET['b'];
    $c=$a+$b;
    echo "$c";
    
	if ($c>=85) {
        $ket="A";
        echo "Nilai anda adalah $ket";
	}

	elseif ($c>=75) {
        $ket="B";
        echo "Nilai anda adalah $ket";
	}

	elseif ($c>=65) {
        $ket="C";
        echo "Nilai anda adalah $ket";
	}

	elseif ($c>=55) {
        $ket="D";
        echo "Nilai anda adalah $ket";
	}

	elseif ($c<55) {
        $ket="E";
        echo "Nilai anda adalah $ket";

    }
    $conn = mysqli_connect("localhost", "root", "", "hitung") or die ("Koneksi gagal");
$sql = mysqli_query($conn, "INSERT INTO perhitungan(a, b, c, ket) VALUES('$a', '$b', '$c', '$ket')") or die(mysqli_error($conn));
}

if (isset($_GET['count'])){
    
    //query ke database SELECT tabel mahasiswa urut berdasarkan idyang paling besar
    $sql = mysqli_query($conn, "SELECT * FROM perhitungan") or die(mysqli_error($conn));
    //jika query diatas menghasilkan nilai > 0 maka menjalankan script dibawah if...
    if(mysqli_num_rows($sql) > 0){
    //membuat variabel $no untuk menyimpan nomor urut
    $no = 1;
    //melakukan perulangan while dengan dari dari query $sql
    while($data = mysqli_fetch_assoc($sql)){
    //menampilkan data perulangan
    echo '
    <tr>
    <td>'.$no.'</td>
    <td>'.$data['a'].'</td>
    <td>'.$data['b'].'</td>
    <td>'.$data['c'].'</td>
    <td>'.$data['ket'].'</td>
    </tr>
    ';
    $no++;
    }
    //jika query menghasilkan nilai 0
    }else{
    echo '
    <tr>
    <td colspan="6">Tidak ada data.</td>
    </tr>
    ';
    }
    
    }
    ?>
</body></center>
</html>