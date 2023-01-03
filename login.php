<?php
include "inc/koneksi.php";
   
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
	<link rel="icon" href="assets/img/logo.png">
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<style>
		body {
			background-color: lightseagreen;
		}
	</style>

</head>
<div class="container">
	<div class="row text-center ">
		<div class="col-md-12">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
	</div>
	<div class="row ">

		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
			<div class="panel panel-success">
				<div class="panel-heading">
					<center>
						<h5>
							<b>Aplikasi Pendataan Tagihan Air</b>
						</h5>
						<center>
				</div>
				<div class="panel-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<br />
						<div class="form-group input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<input type="text" class="form-control" placeholder="Masukkan Username " name="username" required autofocus autocomplete="off" />
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock"></i>
							</span>
							<input type="password" class="form-control" placeholder="Masukkan Password" name="password" required/>
						</div>

						<div>
							<button type="submit" class="btn btn-primary" name="btnLogin" title="Masuk Sistem" /> Login </button>
							<p> Belum punya account? <a href="register.php">Daftar</a></p>
						</div>
					</form>
				</div>
			</div>
			<center>
				<h5>
					
						<b>
				</h5>
			</center>
		</div>


	</div>
</div>

<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


</body>

</html>

<?php 
		if (isset($_POST['btnLogin'])) {  
            $sql_login = "SELECT * FROM tb_user WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
			$query_login = mysqli_query($koneksi, $sql_login);
			$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
            $jumlah_login = mysqli_num_rows($query_login);
        

            if ($jumlah_login ==1 ){
                session_start();
                $_SESSION["ses_id"]=$data_login["id_user"];
                $_SESSION["ses_nama"]=$data_login["nama_user"];
                $_SESSION["ses_username"]=$data_login["username"];
                $_SESSION["ses_password"]=$data_login["password"];
                $_SESSION["ses_level"]=$data_login["level"];
                $_SESSION["ses_rek"]=$data_login["no_rek"];
//alert login
                echo "<script>
                        Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'http://localhost/tagihanair';
                            }
                        })</script>";
			}else{
			    echo "<script>
                        Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'login';
                            }
                        })</script>";
            }
        }
			
