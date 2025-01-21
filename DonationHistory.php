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
    <title>WeCare System: Donation History</title>
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
        .title {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            margin-top: 0px;
        }
        .donateeBox {
            margin: 20px auto;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 15px -5px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease 0s;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 900px;
            font-size: 20px;
            width: 500px;

        }

        .donateeBox img {
            border-radius: 50%;
            margin-bottom: 20px;
            width: 120px;
            height: 120px;
        }

        .donateeDetails {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .details img {
            width: 50px;
            height: 50px;
            cursor: pointer;
        }

        .extraDetails {
            flex-grow: 1;
            display: none; /* Hide by default */
            margin-top: 20px;
        }

        .extraDetails img {
            width: 250px;
            height: 300px;
            margin-top: 10px; /* Add some space between the text and the image */
            border-radius: 0; 
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
</head>

<body class="body">


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

    echo '<div class="title">Donation History</div>';

    // Fetch data from the database
    $sql = "SELECT * FROM give_donation WHERE Matric_No = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $profilePic = empty($row["ProfilePic"]) ? 'https://static.thenounproject.com/png/5034901-200.png' : $row["ProfilePic"];
            $historypath = '' . $row["proofDoc"]; // Assuming Document column stores the filename

            echo '<div class="donateeBox">
                    <img src="' . $profilePic . '" alt="Profile Picture">
                    <div class="donateeDetails">
                        <p>Name: ' . $row["Full_Name"] . '</p>
                        <p>Request ID: ' . $row["Request_ID"] . '</p>

                    </div>
                    <div class="details" onclick="toggleDetails(this)">
                        <img src="https://cdn-icons-png.flaticon.com/512/44/44621.png" alt="Details Icon">
                    </div>
                    <div class="extraDetails">
                        <p>Matric No: ' . $row["Matric_No"] . '</p>
                        <p>Donator Name: ' . $row["Donator_Name"] . '</p>
                        <p>Transaction ID: ' . $row["Transaction_ID"] . '</p>
                        <p>Donate Time: ' . $row["Donate_Time"] . '</p>
                        <p>Proof of Payment: </p> <br>
                        <p><img src="' . $historypath . '" alt="Proof Of Payment"></p>
                    </div>
                </div>';
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <script>
        function toggleDetails(element) {
            var donateeBox = element.closest('.donateeBox');
            donateeBox.classList.toggle('expanded');
            
            var detailsIcon = element.querySelector('img');
            detailsIcon.style.transform = donateeBox.classList.contains('expanded') ? 'scaleX(-1)' : 'none';

            var extraDetails = donateeBox.querySelector('.extraDetails');
            extraDetails.style.display = donateeBox.classList.contains('expanded') ? 'block' : 'none';
        }
    </script>


</body>

</html>
