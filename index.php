<?php
//MulaiSession
session_start();

//IncludeKoneksi
include("koneksi.php");

//VariableValidasi
$errorUsername = "";
$errorPassword = "";
$errorData = "";

//Submit
if(isset($_POST['login'])){
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars(md5($_POST['password']));
	
	//ValidasiInput
	if(empty($username) || empty($password)){
		$errorUsername = "Username tidak boleh kosong";
		$errorPassword = "Password tidak boleh kosong";
	}else{
		$result = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");
		$count = mysqli_num_rows($result);
		
		if($count > 0){
			$data = mysqli_fetch_assoc($result);
			
			if($data['akses'] == 1){
				$_SESSION['username'] = $username;
				$_SESSION['akses'] = "superadmin";
				
				echo "<script>alert('Login Sukses');window.location.href = 'dashboard.php';</script>";
			}else{
				header("location.index.php?pesan=Gagal");
			}
		}else{
			$errorData = "Data tidak terdaftar";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pemesanan Makanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container contain">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
            <div class="card shadow-lg" style="margin-top:170px">
                <div class="card-body">
                <h1>Login Aplikasi</h1>
                <hr>
                <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="username...">
                    <small id="username" class="form-text text-muted">Masukan username dengan benar.</small>
                    <span class="text-danger"><?= $errorUsername; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password...">
                    <span class="text-danger"><?= $errorPassword; ?></span>
                </div>
                <button type="submit" class="btn btn-success btn-block" name="login">Sign In</button>
                <span class="text-danger"><?= $errorData; ?></span>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>