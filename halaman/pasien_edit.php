<?php
session_start();
include "../include/functions.php";

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}

// mengambil data dalam URL
$id = $_GET["id"];
// query data berdasar id
$pasien = query("SELECT * FROM users WHERE id_user = '$id'")[0];

// cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	// cek apakah data berhasil diubah atau tidak
	if (edit_pasien($_POST) > 0) {
		echo "
			<script>
			alert('Data Pasien Berhasil diubah!');
			document.location.href = 'pasien.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('data gagal diubah! - tidak ada perubahan data');
			document.location.href = 'pasien.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    include '../include/header.php';
    ?>
    <body class="sb-nav-fixed">
        <?php
        include '../include/navbar.php';
        ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php
                include '../include/navside.php';
                ?>
            </div>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Pasien</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">Interface</a></li>
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">Service</a></li>
                            <li class="breadcrumb-item active">Data Pasien</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Lakukan penggantian Data Pasien secara Benar untuk menjaga Validasi tetap aman dalam dokumentasi. 
                                <a target="_blank" href="#">Official Data Service documentation</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit"></i>
                                Pasien Edit Form
                            </div>
                            <div class="card-body">

                                <form action="" name='form_pasien' method="POST">
                                    <input type="hidden" name='id_user' value="<?=$pasien['id_user']?>">
                                    <div class="md-3">
                                        <label class="form-label" for="nama">Nama Pasien</label>
                                        <input class="form-control" type="text" name="nama" value="<?=$pasien['nama']?>">
                                    </div>
                                    <div class="row md-3">
                                        <div class="col-md-4">
                                            <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                            <input class="form-control" type="date" name="tgl_lahir" value="<?=$pasien['tgl_lahir']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="usia">Usia</label>
                                            <input class="form-control" type="number" name="usia" value="<?=$pasien['usia']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="agama">Agama</label>
                                            <select class="form-select" name="agama" id="agama" >
                                                <option value="<?=$pasien['agama']?>" active><?=$pasien['agama']?></option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katholik">Katholik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="email">Email</label>
                                            <input class="form-control" type="email" name='email' value="<?=$pasien['email']?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" value="<?=$pasien['password']?>" disabled>
                                        </div>
                                    </div>
                                    <div class="md-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="5" ><?=$pasien['alamat']?></textarea><br>
                                    </div>
                                    <button class="btn btn-success" type="submit" name="submit">Update</button>
                                    <button class="btn btn-secondary" type="button" onclick="history.back();">Cancle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <?php
                include '../include/footer.php';
                ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
