<?php include 'admin/db_connect.php';

$special = $conn->query("SELECT * FROM medical_specialty");
$ms_arr = array();
while ($row = $special->fetch_assoc()) {
	$ms_arr[$row['id']] = $row['name'];
}
?>
<header class="masthead">
	<div class="container h-100">
		<div class="masthead-text">
			Get help from our <br> BEST DOCTORS<br>
		</div>
		<div class="row h-100 align-items-center justify-content-center text-center">
			<!-- <div class="col-lg-10 align-self-end mb-4 page-title" style="background-color: white;">
				<h3 class="text-white" style="color: Black !important; font-size:45px; ">Choose from the BEST</h3> -->
			<hr class="divider my-4" />
		</div>
	</div>
	<h1 style="color: #333; font-size: 36px; text-align: center; font-family: 'Roboto', sans-serif; margin-top:40px; color:red; font-weight: bold; font-size:39px;">Our Doctors</h1>

</header>
<section class="page-section" id="doctors">
	<div class="container">
		<div class="card">
			<div class="card-body" style="margin-top: -20px;">
				<div class="col-lg-12">
					<?php if (isset($_GET['sid']) && $_GET['sid'] > 0) : ?>
						<div class="row">
							<div class="col-md-12 text-center">
								<?php
								$s = $conn->query("SELECT * from medical_specialty where id = " . $_GET['sid'])->fetch_array()['name'];
								?>
								<h2><b>Doctor/s who are entitled as <?php echo $s ?></b></h2>
							</div>
						</div>
						<hr class="divider">
					<?php endif; ?>
					<?php
					$where = "";
					if (isset($_GET['sid']) && $_GET['sid'] > 0)
						$where = " where  (REPLACE(REPLACE(REPLACE(specialty_ids,',','\",\"'),'[','[\"'),']','\"]')) LIKE '%\"" . $_GET['sid'] . "\"%' ";
					$cats = $conn->query("SELECT * FROM doctors_list " . $where . " order by id asc");
					while ($row = $cats->fetch_assoc()) :
					?>
						<div class="row align-items-center mb-4 text-center">
							<div class="col-md-12" style="margin-top: 20px;">
								<p class="doctor-detail" style="font-size: 30px;"><b>Name: Dr. <?php echo $row['name'] . ', ' . $row['name_pref'] ?></b></p>
								<p class="doctor-detail" style="font-size: 23px;"><small>Email: <b><?php echo $row['email'] ?></b></small></p>
								<p class="doctor-detail" style="font-size: 23px;"><small>Clinic Address: <b><?php echo $row['clinic_address'] ?></b></small></p>
								<p class="doctor-detail" style="font-size: 23px;"><small>Contact #: <b><?php echo $row['contact'] ?></b></small></p>
								<p class="doctor-detail" style="font-size: 26px;"><b>Specialties:</b></p>
								<div class="doctor-detail">
									<?php if (!empty($row['specialty_ids'])) : ?>
										<?php foreach (explode(",", str_replace(array("[", "]"), "", $row['specialty_ids'])) as $val) : ?>
											<span class="badge badge-primary" style="padding: 10px; background-color: #014462; font-size:large;">
												<large><b><?php echo $ms_arr[$val] ?></b></large>
											</span>
										<?php endforeach; ?>
									<?php endif; ?>
								</div>

								<p class="doctor-detail" style="font-size: 25px; margin-top: 15px;"><small><a href="javascript:void(0)" class="view_schedule" style="color: green;" data-id="<?php echo $row['id'] ?>" data-name="<?php echo "Dr. " . $row['name'] . ', ' . $row['name_pref'] ?>"><i class='fa fa-calendar'></i> Check Schedule</a></small></p>



								<div class="text-center">
									<button class="btn-outline-primary btn mb-4 set_appointment" type="button" style="margin-top: 5px; font-size:large;" data-id="<?php echo $row['id'] ?>" data-name="<?php echo "Dr. " . $row['name'] . ', ' . $row['name_pref'] ?>">Set Appointment</button>

								</div>
							</div>
						</div>
						<hr class="divider" style="max-width: 60vw; border-color: green !important;">

					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<style>
	.masthead-text {
		position: absolute;
		top: 30%;
		left: 20px;
		transform: translateY(-50%);
		color: black;
		font-size: 54px;
		font-weight: bold;
		z-index: 10;
		line-height: 1.5;
		margin-left: 350px;
	}

	.row.align-items-center {
		margin-top: 0px;
	}

	.doctor-detail {
		font-size: 18px;
	}

	.btn-outline-primary {
		color: white;
		background-color: red;
		border-color: red;
	}

	.btn-outline-primary:hover {
		color: white;
		background-color: darkred;
		border-color: darkred;
	}

	.badge-light {
		background-color: orange;
	}
</style>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		document.querySelectorAll('.view_schedule').forEach(function(element) {
			element.addEventListener('click', function() {
				uni_modal(this.getAttribute('data-name') + " - Schedule", "view_doctor_schedule.php?id=" + this.getAttribute('data-id'));
			});
		});

		document.querySelectorAll('.set_appointment').forEach(function(element) {
			element.addEventListener('click', function() {
				if ('<?php echo isset($_SESSION['login_id']) ?>' == 1)
					uni_modal("Set Appointment with " + this.getAttribute('data-name'), "set_appointment.php?id=" + this.getAttribute('data-id'), 'mid-large');
				else {
					uni_modal("Login First", "login.php");
				}
			});
		});
	});
</script>