<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page
    header("location: login.php");
    exit();
}
?>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Times New Roman", Times, serif;
            background-color: #f2f2f2;
        }

        .left-nav {
            margin-top: -21px;
            height: 950px;
            border-bottom: 1px solid;
            display: none;
            color: black !important;
        }

        .navbar-default .navbar-nav>li>a {
            color: #000 !important; /* Set the color to black for all navbar text */
        }

        .navbar-default .navbar-brand {
            color: #000 !important; /* Set the color to black for the navbar brand (WeCare) */
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .navbar-right {
            margin-right: 15px;
        }

        .service-icon {
            color: #0a0a0a;
            font-size: 20px;
            padding: 10px;
        }

        .service-icon:hover {
            color: #0a0a0a;
        }

        label {
            display: block;
            position: fixed;
            z-index: 1;
            top: 20px;
            left: 15px;
            cursor: pointer;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            height: 30px;
            width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px; /* Increase the font size */
        }

        .toggle {
            position: absolute;
            top: 8%;
            left: 20px; /* Adjust the left position to move it beside the "MENU" text */
            transform: translateY(28%);
            
        }

        .common {
            position: absolute;
            height: 2px;
            width: 20px;
            background-color: #8000ff;
            border-radius: 50px;
            transition: 0.3s ease;
        }

        .top_line {
            top: 20%;
            left: 15%;
            background-color: #000; /* Change the color to black */
            border-radius: 50px;
            transition: 0.3s ease;
        }

        .middle_line {
            top: 50%;
            left: 15%;
            transform: translateY(-80%);
            background-color: #000; /* Change the color to black */
            border-radius: 50px;
            transition: 0.3s ease;
        }

        .bottom_line {
            top: 70%;
            bottom: 20%;
            left: 15%;
            background-color: #000; /* Change the color to black */
            border-radius: 50px;
            transition: 0.3s ease;
        }

        input {
            display: none; /* Hide the default checkbox */
        }

        input:checked + label .top_line {
            top: 14px;
            width: 25px;
            transform: rotate(45deg);
        }

        input:checked + label .bottom_line {
            top: 14px;
            width: 25px;
            transform: rotate(-45deg);
        }

        input:checked + label .middle_line {
            opacity: 0;
            transform: translateX(20px);
        }

        input:checked + label + .slide {
            transform: translateX(0);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .slide {
            height: 100%;
            width: 200px;
            position: absolute;
            font-family: "Times New Roman", Times, serif;
            background-color: #fff;
            transition: 0.5s ease;
            transform: translateX(-200px);
        }

        h5 {
            color: #000;
            font-weight: 800;
            text-align: right;
            padding: 10px 0;
            padding-right: 50px;
            pointer-events: none;
        }

        ul {
            list-style: none;
            padding-left: 0;
            background-color: #fff;
        }

        ul li a {
            color: #011a41;
            margin-left: 50px;
            font-weight: 500;
            padding: 5px 0;
            display: block;
            text-transform: capitalize;
            text-decoration: none;
            transition: 0.2s ease-out;
        }

         body {
            background-color: #FFDE59; /* Change to yellow or any other color you prefer */
        }
        

    </style>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <!-- Menu Icon -->
            <div class="container-fluid-left">
                
            </div>

            <!-- WeCare Name in the Middle -->
            <a class="navbar-brand" href="">WeCare </a>

            <!-- Right Menu Links -->
            <div class="container-fluid-right">
                <a class="service-icon" href="<?php echo generateLinkBasedOnPosition(); ?>">
                    <span><i class="fa fa-home"></i></span></a>

                  <?php

// Function to generate the link based on the user's position
function generateLinkBasedOnPosition() {
    if (isset($_SESSION['position'])) {
        $position = $_SESSION['position'];

        // Add logic to determine the link based on the user's position
        switch ($position) {
            case "FTSM Member":
                return "FTSMMember_Index.php"; // Replace with the actual link for FTSM Members
            case "FTSM Management":
                return "FTSMManagement_Index.php"; // Replace with the actual link for FTSM Management
            case "PERTAMA":
                return "PERTAMA_Index.php";

            case "Counselor":
                return "Counseling_Index.php";
            // Add more cases as needed
            // default:
            //     return "MainPage.php"; // Default link
        }
    }

    // // Default link if position is not set
    // return "MainPage.php";
}
?>  

                <a class="navbar-brand" href="logout.php">Logout</a>

            </div>
        </div>

        <input type="checkbox" id="menuToggle">
        <label for="menuToggle" class="toggle">
            <div class="top_line common"></div>
            <div class="middle_line common"></div>
            <div class="bottom_line common"></div>
        </label>

<div class="slide">
    <h5>MENU</h5>
    <ul>
        <?php

        if(isset($_SESSION['position'])) {

        $position = $_SESSION['position'];

        // echo "Position: $position";

        switch ($position):
            case "FTSM Member": ?>
                <li><a href="RequestForm.php">Request Donation</a></li>
                <li><a href="DonateeStatus.php">Donation Status</a></li>
                <li><a href="DonateeList.php">Give Donation</a></li>
                <li><a href="DonationHistory.php">Donation History</a></li>
                <li><a href="CounsellingList.php">Counseling</a></li>
                <?php break;
            case "FTSM Management": ?>
                <li><a href="#">Pending Request</a></li>
                <li><a href="#">Records</a></li>
                <?php break;
            case "Counselor": ?>
                <li><a href="#">Counselling</a></li>
                <?php break;
            case "PERTAMA": ?>
                <li><a href="DonateeRequestList.php">Donation</a></li>
                <li><a href="#">Counselling</a></li>
                <?php break;
            // Add more cases as needed
        endswitch; 



}

        ?>
    </ul>
</div>

    </nav>

    <br> </br>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        jQuery.noConflict();
        $(document).ready(function ($) {
            $('#menuToggle').change(function () {
                if ($(this).is(":checked")) {
                    $('.slide').css('transform', 'translateX(0)');
                    $('.slide').css('box-shadow', '0 0 15px rgba(0, 0, 0, 0.5)');
                } else {
                    $('.slide').css('transform', 'translateX(-200px)');
                    $('.slide').css('box-shadow', 'none');
                }
            });
        });
    </script>


