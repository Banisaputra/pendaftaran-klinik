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
$daftar = query("SELECT * FROM pendaftaran WHERE id_daftar = '$id'")[0];

// cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	// cek apakah data berhasil diubah atau tidak
	if (edit_daftar($_POST) > 0) {
		echo "
			<script>
			alert('Data Pendaftar Berhasil diubah!');
			document.location.href = 'daftar.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('Data gagal diubah! - tidak ada perubahan data');
			document.location.href = 'daftar.php';
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
                        <h1 class="mt-4">Data Pendaftaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">Interface</a></li>
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">Service</a></li>
                            <li class="breadcrumb-item active">Data Pendaftaran</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Lakukan penggantian Data Pendaftaran secara Benar untuk menjaga Validasi tetap aman dalam dokumentasi. 
                                <a target="_blank" href="#">Official Data Service documentation</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit"></i>
                                Dokter Edit Form
                            </div>
                            <div class="card-body">
                                <form action="" name='form_pendaftar' method="POST">
                                    <input type="hidden" name="id_daftar" value="<?=$daftar['id_daftar']?>">
                                    <div class="md-3">
                                        <label class="form-label" for="nama">Nama Pasien</label>
                                        <input class="form-control" type="text" name="nama" value="<?=$daftar['nama']?>">
                                    </div>
                                    <div class="row md-3">
                                        <div class="col-md-4">
                                            <label for="no_rm" class="form-label">No.Rm</label>
                                            <input type="text" class="form-control" name="no_rm" value="<?=$daftar['no_rm']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="tgl_periksa">Tanggal Periksa</label>
                                            <input class="form-control" type="date" name="tgl_periksa" value="<?=$daftar['tgl_periksa']?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" for="poliklinik">Poliklinik</label>
                                            <input class="form-control" type="text" name="poliklinik" value="<?=$daftar['poliklinik']?>"><br>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
