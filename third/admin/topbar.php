<style>
  .logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
  }

  #slidebar {
    display: none;
    /* Hide the sidebar image */
  }
</style>

<nav class="navbar navbar-light fixed-top " style="padding:0;background: #00000575 !important">
  <div class="container-fluid mt-2 mb-2">
    <div class="col-lg-12">
      <div class="col-md-1 float-left" style="display: flex;">
        <!-- <div class="logo">
  				<span class="fa fa-laptop-medical"></span>
  			</div> -->
      </div>
      <div class="col-md-4 float-left text-white" style="font-size: 25px;">
        <large><b>Let's Treat Logo</b></large>
      </div>
      <div class="col-md-2 float-right text-white" style="font-size: 23px;  margin-right:50px">
        <a href="ajax.php?action=logout" class="text-white" style="display: inline-block; max-width: 700px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap; "><?php echo htmlspecialchars($_SESSION['login_name']) ?> <i class="fa fa-power-off"></i></a>
      </div>


    </div>
  </div>

</nav>