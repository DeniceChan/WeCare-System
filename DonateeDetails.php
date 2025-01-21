<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare System: Donatee Details</title>
   <style>
    
  body {
      /*background: linear-gradient(99deg, rgba(243,225,182,1) 39%, rgba(230,193,105,1) 62%); */
      background-image: url(donateepage.jpg);
      background-size: cover;
  }
        
  .title {
      text-align: left;
      font-size: 40px;
      font-weight: bold;
      margin-top: 0px;
  }
      
        
  input {
      display: block;
      visibility: visible;
  }

        
  .btn btn-primary {
      background: linear-gradient(45deg, #FF3131, #FF914D); /* Apply the gradient background */
      color: #fff; /* Text color is white */
      border: none; /* Remove the default button border */
      border-radius: 10px; /* Apply rounded corners */
      padding: 10px 20px; /* Add some padding for a rectangular shape */
      font-weight: bold; /* Make the text bold */

      /* Add your custom design here */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .rectangular-box {
      display: flex;
      align-items: center;
      padding: 20px;
      border: 1px solid #ddd; /* Border color */
      border-radius: 15px; /* Adjust as needed */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for depth */
      position: relative; /* Add position relative to enable absolute positioning of the button */
      background-color: rgba(239, 239, 240, 0.8);
      max-width: 650px; /* Set a maximum width for the box */
      margin: 0 auto; /* Center the box horizontally */
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

  .returnButton {
      background: linear-gradient(45deg, #59090C, #E50914); /* Apply the gradient background */
      color: #fff; /* Text color is white */
      border: none; /* Remove the default button border */
      border-radius: 10px; /* Apply rounded corners */
      padding: 10px 20px; /* Add some padding for a rectangular shape */
      font-weight: bold; /* Make the text bold */
      cursor: pointer;
      margin: 10px auto; /* Center the button */
      display: block; /* Ensure it's a block-level element for centering */
      width: fit-content; /* Set the width to fit the content */
      margin-top: 20px;
      margin-bottom: 40px;
  }

  .forwardButton {
      background: linear-gradient(45deg, #022954, #5d76cb); /* Apply the gradient background */
      color: #fff; /* Text color is white */
      border: none; /* Remove the default button border */
      border-radius: 10px; /* Apply rounded corners */
      padding: 10px 20px; /* Add some padding for a rectangular shape */
      font-weight: bold; /* Make the text bold */
      cursor: pointer;
      margin: 10px auto; /* Center the button */
      display: block; /* Ensure it's a block-level element for centering */
      width: fit-content; /* Set the width to fit the content */
      margin-top: 20px;
      margin-bottom: 40px;
  }

  .returnButton,
  .forwardButton {
      display: inline-block; /* Make the buttons inline */
      margin-right: 10px; /* Add some space between the buttons */
  }

   .new-request {
        color: blue;
        font-weight: bold;
        
    }

    .returned {
        color: red;
        font-weight: bold;
      
    }

    .approved {
        color: #4CBB17;
        font-weight: bold;
        background-color: blue;
    }

    .edited {
        color: #9EA014;
        font-weight: bold;
    }

    .forwarded {
        color: orange;
        font-weight: bold;
    }

    .rejected {
        color: black;
        font-weight: bold;
    }

    .new-request,
.returned,
.approved,
.edited,
.forwarded,
.rejected {
  /* ... (previous styles) ... */
  display: inline-block; /* Ensure the status label doesn't break to a new line */
}

.form-control {
  height: 120px;
  width: 400px
}


  h1 {
  font-size: 35px; 
  letter-spacing: -1px; 
  line-height: 1;
  text-align: center;
  font-family: 'Times New Roman', Times, serif;
  font-weight: 80;
}
.container {
  text-align: center; /* Center the content within the container */
}

.form-group {
  margin-top: 20px; /* Add some space above the form */
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

    <script>
        function updateCommentRequiredStatus(isReturn) {
            var commentsTextarea = document.getElementById('comments');
            commentsTextarea.required = isReturn;
        }
    </script>
</head>

<body>

<div id="options">
  <input type="checkbox" id="options-toggle"/>
  <ul>
    <li>
      <a>WeCare</a>
    </li>
    <li>
    <a href="DonateeRequestList.php">
    <i class="fa fa-list-ul" aria-hidden="true"></i>
    </li>
  </ul>
  
  </a>
</div>


    <?php

    // Check if Matric No is provided in the URL
    if (isset($_GET['request_id'])) {
        $request_id = $_GET['request_id'];

        // Fetch data based on Request ID
        $servername = "lrgs.ftsm.ukm.my";
        $username = "a186635";
        $password = "cuteblacktiger";
        $dbname = "a186635";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>

        <br><br><br>
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-12">
                    <h1 class="text-left" >Donatee Request Details</h1>
                </div>
            </div>

    <?php

        $sql = "SELECT * FROM request_donation_form WHERE Request_ID = '$request_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data
            $row = $result->fetch_assoc();
            $profilePic = empty($row["ProfilePic"]) ? 'https://static.thenounproject.com/png/5034901-200.png' : $row["ProfilePic"];
            $documentPath = 'uploads/docs/' . $row["Document"]; // Assuming Document column stores the filename
            $pictureFilename = 'uploads/qr/' . $row["QR"]; // Assuming Document column stores the filename

            // Add a class to the status based on its value
    $statusClass = '';
    switch ($row["Status"]) {
        case 'New Request':
            $statusClass = 'new-request';
            break;
        case 'Returned':
            $statusClass = 'returned';
            break;
        case 'Approved':
            $statusClass = 'approved';
            break;
        case 'Forwarded':
            $statusClass = 'forwarded';
            break;
        case 'Edited':
            $statusClass = 'edited';
            break;
        case 'Rejected':
            $statusClass = 'rejected';
        break;
        default:
            $statusClass = ''; // Default class, if needed
    }

            echo '<div class="container mt-5">
                    <div class="rectangular-box" style="color: black;">
                        <img src="' . $profilePic . '" alt="Profile Picture" class="box-image">
                        <div class="box-content">
      
                            <h2 style="margin-left:-110px;">' . $row["Full_Name"] . '</h2><br>

                            <table class="table">
                            <tr>
                            <td class="col-xs-4 col-sm-4 col-md-4" style="text-align:left;"><strong>Request ID</strong></td>
                            <td style="margin-left:80px;">' . $row["Request_ID"] . '</td>
                            </tr>
                             <tr>
                           <td style="text-align:left;"><strong>Status</strong></td>
                           <td style="margin-right:11px;" class="' . $statusClass . '">' . $row["Status"] . '</td>
                           </tr>
                            <tr>
                            <td style="text-align:left;"><strong>Matric No</strong></td>
                            <td> ' . $row["Matric_No"] . '</td>
                            </tr>
                            <tr>
                            <td style="text-align:left;"><strong>Id</strong></td>
                            <td>' . $row["ID"] . '</td>
                            </tr>
                            <tr>
                            <td style="text-align:left;"><strong>Phone No.</strong></td>
                            <td>' . $row["Phone_No"] . '</td>
                            </tr>
                            <tr>
                            <td style="text-align:left;"><strong>Address</strong></td>
                            <td>' . $row["House_Address"] . '</td>
                            </tr>
                            <tr>
                            <td style="text-align:left;"><strong>Type of Donation</strong></td>
                            <td>' . $row["Donation_Type"] . '</td>
                            </tr>
                             <tr>
                            <td style="text-align:left;"><strong>Bank Merchant</strong></td>
                            <td>' . $row["Bank_Merchant"] . '</td>
                            </tr>
                            <tr>
                            <td style="text-align:left;"><strong>Account Number</strong></td>
                            <td>' . $row["Account_Number"] . '</td>
                            </tr>
                            <tr>
                            <td style="text-align:left;"><strong>Request Date</strong></td>
                            <td>' . $row["Date_Time"] . '</td>
                            </tr>
                            <tr>
                            <td style="text-align:left;"><strong>Supported Document</strong></td>
                            <td><img src="' . $documentPath . '" alt="Supported Document" style="max-width: 60%;"></td>
                            </tr>
                            <tr>
                            <td style="text-align:left;"><strong>QR Payment</strong></td>
                            <td><img src="' . $pictureFilename . '" alt="QR Payment" style="max-width: 50%;"></td>
                            </tr>
                            <tr>
                            <td style="text-align:left;"><strong>Comment</strong></td>
                            <td>' . $row["Comment"] . '</td>
                            </tr>
                    
                            </table>
                       </div>
                    </div>
                </div>';
        } else {
            echo "No results found for Request ID: $request_id";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (isset($_POST["submit"])) {
          // "Return" button is clicked

          // Validate and sanitize the comment
          $comment = isset($_POST["comments"]) ? htmlspecialchars($_POST["comments"]) : '';

          // Update the database with the comment and set the status to "Return"
          $updateSql = "UPDATE request_donation_form SET Comment = '$comment', Status = 'Returned', Review_stat = 'Nur Syahirah Nabilah', Review_time = NOW() WHERE Request_ID = '$requestId'";
        
          if ($conn->query($updateSql) === TRUE) {
              echo '<script>alert("Donatee request returned for correction.");</script>';

            
          } else {
              echo "Error updating record: " . $conn->error;
          }
        } elseif (isset($_POST["forward"])) {
            // "Forward" button is clicked

            // Update the database with the status set to "Forwarded"
            $updateSql = "UPDATE request_donation_form SET Comment = '', Status = 'Forwarded', Review_stat = 'Nur Syahirah Nabilah', Review_time = NOW() WHERE Request_ID = '$request_id'";

            if ($conn->query($updateSql) === TRUE) {
              echo '<script>alert("Donatee request forwarded successfully.");</script>';
            } else {
              echo "Error updating record: " . $conn->error;
        }
            }
        }

        $conn->close();

    } else {
        echo "Request ID not provided in the URL";
    }
    ?>

    <br></br>

    <form action="" method="POST" class="form-group">

        <div class="row justify-content-center">
            <div class="col-6">

                Comment:<br>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                <div class="text-center">

                     <input type="submit" name="submit" value="Return" style="font-weight: bold;" class="returnButton" onclick="updateCommentRequiredStatus(true)">
                    <input type="submit" name="forward" value="Forward" style="font-weight: bold;" class="forwardButton" onclick="updateCommentRequiredStatus(false)">
                </div>
            </div>
        </div>

    </form>




    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

</body>

</html>
