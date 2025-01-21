<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
  <title>WeCare: Donation Record Details</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      img {
          display: block;
          margin-left: auto;
          margin-right: auto;
        }
        body {
      background-color: #FFCABF; 
    }

    h2{
      color: #667C26;
      font-weight: bold;
    }

    </style>

</head>
<body>


<?php

// Check if Matric No is provided in the URL
if (isset($_GET['Transaction_ID'])){
    $transactionID = $_GET['Transaction_ID'];

    // Fetch data based on Request ID
    $servername = "lrgs.ftsm.ukm.my";
    $username = "a186635";
    $password = "cuteblacktiger";
    $dbname = "a186635";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

}

$sql = "SELECT * FROM give_donation WHERE Transaction_ID = '$transactionID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data
    $row = $result->fetch_assoc();
}
    ?>

    <div class="container-fluid" style = "text-align: center;">
  <div class="row">
    <div style='display: inline-block; margin: 0 auto; padding: 3px;'>

      <div class="panel panel-default">
      <div class="panel-heading text-left" class="text-left"><strong>Donation Details</strong></div>
      <div class="panel-body text-left">
          Below are details of donations.
      </div><br>
      <td><strong>Proof Payment</strong></td>
      <table class="table text-left">

        <tr>
        <tr>
    
    <img src="<?php echo $row['proofDoc']; ?>" alt="Proof Payment" style="width: 50%;">
</tr>
          <td class="col-xs-4 col-sm-4 col-md-4" style="text-align: left;"><strong>Transaction ID</strong></td>
          <td><?php echo $row['Transaction_ID'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><strong>Matric No</strong></td>
          <td><?php echo $row['Matric_No'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><strong>Donator Name</strong></td>
          <td><?php echo $row['Donator_Name'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><strong>Total </strong></td>
          <td>RM <?php echo $row['Total'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><strong>Request ID</strong></td>
          <td><?php echo $row['Request_ID'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><strong>Full Name</strong></td>
          <td><?php echo $row['Full_Name'] ?></td>
        </tr>
        <tr>
          <td style="text-align: left;"><strong>Donate Time</strong></td>
          <td><?php echo $row['Donate_Time'] ?></td>
        </tr>
      </table>
      </div>
    </div>
  </div>
</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
