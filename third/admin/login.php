<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Admin | Doctor's Appointment System</title>

	<?php include('./header.php'); ?>
	<?php include('./db_connect.php'); ?>
	<?php
	session_start();
	if (isset($_SESSION['login_id']))
		header("location:index.php?page=home");

	?>
</head>
<style>
	body {
		width: 100%;
		height: calc(100%);
	}

	main#main {
		width: 100%;
		height: calc(100%);
		background-color: white;
		display: flex;
		align-items: center;
		justify-content: center;
		margin-top: 85px;

	}

	#login-right {
		width: 100%;
		max-width: 500px;
		background: white;
		padding: 40px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		border-radius: 8px;
		text-align: center;
	}

	#login-right .card {
		margin: auto;
	}

	.logo {
		font-size: 8rem;
		/* background: #90ffff87; */
		padding: .5em 0.7em;
		border-radius: 50% 50%;
		color: #000000b3;
		margin-bottom: 20px;
		background-image: url(C:\OXampp\htdocs\third\assets\img\admin.png);
	}
</style>

<body>
	<main id="main">
		<div id="login-right">
			<div class="logo" style="background-image: url(C:\OXampp\htdocs\third\assets\img\admin.png);">
				<span class="fa fa-laptop-medical"></span>
			</div>
			<h3>Welcome to the Admin Login</h3>
			<div class="card col-md-12">
				<div class="card-body">
					<form id="login-form">
						<div class="form-group">
							<label for="username" class="control-label">Username</label>
							<input type="text" id="username" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="password" class="control-label">Password</label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary" style="font-size: large;">Login</button></center>
					</form>
				</div>
			</div>
		</div>
	</main>

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>
<script>
	$('#login-form').submit(function(e) {
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'ajax.php?action=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
			},
			success: function(resp) {
				if (resp == 1) {
					location.href = 'index.php?page=home';
				} else if (resp == 2) {
					location.href = 'voting.php';
				} else {
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>

</html>