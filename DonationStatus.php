<?php
session_start();
$user_id = $_SESSION['user_id'];
// echo "User ID: " . $user_id . "<br>";
// echo "Position: " . $position;

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare: Donation Status</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

body {
            min-height: 100vh;
            /* background-color: #FFDE59; */
            color: #000;
            font-family: 'Times New Roman', Times, serif;
            background: rgb(229,207,255);
            /*background: linear-gradient(99deg, rgba(243,225,182,1) 39%, rgba(230,193,105,1) 62%); */
            background-image: url(donateepage.jpg);
            background-size: cover;

        }



        .rectangular-box {
            display: flex;
            align-items: center;
            padding: 20px;
            border: 1px solid #ddd; /* Border color */
            border-radius: 15px; /* Adjust as needed */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for depth */
            position: relative; /* Add position relative to enable absolute positioning of the button */
            background-color: #fff;
        }

        .box-image {

            width: 120px; /* Adjust the width of the image */
            height: 120px; /* Adjust the height of the image */
            margin-right: 20px; /* Adjust the spacing between the image and text */
            object-fit: cover; /* Ensure the image covers the specified dimensions */
            border-radius: 8px; /* Optional: Add rounded corners to the image */
        }

        .box-content {
            flex-grow: 1; /* Allow the content to grow and take available space */
        }

        .arrow-button {
            margin-left: auto; /* Push the button to the right side */
        }

        /* Optional: Add styling for responsiveness */
        @media (max-width: 768px) {
            .rectangular-box {
                flex-direction: column;
            }

            .box-image {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }

        .name {
            font-size: 18px;
            font-weight: 800;
            color: #333;
        }

        .description {
            font-size: 17px;
            color: #000000;
            margin-bottom: 1px;
/*            font-family: 'Arial', sans-serif;*/
        }
        .title {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            margin-top: 0px;
        }

        #options {
  position: absolute;
  top: 30px;
  left: 30px;
  /* z-index: 500; */
  height: 50px;
  border-radius: 25px;
  overflow: hidden;
  background: #000;
  /* box-shadow: 0px 0px 10px rgba(0, 0, 0, .5); */
  transition: all .5s ease;
  margin-right: 20px; /* Adjust the margin */

}

#options > * {
  float: left;
}

#options, #options * {
    box-sizing: content-box;
}

#options-toggle {
  display: block;
  cursor: pointer;
  opacity: 0;
  z-index: 999;
  margin: 0;
  width: 50px;
  height: 50px;
  position: absolute;
  top: 0;
  left: 0;
}

#options-toggle:checked ~ ul {
  width: 175px;
  background-position: 0px -50px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0 0 0 50px;
  height: 50px;
  width: 0px;
  transition: .5s width ease;
  background-image: url("https://i.imgur.com/3d0vJzn.png");
  background-repeat: no-repeat;
  background-position: 0px 0px;
}

li {
  display: inline-block;
  line-height: 50px;
  width: 50px;
  text-align: center;
  margin: 0;
  font-size: 1.25em;
  font-weight: bold;
  color: white;
  text-decoration: none;
}

li a {
  font-size: 1.20em;
  font-weight: bold;
  color: white;
  text-decoration: none;
}

#options ul li {
    margin-right: 35px; /* Adjust the margin to your preference */
}

h1 {
  font-size: 45px; 
  letter-spacing: -1px; 
  line-height: 1;
  text-align: left;
  font-family: Impact, fantasy;
  font-weight: 80;
}

.tooltip {
    position: absolute;
    visibility: hidden;
    width: 160px;
    background-color: #fff;
    color: #000;
    text-align: center;
    padding: 5px;
    border-radius: 5px;
    z-index: 1;
    top: 110%; /* Position the tooltip below the button */
    right: 1%;
    margin-left: -50px; /* Center the tooltip horizontally */
    opacity: 0;
    transition: opacity 0.2s;
}


.btn:hover + .tooltip {
    visibility: visible;
    opacity: 1;
}



    </style>
</head>
<body>

<div id="options">
  <input type="checkbox" id="options-toggle"/>
  <ul>
    <li>
      <a>WeCare</a>
    </li>
    <li>
      <a href="FTSMMember_Index.php">&#8962;</a>
    </li>
  </ul>
</div>



    <?php
    // include_once 'header3.php';
    $servername = "lrgs.ftsm.ukm.my";
    $username = "a186635";
    $password = "cuteblacktiger";
    $dbname = "a186635";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

     // Fetch data from the database

    $sql = "SELECT * FROM request_donation_form WHERE Matric_No = '$user_id'";
    $result = $conn->query($sql);

    ?>

    <!-- <div class="container"> -->
        <!-- Create a row and center the text within it --><?php
        echo '<div class="title" style="margin-top: 100px;">Donation Status</div>';
?>
    <div class="container mt-5">
    <?php
    // Loop through the fetched data
   
    while ($row = $result->fetch_assoc()) {
        // Replace hardcoded values with data from the database
        if (!empty($row['Matric_No'])) {
        $requestID = $row['Request_ID'];
        $profilePic = empty($row['ProfilePic']) ? 'user.png' : $row['ProfilePic'];
        $matricNo = $row['Matric_No'];
        $id = $row['ID'];
        $name = $row['Full_Name'];
        $phonenum = $row['Phone_No'];       
        $donationType = $row['Donation_Type'];
        $hseaddress = $row['House_Address'];
        $bankmerchant = $row['Bank_Merchant'];
        $accNum = $row['Account_Number'];
        $document = $row['Document'];
        $status = $row['Status'];
    } 
}

    $conn->close();
    ?>

     <div class="rectangular-box">
                    <img src="<?php echo $profilePic; ?>" alt="Image" class="box-image">
                <div class="box-content">
                    <h2 class="name"><?php echo $name; ?></h2>
                    <p class="description">Request ID: <?php echo $requestID; ?></p>
                    <p class="description">Matric No: <?php echo $matricNo; ?></p>
                    <p class="description">Type of donation: <?php echo $donationType; ?></p>
                    <p class="description">
    Status: <span style="color: <?php echo ($status == 'Approved') ? 'green' : 'red'; ?>"><?php echo $status; ?></span>
</p>
                </div>
                <a href="TimelineStatus.php?Request_ID=<?php echo $requestID; ?>" class="btn" id="tooltipBtn">
    <span class="tooltip">Click to view timeline status</span>
    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
    </svg>
</a>


</div>


            </div>
        <!-- </div> -->

        <!-- Bootstrap JS (not required for this example) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
    document.getElementById('tooltipBtn').addEventListener('mouseover', function () {
        this.querySelector('.tooltip').style.opacity = '1';
        this.querySelector('.tooltip').style.visibility = 'visible';
    });

    document.getElementById('tooltipBtn').addEventListener('mouseout', function () {
        this.querySelector('.tooltip').style.opacity = '0';
        this.querySelector('.tooltip').style.visibility = 'hidden';
    });
</script>


    </body>
    </html>