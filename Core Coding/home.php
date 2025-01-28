<?php
include 'admin/db_connect.php';
?>
<style>
    /* Custom CSS styles */
    #portfolio .img-fluid {
        width: 100%;
    }

    .masthead {
        position: relative;
        /* Ensure positioning context */
        background: url(assets/img/hero-image.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        height: 400px;
        /* Example height for header */
    }

    .masthead-text {
        position: absolute;
        top: 50%;
        left: 20px;
        /* Adjust left positioning as needed */
        transform: translateY(-50%);
        color: black;
        /* Adjust text color */
        font-size: 54px;
        /* Increase font size */
        font-weight: bold;
        /* Adjust font weight */
        z-index: 10;
        /* Ensure text is above other elements */
        line-height: 1.5;
        /* Add space between lines */
        /* Additional styles can be added as per your requirements */
        margin-left: 350px;
    }

    .masthead-text button {
        padding: 10px 20px;
        /* Adjust padding as needed */
        background-color: #007bff;
        /* Button background color */
        color: white;
        /* Button text color */
        border: none;
        /* Remove default button border */
        border-radius: 5px;
        /* Rounded corners */
        font-size: 16px;
        /* Button text size */
        cursor: pointer;
        /* Cursor style on hover */
        text-decoration: none;
    }


    header.masthead .container {
        height: 100%;
    }

    header.masthead .page-title {
        margin-bottom: 20px;
    }

    header.masthead .page-title h3 {
        color: #fff;
        /* Text color */
        font-size: 36px;
        /* Example font size */
    }

    header.masthead .btn {
        background-color: red;
        /* Button background color */
        color: #fff;
        /* Button text color */
        padding: 10px 20px;
        /* Button padding */
        border: none;
        /* Remove border */
        border-radius: 5px;
        /* Button border radius */
        font-size: 18px;
        /* Button font size */
        text-decoration: none;
        /* Remove underline */
    }

    header.masthead .btn:hover {
        background-color: pink;
        /* Button hover background color */
    }

    .page-section {
        padding: 60px 0;
        /* Example padding for sections */
    }

    .container {
        max-width: 1200px;
        /* Container max-width */
        margin: 0 auto;
        /* Center container */
        padding: 0 15px;
        /* Container padding */
    }

    .text-center {
        text-align: center;
        /* Center text */
    }

    .mb-4 {
        margin-bottom: 1.5rem;
        /* Margin bottom */
    }

    .divider {
        width: 60px;
        /* Divider width */
        height: 2px;
        /* Divider height */
        background-color: #007bff;
        /* Divider color */
        margin: 20px auto;
        /* Center divider with margin */
    }

    .no-gutters {
        margin: 0;
        padding: 0;
    }

    .portfolio-box {
        display: block;
        position: relative;
        overflow: hidden;
        text-align: center;
        padding: 10px;
    }

    .portfolio-box button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        transition: background-color 0.3s ease;
        width: 100%;
        /* Ensure button fills container width */
    }

    .portfolio-box button:hover {
        background-color: #0056b3;
    }

    .portfolio-box-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(100%);
    }

    .portfolio-box:hover .portfolio-box-caption {
        opacity: 1;
        transform: translateY(0);
    }

    .project-name {
        font-size: 18px;
        /* Project name font size */
        font-weight: bold;
        /* Project name font weight */
    }

    .project-category {
        font-size: 14px;
        /* Project category font size */
    }

    /* New styles for "Why Choose Us" section */
    .why-choose-us {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .why-choose-us h2 {
        font-size: 32px;
        margin-bottom: 20px;
    }

    .why-choose-us p {
        font-size: 18px;
        line-height: 1.6;
    }

    /* Adjusted styles for welcome section */
    .welcome-section {
        background-color: #ffffff;
        /* Adjust as needed */
        padding: 40px 20px;
        /* Adjust padding as needed */
        border-radius: 10px;
        /* Example border radius */
        /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); */
        /* Example box shadow */
        z-index: 1;
        /* Ensure it's above the hero image */
        text-align: center;
        margin-top: 20px;
        /* Space below the hero image */
    }
</style>

<header class="masthead">
    <div class="container h-100">
        <!-- Text overlaid on hero image -->
        <div class="masthead-text">
            Take the world's best <br> quality Treatment <br>
            <a href="admin/login.php" target="_blank"><button>Admin</button></a>
        </div>
    </div>
</header>

<section class="welcome-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 align-self-end mb-4 page-title" style="background-color:#ffffff; padding-top:10px; padding-left:80px; padding-right:80px">
                <h3 class="text-dark" style="padding-top: 15px; font-size:40px">Book Appointments with Leading Doctors</h3>

                <hr class="divider my-4" />
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="index.php?page=doctors" style="margin-bottom: 0px; font-size:26px;background-color:red">Find a Doctor</a>
            </div>
        </div>
    </div>
</section>

<section class="page-section" id="menu">
</section>

<div id="portfolio" class="container">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="mb-4">We Specialize In</h2>
                <hr class="divider">
            </div>
        </div>
        <div class="row no-gutters">
            <?php
            $cats = $conn->query("SELECT * FROM medical_specialty order by id asc");
            while ($row = $cats->fetch_assoc()) :
            ?>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="index.php?page=doctors&sid=<?php echo $row['id'] ?>">
                        <button class="btn btn-primary"><?php echo $row['name'] ?></button>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<section class="why-choose-us" style="background-color: white; margin-top:20px; margin-bottom:30px;">
    <div class="container text-center">
        <h2>Why Choose Us</h2>
        <p>Choosing our service means prioritizing convenience and efficiency in managing your healthcare needs. With our user-friendly platform, you can effortlessly schedule appointments, view doctor profiles and specialties, and access your medical history—all in one place. We are committed to providing seamless experiences, ensuring you spend less time worrying about administrative tasks and more time focusing on your health. Trust us to simplify your healthcare journey with advanced booking options and personalized care.</p>
    </div>
</section>

<script>
    $('.view_prod').click(function() {
        uni_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'))
    })
</script>