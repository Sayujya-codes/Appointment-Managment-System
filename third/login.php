<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="login-frm">
		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control" style="font-size: 25px;">
			<a href="javascript:void(0)" id="new_account">Create New Account</a>
		</div>
		<button class="button btn btn-info btn-sm" style="background-color: #007bff; font-size:large;">Login</button>
	</form>
</div>

<style>
	/* Custom CSS styles */
	#login-frm {
		max-width: 400px;
		/* Example max-width for the form */
		margin: 0 auto;
		padding: 20px;
		background-color: #f8f9fa;
		/* Example background color */
		border: 1px solid #ccc;
		/* Example border */
		border-radius: 5px;
		margin-top: 20px;
		/* Example margin top */
	}

	#login-frm .form-group {
		margin-bottom: 20px;
	}

	#login-frm label {
		font-weight: bold;
	}

	#login-frm button {
		margin-top: 10px;
	}

	#login-frm small {
		display: block;
		margin-top: 10px;
	}

	#login-frm small a {
		color: #007bff;
		/* Example link color */
		text-decoration: none;
	}

	#login-frm small a:hover {
		text-decoration: underline;
	}

	#uni_modal .modal-footer {
		display: none;
	}
</style>

<script>
	$(document).ready(function() {
		$('#new_account').click(function() {
			uni_modal("Create an Account", 'signup.php?redirect=index.php?page=checkout');
		});

		$('#login-frm').submit(function(e) {
			e.preventDefault();
			$('#login-frm button[type="submit"]').attr('disabled', true).html('Logging in...');
			if ($(this).find('.alert-danger').length > 0)
				$(this).find('.alert-danger').remove();
			$.ajax({
				url: 'admin/ajax.php?action=login2',
				method: 'POST',
				data: $(this).serialize(),
				error: err => {
					console.log(err);
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				},
				success: function(resp) {
					if (resp == 1) {
						location.href = '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
					} else {
						$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>');
						$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
					}
				}
			});
		});
	});
</script>