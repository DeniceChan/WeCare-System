<?php
include 'db.php';
include 'session.php';


$user_id = $_SESSION['user_id'];
// echo "User ID: " . $user_id . "<br>";
// echo "Position: " . $position;

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare: Timeline Status</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


    <style>

.main-timeline{ font-family: 'Poppins', sans-serif; }
.main-timeline:after{
    content: '';
    display: block;
    clear: both;
}
.main-timeline .timeline{
    width: calc(50% + 1px);
    padding: 15px 15px 0 0;
    margin: 0 0 20px 5px;
    float: right;
    position: relative;
    z-index: 1;
}
.main-timeline .timeline-content{
    color: #fff;
    background-color: #87CEEB;
    min-height: 120px;
    padding: 18px 15px 15px 50px;
    border-radius: 30px;
    display: block; 
    position: relative;
}
.main-timeline .timeline-content:hover{ text-decoration: none; }
.main-timeline .timeline-content:before{
    content: '';
    background-color: #263646;
    height: 70%;
    width: 40%;
    border-radius: 40px;
    position: absolute;
    right: -15px;
    top: -15px;
    z-index: -2;
}
.main-timeline .timeline-icon{
    color: #fff;
    background-color: #263646;
    font-size: 33px;
    text-align: center;
    line-height: 75px;
    height: 70px;
    width: 70px; 
    border-radius: 50%;
    transform: translateY(-50%);
    position: absolute;
    left: -35px;
    top: 50%;
}
.main-timeline .title{
    font-size: 25px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: capitalize;
    margin: 0 0 7px;
}
.main-timeline .description{
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    line-height: 20px;
    margin: 0;
}
.main-timeline .timeline:nth-child(even){
    padding: 15px 0 0 15px;
    margin: 0 5px 20px 0;
    float: left;
}
.main-timeline .timeline:nth-child(even) .timeline-content{ padding: 15px 50px 15px 15px; }
.main-timeline .timeline:nth-child(even) .timeline-content:before{
    right: auto;
    left: -15px;
}
.main-timeline .timeline:nth-child(even) .timeline-icon{
    left: auto;
    right: -35px;
}
.main-timeline .timeline:nth-child(4n+2) .timeline-content{ background: #FFB6C1; }
.main-timeline .timeline:nth-child(4n+3) .timeline-content{ background: #DDA0DD; }
.main-timeline .timeline:nth-child(4n+4) .timeline-content{ background: #FA8072; }
@media screen and (max-width:767px){
    .main-timeline .timeline{
        width: 100%;
        padding-left: 35px;
        margin: 0 0 40px;
    }
    .main-timeline .timeline:nth-child(even){ padding-right: 35px; }
}
@media screen and (max-width:576px){
    .main-timeline .timeline{ padding: 35px 15px 15px 0; }
    .main-timeline .timeline-content,
    .main-timeline .timeline:nth-child(even) .timeline-content{
        padding: 50px 15px 15px;
        text-align: center;
    }
    .main-timeline .timeline-content:before,
    .main-timeline .timeline:nth-child(even) .timeline-content:before{
        top: auto;
        bottom: -15px;
    }
    .main-timeline .timeline-icon,
    .main-timeline .timeline:nth-child(even) .timeline-icon{
        transform: translateY(0) translateX(-50%);
        left: 50%;
        right: auto;
        top: -35px;
    }
}

.title {
    color: #fff;
    font-family: 'Helvetica', sans-serif;
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
    font-family: 'Arial', sans-serif;
}

.corner-text {
    position: absolute;
    top: 20px; /* Adjust the top distance as needed */
    right: 40px; /* Adjust the right distance as needed */
    font-size: 14px;
    font-weight: bold;
    color: #333;
}

.amounttext {
    font-size: 17px;
    color: #000000;
    margin-bottom: 1px;
    font-family: 'Arial', sans-serif;
}

.amounttext1 {

    font-size: 20px;
}
.box-content {
    font-family: "Times New Roman", Times, serif;
}
 #popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        z-index: 999;
    }

    .popup-content {
        text-align: center;
    }

    h3 {
        color: #333;
    }

    button {
        margin-top: 10px;
        padding: 8px 16px;
        cursor: pointer;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
    }
    .popup-btn {
    width: 100%; /* Adjust the width as needed */
    margin-top: 10px; /* Adjust the top margin as needed */
    padding: 8px 16px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
}
body {
            min-height: 100vh;
            /* background-color: #FFDE59; */
            color: #000;
            font-family: 'Times New Roman', Times, serif;
            /*background: linear-gradient(99deg, rgba(243,225,182,1) 39%, rgba(230,193,105,1) 62%); */
            background-image: url(donateepage.jpg);
            background-size: cover;

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

<div id="options">
  <input type="checkbox" id="options-toggle"/>
  <ul>
    <li>
      <a>WeCare</a>
    </li>
    <li>
    <a href="DonationStatus.php">
    <i class="fa fa-list-ul" aria-hidden="true"></i>
    </li>
  </ul>
  
  </a>
</div>

<?php

$servername = "lrgs.ftsm.ukm.my";
$username = "a186635";
$password = "cuteblacktiger";
$dbname = "a186635";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve Matric No from the URL
$requestID = isset($_GET['Request_ID']) ? $_GET['Request_ID'] : '';

// Fetch data from the database
$sql = "SELECT * FROM request_donation_form WHERE Matric_No = '$user_id'";
    $result = $conn->query($sql);
// Fetching data moved here
$row = $result->fetch_assoc();
$requestID = $row['Request_ID'];

?>

<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="bold-text text-center" style="color: black; font-size: 50px;">Donation Request Timeline</h1>
            <p class="text-center">REQUEST ID: <?php echo $requestID; ?></p>
            <br>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-timeline">

                    <?php
                    // Loop through the fetched data and generate timeline elements
                    do {
                        // Replace hardcoded values with data from the database
                        if (!empty($row['Matric_No'])) {
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
                            $date = $row['Date_Time'];
                            $review = $row['Review_stat'];
                            $reviewTime = $row['Review_time'];
                            $approved = $row['Approved_stat'];
                            $approvedTime = $row['Approved_time']; // Adjust the format here
                            ?>

                            <!-- Timeline HTML here -->
                            <div class="timeline">
                                <div class="timeline-content">
                                    <div class="timeline-icon"><i class="fa fa-file-text" aria-hidden="true"></i></div>
                                    <h3 class="title">New Request</h3>
                                    <p class="description">
                                        Name: <?php echo $name; ?><br>
                                        Matric No: <?php echo $matricNo; ?> <br>
                                        Type of Donation: <?php echo $donationType; ?> <br>
                                        Date: <?php echo $date; ?>
                                    </p>
                                </div>
                            </div>
                             <div class="timeline">
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fas fa-edit" aria-hidden="true"></i></div>
                        <h3 class="title">Review</h3>
                        <p class="description">
                            Reviewed by:  <?php echo $review; ?><br>
                            Date: <?php echo $reviewTime; ?>
                        </p>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-content">
                        <div class="timeline-icon"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div>
                        <h3 class="title">Approval</h3>
                        <p class="description">
                            Management:  <?php echo $approved; ?><br>
                            Date: <?php echo $approvedTime; ?>
                        </p>
                    </div>
                </div>
                            <!-- End Timeline HTML -->

                        <?php
                        }
                    } while ($row = $result->fetch_assoc());
                    ?>

                </div>
            </div>
        </div>
    </div>

    <!-- Move the profile box code inside the loop -->
    <?php

    // Reset the result pointer to the beginning of the data
    $result->data_seek(0);
    while ($row = $result->fetch_assoc()) {
        // Replace hardcoded values with data from the database
        if (!empty($row['Matric_No'])) {
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
            $date = $row['Date_Time'];
            $Comment = $row['Comment'];
            $currentDateTime = date("d/m/Y H:i:s"); // Adjust the format here
            ?>

            <div class="container mt-5" style="font-family: 'Times New Roman', Times, serif; color: black;">
                <div class="rectangular-box">
                    <img src="<?php echo $profilePic; ?>" alt="Image" class="box-image">
                    <div class="box-content">
                        <h2 class="namestat"><?php echo $name; ?></h2>
                        <p class="requestidstat">Request ID: <?php echo $requestID; ?></p>
                        <p class="matricnostat">Matric No: <?php echo $matricNo; ?></p>
                        <p class="donationtypestat">Type of donation: <?php echo $donationType; ?></p>
                        <p class="status">Status: <?php echo $status; ?></p>

                        <!-- Popup container -->

        <?php if ($status == 'Returned'): ?>
    <button onclick="openPopup()">View Feedback</button>
<?php endif; ?>

<div id="popup">
    <div class="popup-content">
        <h3>Feedback</h3>
        <?php if ($status == 'Returned'): ?>
            <p><?php echo htmlspecialchars($Comment); ?></p>
            <a href="EditForm.php?edit=<?php echo $matricNo; ?>" class="btn btn-success btn-xs popup-btn" role="button">Edit</a>
        <?php endif; ?>
        <button onclick="closePopup()" class="popup-btn">Close</button>
    </div>
</div>

<div class="corner-text">
                            <p class="amounttext1" style="color: black; font-size: 30px;">DONATION AMOUNT</p>

<?php



$Totals = array();
$counter = 0;

// Assuming you already have $requestID defined earlier
$sql = "SELECT * FROM give_donation WHERE Request_ID = '$requestID'";
$result = $conn->query($sql);

while ($detailrow = $result->fetch_assoc()) {
    // Assuming 'Total' is the column representing the donation amount
    $donationAmount = $detailrow['Total'];

    // Add the donation amount to the total
    $Totals[] = $donationAmount;

    $counter++;
}

// Additional code (if needed) goes here

// Calculate the total donation amount
$totalDonation = array_sum($Totals);

// Output the total donation for the request
echo "<p class='donation-amount' style='color: black; font-size: 30px;'>RM $totalDonation</p>";
?>

                            <p class="amounttext">Date: <?php echo $currentDateTime; ?></p>
                        </div>
                    </div>
                </div>
            </div>




        <?php
        }
    }
    ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    
</div>





    <!-- JavaScript functions -->
    <script type="text/javascript">
        // Open popup function
        function openPopup() {
            document.getElementById("popup").style.display = "block";
        }

        // Close popup function
        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }

        
    </script>

</body>


</html>
