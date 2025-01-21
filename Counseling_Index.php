<?php

include_once 'db.php';
// session_start();
include_once 'session.php';
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header("location: login.php");
    exit();

    if ($position === 'Counselor') {

    header("location: Counseling_Index.php");
    
}
else  {("");
    
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>WeCare System: Counsellor</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
    a {
    text-decoration: none;
    }

    .navbar{
        height: 12%;
        display: flex;
        align-items: center;
      }

      .logo{
        width: 110px;
        cursor: pointer;
        margin-left: 20px;
        
      }


      .menu-icon{
        width: 30px;
        cursor: pointer;
        margin-left: 40px;
      }

      .navbar {
    height: 12%;
    display: flex;
    align-items: center;
    position: fixed;
    top: 0;
    width: 100%;
    background-color: transparent; /* Add your desired background color */
    z-index: 1000; /* Set a high z-index to ensure it's above other elements */
}

nav ul li {
    list-style: none;
    display: inline-block;
    margin-right: 30px; /* Adjust this value to move it to the left */
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 20px;
}

body {
      /*font-family: "Times New Roman", Times, serif;
      /*background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      min-height: 100vh;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .contact-info {
      display: flex;
      justify-content: space-around;
      margin-top: 20px;
    }

    .info-item {
      text-align: center;
    }

    .icon {
      font-size: 80px;
      margin-bottom: 20px;
    }

    a {
      text-decoration: none;
      color: #333;
    }

    button {
      background-color: #3498db;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer; */
    }

    button:hover {
      background-color: #2980b9;
    }

    /*body {
      display: flex;
      flex-direction: column;
    }*/

    main {
      flex: 1;
    }

    .footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
      margin-top: auto;
      width: 100%; /* Set the width to 100% */
      
    }

    .footer-text {
      margin-bottom: 20px;
    }

    .footer-icons {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .footer-icon {
      font-size: 26px;
      margin: 0 15px;
      color: #fff;
    }

    .footer-icon .hover{
      color: black;
    }

    .text {
      color: #fff !important;
    }

    .text .hover{
      color: black;
    }

    /* Custom styles for text size */
    .footer-icons p {
      font-size: 14px;
      margin: 0;
    }

    .btn-primary {
    background-color: #f29c07;
    color: #fff;
    cursor: pointer;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); /* Add a subtle box shadow */
    transition: background-color 0.3s ease; /* Add a smooth transition effect */
}

.btn-primary:hover {
    background-color: #e6a73c; /* Change this color to your desired hover background color */
    box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3); /* Increase the shadow on hover */
}

    </style>
</head>
<body id="page-top">

<header class="masthead4">
<!-- NAVBAR -->
<div class="navbar">
      <img src="Logo2.png" class="logo">
      <nav>
        <ul>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </div>


        <div class="container">
            <div class="masthead4-subheading" style="font-size: 60px;">Welcome Back!</div>
            <?php
                echo "<div class='masthead4-heading text-uppercase'>$name</div>";
            ?>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Click for more</a>
        </div>
    </header>

    <!-- Services-->
    <section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Counsellor</h2>
            <h3 class="section-subheading text-muted">"Commited to exploring, building and developing research in areas relating to human intellect, behaviour, and emotion, with the purpose of empowering human potential and nourishing human well-being."</h3>
        </div>
        <div class="row text-center" style="margin-left: 400px;">
            <div class="col-md-4" style="margin-left: 100px;">
                <a href="CounsellingList.php" class="counsellist">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa-solid fa-people-arrows fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Counseling Bookings</h4>
                    <p class="text-muted">Click here to view list counseling booking.</p>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="footer">
    <h3><p class="text">WeCare</p></h3>
    <h7><p class="wecare-desc">WeCare is a platform where students can seek financial and emotional assistance, supported by FTSM and the Student Representatives Council (PERTAMA).</p></h7>

    <div style="margin-top: 20px;">
      <h3>Contact Us</h3>
      <div class="footer-icons">
        <a href="mailto:pertamaftsm@gmail.com" class="footer-icon">
          <i class="fa fa-envelope"></i>
          <p>Email: pertamaftsm@gmail.com</p>
        </a>
        <a href="tel:+6016-2749263" class="footer-icon">
          <i class="fa fa-phone"></i>
          <p>Phone: +6016-2749263</p>
        </a>
        <a href="https://www.instagram.com/pertama.ukm/" target="_blank" class="footer-icon">
          <i class="fa fa-instagram"></i>
          <p>Instagram: @pertama.ukm</p>
        </a>
      </div>
    </div>
  </div>

        
                   
        
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>        
                   
        
        
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>
</html>
