<?php

?>
<style>
	.table-striped tbody tr:nth-of-type(odd) {
		background-color: white;
	}

	.table-striped tbody tr:nth-of-type(even) {
		background-color: white;
	}

	.btn-group .btn {
		margin: 0 10px;
		margin-top: 5px;
		margin-bottom: 5px;
	}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> New user</button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Username</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						include 'db_connect.php';
						$users = $conn->query("SELECT * FROM users order by name asc");
						$i = 1;
						while ($row = $users->fetch_assoc()) :
						?>
							<tr>
								<td>
									<?php echo $i++ ?>
								</td>
								<td>
									<?php echo $row['name'] ?>
								</td>
								<td>
									<?php echo $row['username'] ?>
								</td>
								<td>
									<center>
										<div class="btn-group">
											<button type="button" class="btn btn-primary edit_user" data-id='<?php echo $row['id'] ?>'>Edit</button>
											<button type="button" class="btn btn-danger delete_user" data-id='<?php echo $row['id'] ?>'>Delete</button>
										</div>
									</center>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$('#new_user').click(function() {
		uni_modal('New User', 'manage_user.php')
	})
	$('.edit_user').click(function() {
		uni_modal('Edit User', 'manage_user.php?id=' + $(this).attr('data-id'))
	})
	$('.delete_user').click(function() {
		_conf("Are you sure to delete this user?", "delete_user", [$(this).attr('data-id')])
	})

	function delete_user($id) {
		console.log('delete_user called with id:', $id); // Debugging line
		$.ajax({
			url: 'ajax.php?action=delete_user',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				console.log('AJAX response:', resp); // Debugging line
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					// setTimeout(function(){
					//     location.reload()
					// },1500)
				}
			}
		})
	}

	function _conf(message, action, params) {
		if (confirm(message)) {
			window[action](...params);
		}
	}
</script>