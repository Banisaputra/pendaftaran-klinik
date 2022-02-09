<?php
// connect to database
$conn = mysqli_connect("localhost","root","","project_01");

// fungsi query
function query ($query) {
	global $conn;
	$result = mysqli_query ($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
  

// PASIEN ---->
// fungsi input tune up
function add_users($data){
	global $conn;
	$nama = ucwords($_POST['nama']); 
	$tgl_lahir = $_POST['tgl_lahir'];
	$usia = $_POST['usia'];
	$level = $_POST['level'];
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$agama = $_POST['agama'];
	$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// cek email sudah ada
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if( mysqli_fetch_assoc($result)) {
		echo "<script>
			alert('Email sudah terdaftar!')
			</script>";
		return false;
	}

    // cek konfirmasi password
    // if($password1 !== $password2){
	// 	echo "<script>
	// 		alert('konfirmasi password tidak sesuai');
	// 		</script>";
	// 	return false;
	// } 
	// enkripsi password
	// $password = password_hash($password, PASSWORD_DEFAULT);

	// random id_user
	$letters = '';
	$numbers = '';
	foreach(range('A', 'Z')as $char){
		$letters .= $char;
	}
	for($i=0; $i<10; $i++){
		$numbers .= $i;
	}
	$id_user = substr(str_shuffle($letters),0 ,3).substr(str_shuffle($numbers),0 ,9);

	mysqli_query($conn, "INSERT INTO users VALUES (NULL,'$id_user','$nama','$tgl_lahir','$agama','$usia','$alamat','$email','$level','$password')");

	return mysqli_affected_rows($conn);
	
}

function delete_pasien($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM users WHERE id_user = '$id'");
	return mysqli_affected_rows($conn);
}

function edit_pasien($data) {
	global $conn;
	// ambil data dari tiap element dalam form
	$id = ($_POST["id_user"]);
	$nama = ucwords($_POST['nama']); 
	$tgl_lahir = $_POST['tgl_lahir'];
	$usia = $_POST['usia'];
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$agama = $_POST['agama'];
	$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
	// query insert data
	$query = "UPDATE users SET nama ='$nama', tgl_lahir = '$tgl_lahir', usia= '$usia', email = '$email', agama = '$agama', alamat = '$alamat' WHERE id_user = '$id'";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// DOKTER --->
// input Dokter
function add_dokter($data){
	global $conn;
	$nama = htmlspecialchars(ucwords($_POST['nama']));
	$id_dokter = htmlspecialchars(strtoupper($_POST['id_dokter']));
	$spesialis = htmlspecialchars(ucwords($_POST['spesialis']));

	$query = "INSERT INTO dokter VALUES (NULL,'$id_dokter','$nama','$spesialis')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// edit dokter
function edit_dokter($data){
	global $conn;
	$nama = htmlspecialchars(ucwords($_POST['nama']));
	$id_dokter = $_POST['id_dokter'];
	$id_dokter2 = htmlspecialchars(strtoupper($_POST['id_dokter2']));
	$spesialis = htmlspecialchars(ucwords($_POST['spesialis']));

	$query = "UPDATE dokter SET nama='$nama', id_dokter='$id_dokter2', spesialis='$spesialis' WHERE id_dokter='$id_dokter'";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
		
}

// delete dokter
function delete_dokter($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM dokter WHERE id_dokter = '$id'");
	return mysqli_affected_rows($conn);
}















?>