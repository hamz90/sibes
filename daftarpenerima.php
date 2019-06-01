<?php

include_once("koneksi.php");


$result = mysqli_query($koneksi, "SELECT * FROM penerima ORDER BY id DESC");
?>

<html>
<head>    
    <title>Data Penerima</title>
	<link rel ="stylesheet" type="text/css" href="style.css">
</head>

<body>

<center>
    <table width='50%' border=1>

    <tr>
	<br><center><b><big>Daftar Penerima Beasiswa</b></big></center></br>
        <th>Nama</th> <th>Npm</th> <th>Jurusan</th> <th>Fakultas</th> <th>AKSI</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['npm']."</td>";
        echo "<td>".$user_data['jurusan']."</td>";
		echo "<td>".$user_data['fakultas']."</td>";
        echo "<td><a href='update.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
	
    </table>
</center>
<center><a href="inputpenerima.php">Tambah Penerima</a><br/><br/></center>
</body>
</html>