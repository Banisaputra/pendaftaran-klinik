<?php
session_start();
include "include/functions.php";

if(isset($_COOKIE["id"])&& isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// mengambil email berdasar id
	$result = mysqli_query($conn, "SELECT email FROM users WHERE id_user = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie username
	if($key === hash('sha256', $row['email'])){
		$_SESSION['login'] = true;
	}
}

if(isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}

// mengecek apakah tombol login sudah ditekan atau belum
if( isset($_POST["login"])) {
	$id_user = $_POST["inputid"];
	$password = $_POST["inputPassword"];
	// cek username dan password dalam data base 
	$result = mysqli_query($conn, "SELECT * FROM users WHERE id_user = '$id_user'");

	if( mysqli_num_rows($result) === 1 ) {
		$row = mysqli_fetch_assoc($result);
        // if(password_verify($password, $row['password']))
		if($password === $row["password"]) {
			// set session
            $_SESSION['user'] = $row['id_user'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['level'] = $row['level'];
			$_SESSION["login"] = true;
			// cek remember
			if(isset($_POST["inputRememberMe"])){
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['nama']), time()+60);
			}
			
			header("Location: index.php");
			exit;
		}
	}
	$error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <img src="images/logo1.png" alt="logo1" class="avatar">
                                    </div>
                                    <h4 class="text-center font-weight-light my-1">Login Account</h4>
                                    <?php if(isset($error)):?>
                                        <script>alert('Email atau Password Salah')</script>
                                    <?php endif; ?>
                                    
                                    <div class="card-body">
                                        <form action="" name="formLogin" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="inputid" id="inputid" type="text" placeholder="ID Pasien.." required  />
                                                <label for="inputid">ID Pasien</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="inputPassword" id="inputPassword" type="password" placeholder="Password" required/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name='inputRememberMe' id="inputRememberMe" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberMe">Remember Me</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <?php
                include 'include/footer.php';
                ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

