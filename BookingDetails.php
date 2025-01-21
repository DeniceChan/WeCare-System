<?php
    $servername = "lrgs.ftsm.ukm.my";
    $username = "a186635";
    $password = "cuteblacktiger";
    $dbname = "a186635";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


if (isset($_POST['submit'])) {
    $counseldate = $_POST['counseldate'];
    $bookingId = $_GET['bid'];

    $sql = "UPDATE book_counseling SET Set_Date='$counseldate' WHERE Booking_ID='$bookingId'";

    $result = $conn->query($sql);


if ($result === TRUE) {

    // Function to show a popup message using JavaScript
    echo '<script>
            function showPopupMessage(message) {
                alert(message);
            }

            // Call the function to show the popup
            showPopupMessage("Your appointment with the student successfully booked");

            window.location.href = "Counseling_Index.php";
          </script>';

    // Make sure to exit after the header to prevent further execution
    exit();
} else {
    // Display an error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare System: Counseling Booking Details</title>
    <style>
        body {
            background: rgb(229,207,255);
            background-image: url(donateepage.jpg);
            background-size: cover;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .bookingBox {
            margin: 20px;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 15px -5px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease 0s;
            background-color: #fff;
            max-width: 900px;
            text-align: center;
            width: 500px;
        }

        .bookingBox img {
            border-radius: 50%;
            margin-bottom: 20px;
            width: 120px;
            height: 120px;
        }

        .bookingDetails {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: left;
        }

        .setdate {
            margin-top: 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #35424a;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #263238;
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
                <a href="Counseling_Index.php">&#8962;</a>
              </li>
            </ul>
    </div>

    <div class="container">
        <?php
        if (isset($_GET['bid'])) {
            $bookingId = $_GET['bid'];

            // Fetch data based on Request ID
            $servername = "lrgs.ftsm.ukm.my";
            $username = "a186635";
            $password = "cuteblacktiger";
            $dbname = "a186635";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM book_counseling WHERE Booking_ID = '$bookingId'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data
                $row = $result->fetch_assoc();
                $profilePic = empty($row["ProfilePic"]) ? 'https://static.thenounproject.com/png/5034901-200.png' : $row["ProfilePic"];

                echo '<div class="bookingBox">';
                echo '<h2 class="title">Booking Details</h2><br>';

                echo '<img src="' . $profilePic . '" alt="Profile Picture">';
                echo '<div class="bookingDetails">';
                echo '<p><strong>Booking ID:</strong> ' . $row['Booking_ID'] . '</p>';
                echo '<p><strong>Student\'s Name:</strong> ' . $row['Full_Name'] . '</p>';
                echo '<p><strong>Matric No:</strong> ' . $row['Matric_No'] . '</p>';
                echo '<p><strong>Phone No:</strong> ' . $row['Phone_No'] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row['Description'] . '</p>';

                echo '</div></div>';

            $conn->close();
            } else {
                echo "Booking ID not provided in the URL";
            }
        }
        ?>

        <div class="setdate">
            <form action="" method="POST">
                <label for="appointment-date">Choose a date and time for your appointment:</label>
                <input type="datetime-local" id="counseldate" name="counseldate" required>
                <input type="submit" value="Set Appointment" name="submit">
            </form>
        </div>
    </div>

</body>

</html>