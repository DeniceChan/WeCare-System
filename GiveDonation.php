<?php
include "db.php";
session_start();

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $transactionID = uniqid(); // Generate a unique ID
    $matric = $_POST['matric'];
    $username = $_POST['username'];
    $total = $_POST['total'];
    $requestID = $_POST['requestID'];
    $Full_Name = $_POST['Full_Name'];


    // Handle file upload (assuming you are storing file path in the database)
    $prooffile = $_FILES['file'];
    $matric_no = $_POST['matric'];

    // Generate a unique filename based on matric number and timestamp
    $prooffilename = $matric_no . '_proof.' . pathinfo($prooffile['name'], PATHINFO_EXTENSION);
    $proofupload_dir = 'uploads/proof/';
    if (!file_exists($proofupload_dir)) {
        mkdir($proofupload_dir);
    }
    $upload_path = $proofupload_dir . $prooffilename;
move_uploaded_file($prooffile['tmp_name'], $upload_path);

    try {
        $conn = new PDO("mysql:host=lrgs.ftsm.ukm.my;dbname=a186635", "a186635", "cuteblacktiger");
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement
        $sql = "INSERT INTO give_donation (Transaction_ID, Matric_No, Donator_Name, Total, Request_ID, Full_Name, proofDoc, Donate_Time)
                VALUES (:transactionID, :matric, :username, :total, :requestID, :Full_Name, :fileToUpload, NOW())";

        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':transactionID', $transactionID);
        $stmt->bindParam(':matric', $matric);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':total', $total);
        $stmt->bindParam(':requestID', $requestID);
        $stmt->bindParam(':Full_Name', $Full_Name);
        $stmt->bindParam(':fileToUpload', $upload_path);

        // Execute the query
        $stmt->execute();

        // Close the database connection
        $conn = null;

        // Function to show a popup message using JavaScript
        echo '<script>
                function showPopupMessage(message) {
                    alert(message);
                }

                // Call the function to show the popup
                showPopupMessage("Thank You for Your Donation!");

                // Redirect to FTSMMember_Index.php after showing the popup
                setTimeout(function() {
                    window.location.href = "FTSMMember_Index.php";
                }, 1000); // Adjust the delay (in milliseconds) as needed
              </script>';

        // Make sure to exit after the header to prevent further execution
        exit();
    } catch (PDOException $e) {
        // Display an error message
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare System: Give Donation (Transaction)</title>
   <style>
        body {
            min-height: 100vh;
            /* background-color: #FFDE59; */
            color: #000;
            background: rgb(229,207,255);
            /*background: linear-gradient(99deg, rgba(243,225,182,1) 39%, rgba(230,193,105,1) 62%); */
            background-image: url(donateepage.jpg);
            background-size: cover;

        }

        .title {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            margin-top: 0px;
        }
      
        
 input {
  display: block;
  visibility: visible;
}


 .rectangular-box {
      
      display: flex;
      align-items: center;
      padding: 20px;
      border: 1px solid #ddd; /* Border color */
      border-radius: 15px; /* Adjust as needed */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for depth */
      position: relative; /* Add position relative to enable absolute positioning of the button */
      background-color: #FFF 

    }

    .rectangular-box {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto;
  padding: 20px;
}


    .rectangular-box {
  max-width: 750px;
  max-height: 500px;
}
       .box-image {
  width: 75px;
  height: 75px;
  border-radius: 50%;
  margin-right: 20px; /* Adjust the spacing between the image and text */
  object-fit: cover; /* Ensure the image covers the specified dimensions */
}

.rectangular-box .box-image {
    width: 100px; /* Adjust the width of the image */
    height: 100px; /* Adjust the height of the image */
    margin-right: 40px; /* Adjust the spacing between the image and text */
    object-fit: cover; /* Ensure the image covers the specified dimensions */
    border-radius: 8px; /* Optional: Add rounded corners to the image */
}



.box-content h2 {
    font-weight: bold;
    /* Add other styles as needed */
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

        .box-content {
  min-width: 45%;
}


        .description {
            font-size: 17px;
            color: #000000;
            margin-bottom: 1px;
            font-family: 'Arial', sans-serif;
        }

        p.qr-payment-image {
  float: right;
  margin-left: 200px;
}

.donateButton {
            background: linear-gradient(45deg, #FF3131, #FF914D); /* Apply the gradient background */
            color: #fff; /* Text color is white */
            border: none; /* Remove the default button border */
            border-radius: 10px; /* Apply rounded corners */
            padding: 10px 20px; /* Add some padding for a rectangular shape */
            font-weight: bold; /* Make the text bold */
            cursor: pointer;
            margin: 10px auto; /* Center the button */
            display: block; /* Ensure it's a block-level element for centering */
            width: fit-content; /* Set the width to fit the content */
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

.title{
    margin-top: 60px;
}

    </style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="font-family: 'Times New Roman', Times, serif;">

<div id="options">
  <input type="checkbox" id="options-toggle"/>
  <ul>
    <li>
      <a>WeCare</a>
    </li>
    <li>
    <a href="DonateeList.php">
    <i class="fa fa-list-ul" aria-hidden="true"></i>
    </li>
  </ul>
  
  </a>
</div>

    <?php

    // Check if Matric No is provided in the URL
    if (isset($_GET['request_id'])) {
        $requestId = $_GET['request_id'];

        // Fetch data based on Request ID
        $servername = "lrgs.ftsm.ukm.my";
        $username = "a186635";
        $password = "cuteblacktiger";
        $dbname = "a186635";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        echo '<div class="title" style="color: black;">Give Donation</div>';

        $sql = "SELECT * FROM request_donation_form WHERE Request_ID = '$requestId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data
            $row = $result->fetch_assoc();
            $profilePic = empty($row["ProfilePic"]) ? 'https://static.thenounproject.com/png/5034901-200.png' : $row["ProfilePic"];
            $pictureFilename = 'uploads/QR/' . $row["QR"]; // Assuming Document column stores the filename

            echo '<div class="container mt-5" style="color: black;">
                    <div class="rectangular-box">
                        <img src="' . $profilePic . '" alt="Profile Picture" class="box-image">
                        <div class="box-content">
                            <h2>' . $row["Full_Name"] . '</h2><br>
                            <p>Request ID: ' . $row["Request_ID"] . '</p>
                            <p>Matric No: ' . $row["Matric_No"] . '</p>
                            <p>Type of Donation: ' . $row["Donation_Type"] . '</p>
                            <p>Bank Merchant: ' . $row["Bank_Merchant"] . '</p>
                            <p>Account Number: ' . $row["Account_Number"] . '</p>
                            </div>
                            <div class="container mt-5">
                            <p><img src="' . $pictureFilename . '" alt="QR Payment" style="max-width: 100%;"></p>
                       </div>
                    </div>
                </div>';
        } else {
            echo "No results found for Request ID: $requestId";
        }

        $conn->close();
    } else {
        echo "Request ID not provided in the URL";
    }
    ?>

    <br></br>

    <form action="" method="POST" class="form-group" enctype="multipart/form-data">

        <div class="row justify-content-center" style="color: black;">
            <div class="col-6">

                <legend><b>Please Fill In All Details :</b></legend>

                <b>Matric No:</b><br>
                <input type="text" name="matric" class="form-control" placeholder="Enter Your Matric No." required><br>

                <b>Name:</b><br>
                <input type="text" name="username" class="form-control" placeholder="Enter Your Name" required><br>

                <b>Total: (RM)</b><br>
                <input type="number" name="total" class="form-control" placeholder="Enter your donation amount" required><br>

                <b>Request ID:</b><br>
                <input type="text" name="requestID" class="form-control" value="<?php echo $requestId; ?>" placeholder="Request ID" required readonly><br>

                <b>Full Name:</b><br>
                <input type="text" name="Full_Name" class="form-control" value="<?php echo $row["Full_Name"]; ?>" required readonly><br>

                <b>Proof of Payment (Please Screenshot Your Receipt):</b><br>
                <input type="file" name="file" class="form-control" accept="image/*" required><br><br>

                <div class="text-center">
                    <input type="submit" name="submit" value="SUBMIT" style="font-weight: bold;" class="donateButton">
                </div>
            </div>
        </div>

    </form>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>