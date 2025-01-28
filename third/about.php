<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .masthead {
            background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>) center center/cover no-repeat;
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            position: relative;
        }

        .masthead::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .masthead-content {
            z-index: 1;
            position: relative;
        }

        .masthead h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
        }

        .masthead hr.divider {
            width: 3rem;
            height: 0.2rem;
            background-color: #fff;
            margin: 1rem auto;
        }

        .page-section {
            padding: 4rem 2rem;
            background: #f9f9f9;
        }

        .page-section h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .page-section p {
            font-size: 1.2rem;
            line-height: 1.8;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .about-details {
            display: flex;
            justify-content: space-around;
            margin-top: 3rem;
            text-align: center;
        }

        .about-item {
            background: #fff;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 30%;
        }

        .about-item h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .about-item p {
            font-size: 1rem;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .about-details {
                flex-direction: column;
                align-items: center;
            }

            .about-item {
                width: 80%;
                margin-bottom: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Masthead-->
    <header class="masthead">
        <div class="masthead-content">
            <h1>About Us</h1>
            <hr class="divider my-4" />
        </div>
    </header>

    <!-- About Section -->
    <section class="page-section">
        <h2>Who We Are</h2>
        <p>We are committed to providing the best healthcare services to our community. Our team of experienced doctors and medical professionals are dedicated to your health and well-being.</p>
        <div class="about-details">
            <div class="about-item">
                <h3>Our Mission</h3>
                <p>To deliver high-quality healthcare services with compassion and respect for our patients.</p>
            </div>
            <div class="about-item">
                <h3>Our Vision</h3>
                <p>To be the leading healthcare provider in the region, recognized for our patient-centered care.</p>
            </div>
            <div class="about-item">
                <h3>Our Values</h3>
                <p>We value integrity, excellence, and collaboration in all our interactions with patients and partners.</p>
            </div>
        </div>
    </section>
</body>

</html>