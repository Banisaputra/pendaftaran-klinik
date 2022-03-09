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
                        <h1 class="mt-4">Data Pendaftaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">Interface</a></li>
                            <li class="breadcrumb-item"><a style="text-decoration:none; color: inherit" href="#">Aktifitas</a></li>
                            <li class="breadcrumb-item active">Pendaftaran Pasien</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Lakukan pengelolaan Data Pendaftaran secara Benar untuk menjaga Validasi tetap aman dalam dokumentasi. 
                                <a target="_blank" href="#">Official Data Service documentation</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-columns"></i>
                                Pendaftaran Form
                            </div>
                            <div class="card-body">
                                <a href="daftar_add.php"><button class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Tambah Daftar</button></a><br><br>
                                <table class="table" method="GET" id="datatablesSimple">
                                <thead>
                                    <th>No</th>
                                    <th>ID Pendaftaran</th>
                                    <th>Nama Pasien</th>
                                    <th>No Rm</th>
                                    <th>Poliklinik</th>
                                    <th>Tanggal Periksa</th>
                                    <?php
                                    if($_SESSION['level']=='staff'){
                                        echo "<th>Tools</th>";
                                    }?> 
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM pendaftaran";
                                    $query = $conn->query($sql);$i = 1;
                                    while($row = $query->fetch_assoc()){
                                    echo "
                                    <tr> 
                                        <td>".$i."</td>
                                        <td>".$row['id_daftar']."</td>
                                        <td>".$row['nama']."</td>
                                        <td>".$row['no_rm']."</td>
                                        <td>".$row['poliklinik']."</td>
                                        <td>".$row['tgl_periksa']."</td>";
                                        $i++;
                                        if($_SESSION['level']=='staff'){
                                            echo "
                                            <td>
                                                <a href='daftar_edit.php?id=".$row['id_daftar']."'><button class='btn btn-success'><i class='fa fa-edit'></i>Edit</button></a>
                                                <a href=javascript:dialogHapus('daftar_delete.php?id=".$row['id_daftar']."')><button class='btn btn-danger'><i class='fa fa-trash'></i>Delete</button></a>
                                            </td>";}
                                    echo"</tr>";
                                    }?>
                                    
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
