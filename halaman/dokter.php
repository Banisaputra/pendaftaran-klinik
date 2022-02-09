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
                        <h1 class="mt-4">Data Dokter</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">Interface</a></li>
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">Service</a></li>
                            <li class="breadcrumb-item active">Data Dokter</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Lakukan Pengecekan Data Dokter secara berkala untuk menjaga Validasi tetap aman dalam dokumentasi. 
                                <a target="_blank" href="#">Official Data Service documentation</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-columns"></i>
                                Record Data Dokter
                            </div>
                            <div class="card-body">
                                <a href="dokter_add.php"><button class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Tambah Dokter</button></a><br><br>
                                <table class="table" method="GET" id="datatablesSimple">
                                <thead>
                                    <th>ID Dokter</th>
                                    <th>Nama</th>
                                    <th>Spesialis</th>
                                    <th>Tools</th>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM dokter ORDER BY ID DESC";
                                    $query = $conn->query($sql);
                                    while($row = $query->fetch_assoc()){
                                    echo "
                                        <tr>
                                        <td>".$row['id_dokter']."</td>
                                        <td>".$row['nama']."</td>
                                        <td>".$row['spesialis']."</td>
                                        <td>
                                            <a href='dokter_edit.php?id=".$row['id_dokter']."'><button class='btn btn-success'><i class='fa fa-edit'></i>Edit</button></a>
                                            <a href=javascript:dialogHapus('dokter_delete.php?id=".$row['id_dokter']."')><button class='btn btn-danger'><i class='fa fa-trash'></i>Delete</button></a>
                                        </td>
                                        </tr>
                                    ";
                                    }
                                ?>
                                </tbody>
                                </table>
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
                if (confirm("Apakah anda yakin ingin menghapus data Dokter ini?")) {
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
