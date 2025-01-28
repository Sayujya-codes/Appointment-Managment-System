<style>
	.square {
		width: 250px;
		/* Adjust the width to make it a square */
		height: 700px;
		/* Adjust the height to make it a square */
		background-color: #f5fbff;
		/* Light blue color */
	}
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark'>

	<div class="sidebar-list">

		<a href="index.php?page=home" class="nav-item nav-home" style="background-color: #48cae4; color:black; margin-bottom:5px; font-size:20px"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
		<a href="index.php?page=appointments" class="nav-item nav-appointments" style="background-color: #48cae4; color:black; margin-bottom:5px;font-size:20px"><span class='icon-field'><i class="fa fa-calendar"></i></span> Appointments</a>
		<a href="index.php?page=doctors" class="nav-item nav-doctors" style="background-color: #48cae4; color:black; margin-bottom:5px;font-size:20px"><span class='icon-field'><i class="fa fa-user-md"></i></span> Doctors</a>
		<a href="index.php?page=categories" class="nav-item nav-categories" style="background-color: #48cae4; color:black; margin-bottom:5px;font-size:20px"><span class='icon-field'><i class="fa fa-book-medical"></i></span> Medical Specialties</a>
		<?php if ($_SESSION['login_type'] == 1) : ?>
			<a href="index.php?page=users" class="nav-item nav-users" style="background-color: #48cae4; color:black; font-size:20px"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
			<!-- <a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cog"></i></span> Site Settings</a> -->
			<div class="square"></div>
		<?php endif; ?>
	</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php if ($_SESSION['login_type'] == 2) : ?>
	<style>
		.nav-sales,
		.nav-users,
		.nav-doctors,
		.nav-categories {
			display: none !important;
		}
	</style>
<?php endif ?>