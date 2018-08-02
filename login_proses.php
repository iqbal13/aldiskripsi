<?php 

	include 'config/koneksi.php';

	if($_POST){

		$email  =$_POST['email'];
		$password = $_POST['password'];
		$password  =md5($password);

		$query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
		$run = mysqli_query($conn,$query);

		$cek = mysqli_fetch_array($run);
		if(count($cek) == 0){

			echo "<script>alert('Maaf Email atau Password anda salah')</script>";
			echo "<script>window.open('login.php','_self')</script>";


		}else{
			session_start();
			$username = $cek['username'];
			$email = $cek['email'];
			$id = $cek['id'];

			$_SESSION['username'] = $username;
			$_SESSION['email'] = $email;
			$_SESSION['id'] = $id;

			echo "<script>alert('Login berhasil')</script>";
			echo "<script>window.open('index.php','_self')</script>";

		}



	}else{


	}


	?>