<?php session_start() ?>
<div class="container-fluid">
	<form action="" id="signup-frm">
		<div class="form-group">
			<label for="name" class="control-label">Name</label>
			<input type="text" id="name" name="name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="contact" class="control-label">Contact</label>
			<input type="text" id="contact" name="contact" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="address" class="control-label">Address</label>
			<textarea id="address" cols="30" rows="3" name="address" required="" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="email" class="control-label">Email</label>
			<input type="email" id="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="password" class="control-label">Password</label>
			<input type="password" id="password" name="password" required="" class="form-control">
		</div>
		<button class="btn btn-info btn-sm" style="background-color: #007bff;  font-size:large;">Create</button>
	</form>
</div>

<style>
	#uni_modal .modal-footer {
		display: none;
	}
</style>
<script>
	$('#signup-frm').submit(function(e) {
		e.preventDefault();
		$('#signup-frm button[type="submit"]').attr('disabled', true).html('Saving...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'admin/ajax.php?action=signup',
			method: 'POST',
			data: $(this).serialize(),
			error: function(err) {
				console.log(err);
				$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
			},
			success: function(resp) {
				if (resp == 1) {
					location.reload();
				} else {
					$('#signup-frm').prepend('<div class="alert alert-danger">Email already exists.</div>');
					$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		});
	});
</script>