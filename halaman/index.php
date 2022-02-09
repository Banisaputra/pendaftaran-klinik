<?php
session_start();
include '../include/functions.php';

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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Pedaftaran</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="tune_up.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Jadwal Praktek</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Daftar Dokter</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">Poliklinik</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Praktek Hari ini &nbsp
                                <?php
                                $date = date('d - F - Y');
                                echo ($date);
                                ?>
                            </div>
                            <div class="card-body">
                                <table class="table" method="GET" id="datatablesSimple">
                                <thead>
                                    <th>Poliklinik</th>
                                    <th>Dokter</th>
                                    <th>Spesialis</th>
                                    <th>Jam Pelayanan</th>
                                </thead>
                                <tbody>
                                <?php
                                    $tanggal = date('d - m - Y');
                                    $day = date('D', strtotime($tanggal));
                                    $dayList = array(
                                        'Sun' => 'Minggu',
                                        'Mon' => 'Senin',
                                        'Tue' => 'Selasa',
                                        'Wed' => 'Rabu',
                                        'Thu' => 'Kamis',
                                        'Fri' => 'Jumat',
                                        'Sat' => 'Sabtu'
                                    );
                                    $id = $_SESSION['user'];
                                    $sql = "SELECT * FROM jadwal WHERE hari ='$dayList[$day]' ORDER BY ID DESC";
                                    $query = $conn->query($sql);
                                    while($row = $query->fetch_assoc()){
                                    echo "
                                        <tr>
                                        <td>".$row['poliklinik']."</td>
                                        <td>".$row['dokter']."</td>
                                        <td>".$row['spesialis']."</td>
                                        <td>".$row['jam_praktek']."</td>
                                        
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
