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
// fungsi input pasien
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
// delete pasien
function delete_pasien($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM users WHERE id_user = '$id'");
	return mysqli_affected_rows($conn);
}
// edit pasien
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

// poliklinik
// input poliklinik
function add_poliklinik($data){
	global $conn;
	$nama = $_POST['nama'];
	$id_poli = $_POST['id_poliklinik'];

	$query = "INSERT INTO poliklinik VALUES (NULL, '$id_poli', '$nama')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// edit poliklinik
function edit_poliklinik($data){
	global $conn;
	$nama = htmlspecialchars(ucwords($_POST['nama']));
	$id_poli1 = $_POST['id_poliklinik'];
	$id_poli = htmlspecialchars(strtoupper($_POST['id_poli2']));

	
	mysqli_query($conn, "UPDATE poliklinik SET id_poliklinik='$id_poli', nama='$nama' WHERE id_poliklinik='$id_poli1'");

	return mysqli_affected_rows($conn); 
	
}

// delete poliklinik
function delete_poliklinik($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM poliklinik WHERE id_poliklinik = '$id'");
	return mysqli_affected_rows($conn);

}

// Jadawal Praktek
// jadwal input
function add_jadwal($data){
	global $conn;
	$id_dokter = $_POST['id_dokter'];
	$poli = $_POST['poliklinik'];
	$dokter = $_POST['dokter'];
	$spesialis = $_POST['spesialis'];
	$hari = $_POST['hari'];
	$jam1 = $_POST['jam_praktek_awal'];
	$jam2 = $_POST['jam_praktek_akhir'];

	$query = "INSERT INTO jadwal VALUES (NULL, '$id_dokter', '$poli', '$dokter', '$spesialis', '$hari', '$jam1', '$jam2')";
	mysqli_query ($conn, $query);

	return mysqli_affected_rows($conn);
}

// jadwal edit
function edit_jadwal($data){
	global $conn;
	$id = $_POST['ID'];
	$id_dokter = $_POST['id_dokter'];
	$poli = $_POST['poliklinik'];
	$dokter = $_POST['dokter'];
	$spesialis = $_POST['spesialis'];
	$hari = $_POST['hari'];
	$jam1 = $_POST['jam_praktek_awal'];
	$jam2 = $_POST['jam_praktek_akhir'];

	mysqli_query($conn, "UPDATE jadwal SET id_dokter='$id_dokter', poliklinik='$poli', dokter='$dokter', spesialis='$spesialis', hari='$hari', jam_praktek_awal='$jam1', jam_praktek_akhir='$jam2' WHERE ID = $id");

	return mysqli_affected_rows($conn);

}

// delete jadwal
function delete_jadwal($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM jadwal WHERE ID = '$id'");
	return mysqli_affected_rows($conn);

}

// pendaftaran
// daftar input
function add_daftar($data){
	global $conn;
	$nama = $_POST['nama'];
	$no = $_POST['no_rm'];
	$poli = $_POST['poliklinik'];
	$tgl = $_POST['tgl_periksa'];

	$letters = 'DF';
	$numbers = '';
	 
	for($i=0; $i<10; $i++){
		$numbers .= $i;
	}
	$id_daftar = $letters.substr(str_shuffle($numbers),0 ,5);

	mysqli_query($conn, "INSERT INTO pendaftaran VALUES (NULL, '$id_daftar', '$no', '$nama', '$tgl', '$poli')");
	return mysqli_affected_rows($conn);

}

// edit daftar
function edit_daftar($ata){
	global $conn;
	$id = $_POST['id_daftar'];
	$nama = $_POST['nama'];
	$no = $_POST['no_rm'];
	$poli = $_POST['poliklinik'];
	$tgl = $_POST['tgl_periksa'];

	mysqli_query($conn, "UPDATE pendaftaran SET no_rm='$no', nama='$nama', tgl_periksa='$tgl', poliklinik='$poli' WHERE id_daftar='$id'");
	return mysqli_affected_rows($conn);
}

// delete daftar
function delete_daftar($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM pendaftaran WHERE id_daftar ='$id'");
	return mysqli_affected_rows($conn);

}








?>