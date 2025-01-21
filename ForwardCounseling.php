<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare System: Forward Counselling</title>

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">

    <!-- DataTables CSS for pagination -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"> -->
     <!-- Script Datatable-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

  <style type="text/css">
    
  body {
      background: rgb(229,207,255);
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

        
  .btn btn-primary {
      background: linear-gradient(45deg, #1a84b8, #1aa4b8); /* Apply the gradient background */
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
      justify-content: center;
      margin-bottom: 40px;
  }

   .new {
        color: blue;
        font-weight: bold;
    }

    .forwarded {
        color: orange;
        font-weight: bold;
    }

    h1 {
  		font-size: 45px; 
  		letter-spacing: -1px; 
  		line-height: 1;
  		text-align: left;
  		font-family: Impact, fantasy;
  		font-weight: 80;
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


    <?php

    // Check if Matric No is provided in the URL
    if (isset($_GET['booking_id'])) {
        $bookingId = $_GET['booking_id'];

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
          <div id="options">
            <input type="checkbox" id="options-toggle"/>
            <ul>
              <li>
                <a>WeCare</a>
              </li>
              <li>
                <a href="PERTAMA_Index.php">&#8962;</a>
              </li>
            </ul>
          </div>

        	<div class="container py-5">
        	    <div class="row justify-content-center">
        	        <div class="col-6">
        	            <img src="https://cdn-icons-png.flaticon.com/512/3475/3475821.png" alt="Icon" class="icon d-block mx-auto" style="width: 150px; height: 150px;">
        	            <h1 class="text-center" style="color: black;">Counseling Request Details</h1>
        	        </div>
        	    </div>
        	</div>

    <?php

        $sql = "SELECT * FROM book_counseling WHERE Booking_ID = '$bookingId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data
            $row = $result->fetch_assoc();
            $matricNo = $row["Matric_No"];
            $profilePicPath = "Profile/{$matricNo}_profile.jpg";
            $profilePic = file_exists($profilePicPath) ? $profilePicPath : 'https://static.thenounproject.com/png/5034901-200.png';



            // Add a class to the status based on its value
    		$statusClass = '';
    		switch ($row["Counsel_Status"]) {
        		case 'New':
            		$statusClass = 'new';
            		break;
        		case 'Forwarded':
            		$statusClass = 'forwarded';
            		break;
        		default:
            		$statusClass = ''; // Default class, if needed
    		}

            echo '<div class="container mt-5">
                    <div class="rectangular-box" style="color: black;">
                    <img src="' . $profilePic . '" alt="Profile Picture" class="box-image">

                        <div class="box-content">
      
                            <h2>' . $row["Full_Name"] . '</h2><br>

                            <table class="table">
                            <tr>
                            <td class="col-xs-4 col-sm-4 col-md-4"><strong>Booking ID</strong></td>
                            <td>' . $row["Booking_ID"] . '</td>
                            </tr>
                             <tr>
                           <td><strong>Status</strong></td>
                           <td class="' . $statusClass . '">' . $row["Counsel_Status"] . '</td>
                           </tr>
                            <tr>
                            <td><strong>Matric No</strong></td>
                            <td>' . $row["Matric_No"] . '</td>
                            </tr>
                            <tr>
                            <td><strong>Phone No.</strong></td>
                            <td>' . $row["Phone_No"] . '</td>
                            </tr>
                            <tr>
                            <td><strong>Description</strong></td>
                            <td>' . $row["Description"] . '</td>
                            </tr>
                            </table>
                       </div>
                    </div>
                </div>';
        } else {
            echo "No results found for Request ID: $requestId";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        	if (isset($_POST["forward"])) {

        		// Update the database with the status set to "Forwarded"
            $updateSql = "UPDATE book_counseling SET  Counsel_Status = 'Forwarded' WHERE Booking_ID = '$bookingId'";

            	if ($conn->query($updateSql) === TRUE) {
              		echo '<script>alert("Counseling request forwarded successfully.");</script>';
              		echo '<script>window.location.href = "CounselingRequestList.php";</script>';
            exit; // Make sure to exit after the redirection
        		}
            } else {
              echo "Error updating record: " . $conn->error;
        	}
        }

        $conn->close();

    } else {
        echo "Request ID not provided in the URL";
    }
    ?>

    <br></br>

    <div class="row justify-content-center">
    	<form method="POST" action="">
        	<button type="submit" name="forward" class="forwardButton">Forward</button>
    	</form>
	</div>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

</body>

</html>