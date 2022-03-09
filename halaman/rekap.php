<?php
session_start();
include "../include/functions.php";

if (!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
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
                        <h1 class="mt-4">Rekap Data</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">AddOns</a></li>
                            <li class="breadcrumb-item active">Rekap Data</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Lakukan Rekap Data secara Benar untuk menjaga Validasi tetap aman dalam dokumentasi. 
                                <a target="_blank" href="#">Official Data Service documentation</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-columns"></i>
                                Rekap Data
                            </div>
                            <div class="card-body">
                                <form action="rekap_data.php" name="rekap" method="POST">
                                    <div class="row md-3">
                                        <div class="col-md-4">
                                            <input type="radio" class="form-label" name="tipeRekap" value="pasien"> Data Pasien
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" class="form-label" name="tipeRekap" value="dokter"> Data Dokter
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" class="form-label" name="tipeRekap" value="poliklinik"> Data Poliklinik
                                        </div>
                                    </div><br>
                                    <div class="row md-3">
                                        <div class="col-md-6">
                                            <label for="from" class="form-label">Dari</label>
                                            <input type="date" class="form-control" name="from">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="for" class="form-label">Sampai</label>
                                            <input type="date" class="form-control" name="for"><br>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
        <script>
            function dialogHapus(urlHapus) {
                if (confirm("Apakah anda yakin ingin menghapus data Pendaftar ini?")) {
                document.location = urlHapus;
                }
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
