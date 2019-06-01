<?php
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $nama=$_POST['nama'];
    $npm=$_POST['npm'];
    $jurusan=$_POST['jurusan'];
	$fakultas=$_POST['fakultas'];

    // update user data
    $result = mysqli_query($koneksi, "UPDATE penerima SET nama='$nama',npm='$npm',jurusan='$jurusan',fakultas='$fakultas' WHERE id='$id'");

    // Redirect to homepage to display updated user in list
    header("Location: daftarpenerima.php");
}
?>
<?php

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM penerima WHERE id='$id'");

while($user_data = mysqli_fetch_array($result))
{
    $nama=$user_data['nama'];
    $npm=$user_data['npm'];
    $jurusan=$user_data['jurusan'];
	$fakultas=$user_data['fakultas'];
}
?>
<html>
<head>  
    <title>Edit User Data</title>
	<link rel ="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <a href="daftarpenerima.php">Daftar Penerima</a>
    <br><br/>
	<br><b><big><center>Edit Data Penerima Beasiswa</center></big></b></br>
    <center><form name="update_user" method="post" action="update.php">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama; ?>></td>
            </tr>
            <tr> 
                <td>Npm</td>
                <td><input type="text" name="npm" value=<?php echo $npm; ?>></td>
            </tr>
            <tr> 
                <td>jurusan</td>
                <td><input type="text" name="jurusan" value=<?php echo $jurusan; ?>></td>
            </tr>
			<tr> 
                <td>fakultas</td>
                <td><input type="text" name="fakultas" value=<?php echo $fakultas;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>