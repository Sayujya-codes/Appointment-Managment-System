<!DOCTYPE html>
<html lang="en">

<head>
  <title>Appointment</title>
</head>
<?php
session_start();
ob_start();
include('header.php');
include('admin/db_connect.php');

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($query as $key => $value) {
  if (!is_numeric($key))
    $_SESSION['setting_' . $key] = $value;
}
ob_end_flush();
?>

<style>
  /* Custom CSS styles */
  header.masthead {
    background: url(assets/img/hero-image.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  /* Navbar styles */
  .navbar {
    background-color: #007bff;
    /* Example background color */
    padding: 15px 0;
  }

  .navbar-brand {
    color: #333;
    /* Example text color */
    font-weight: bold;
  }

  .navbar-nav .nav-item {
    margin-right: 10px;
  }

  .navbar-nav .nav-link {
    color: #333;
    /* Example text color */
    font-weight: bold;
  }

  /* Modal styles */
  .modal-content {
    border-radius: 0;
  }

  .modal-header {
    background-color: #007bff;
    /* Example header background color */
    color: #fff;
    /* Example header text color */
    border-bottom: none;
  }

  .modal-title {
    color: #fff;
    /* Example title text color */
  }

  .modal-body {
    padding: 20px;
  }

  .modal-footer {
    border-top: none;
  }

  .d-block {
    color: darkblue;
  }
</style>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="./">Let's Treat Logo</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home" style="font-size: 20px; ">Home</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=doctors" style="font-size: 20px; ">Doctors</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about" style="font-size: 20px; ">About</a></li>
          <?php if (isset($_SESSION['login_id'])) : ?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2"><?php echo "Welcome " . $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a></li>
          <?php else : ?>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now" style="font-size: 20px; ">Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main content -->
  <?php
  $page = isset($_GET['page']) ? $_GET['page'] : "home";
  include $page . '.php';
  ?>

  <!-- Modals -->
  <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
          <div id="delete_content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="fa fa-arrow-right"></span>
          </button>
        </div>
        <div class="modal-body">
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer style="background-color: #deeff5;" class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Get in touch</h2>
          <hr class="divider my-4" />
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <div style="font-size: 20px; font-weight:bold">Contact number</div>
          <div>9848539328</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <div style="font-size: 20px; font-weight:bold">E-mail</div>
          <a class="d-block" href="https://accounts.google.com/InteractiveLogin/signinchooser?continue=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&emr=1&followup=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&osid=1&passive=1209600&service=mail&ifkv=AS5LTAR1XPCDxTJn306M8AXZyHFYluxXPT56mhSQeDuIdardYZDJ7efkyA-GvYzlqsG_nhSmZ76jDg&ddm=0&flowName=GlifWebSignIn&flowEntry=ServiceLogin" target="_blank">letstreat@hotmail.com</a>
        </div>
      </div>
    </div>
  </footer>




  <?php include('footer.php') ?>

  <?php $conn->close() ?>

</body>

</html>