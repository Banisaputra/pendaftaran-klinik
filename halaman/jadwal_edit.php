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
$jadwal = query("SELECT * FROM jadwal WHERE ID = '$id'")[0];

// cek tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
	// cek apakah data berhasil diubah atau tidak
	if (edit_jadwal($_POST) > 0) {
		echo "
			<script>
			alert('Data Pasien Berhasil diubah!');
			document.location.href = 'jadwal.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('data gagal diubah! - tidak ada perubahan data');
			document.location.href = 'jadwal.php';
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
                        <h1 class="mt-4">Data Jadwal Praktek</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">Interface</a></li>
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">Service</a></li>
                            <li class="breadcrumb-item active">Data Jadwal Praktek</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Lakukan penggantian Data Jadwal Praktek secara Benar untuk menjaga Validasi tetap aman dalam dokumentasi. 
                                <a target="_blank" href="#">Official Data Service documentation</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit"></i>
                                Jadwal Praktek Form
                            </div>
                            <div class="card-body">
                                <form action="" name='form_jadwal' method="POST">
                                <input type="hidden" name='ID' value="<?=$jadwal['ID']?>">
                                    <div class="md-3">
                                        <label class="form-label" for="nama">Nama Dokter</label>
                                        <input class="form-control" type="text" name="dokter" value="<?=$jadwal['dokter']?>">
                                    </div>
                                    <div class="row md-3">
                                        <div class="col-md-3">
                                            <label class="form-label" for="id_dokter">ID Dokter</label>
                                            <input class="form-control" type="text" name="id_dokter" value="<?=$jadwal['id_dokter']?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="hari">Hari</label>
                                            <select class="form-select" name="hari" id="hari" required>
                                                <option value="<?=$jadwal['hari']?>" active><?=$jadwal['hari']?></option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jum'at</option>
                                                <option value="Sabtu">Sabtu</option>
                                                <option value="Minggu">Minggu</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="jam_praktek_awal">Praktek Awal</label>
                                            <input class="form-control" type="time" name="jam_praktek_awal" id="jam_praktek1" value="<?=$jadwal['jam_praktek_awal']?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="jam_praktek_akhir">Praktek Akhir</label>
                                            <input class="form-control" type="time" name="jam_praktek_akhir" id="jam_praktek2" value="<?=$jadwal['jam_praktek_akhir']?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="spesialis">Spesialis</label>
                                            <input class="form-control" type="text" name="spesialis" placeholder="Spesialis" value="<?=$jadwal['spesialis']?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="poliklinik" class="form-label">Poliklinik</label>
                                            <input type="text" class="form-control" name="poliklinik" placeholder="Poliklinik" value="<?=$jadwal['poliklinik']?>"><br>
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-primary" type="submit" name="submit">Update</button>
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
