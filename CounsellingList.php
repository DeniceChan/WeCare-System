<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare: Counselling List</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">

    <!-- DataTables CSS for pagination -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">


    <style type="text/css">
        body {
            background: rgb(229,207,255);
            background-image: url(donateepage.jpg);
            background-size: cover;
            font-family: "Times New Roman", Times, serif;
        }

        #example_paginate .paginate_button {
            background-color: #ADD8E6 ; /* Green color for buttons */
            color: #000000; /* Text color for buttons */
            border-radius: .25rem; /* Optional: rounded corners for buttons */
            margin: 1px; /* Optional: adjust spacing between buttons */
             text-decoration: none;
        }

        #example_paginate .paginate_button:hover {
            background-color: #ADD8E6  ; /*
             Darker green color on hover */
             color: #000000;
             text-decoration: none;
        }

        #example_paginate .paginate_button.current {
            background-color: #ADD8E6 ; /* Darker green color for the active/current button */
            color: #000000;
             text-decoration: none;
        }

        #example_paginate .paginate_button.current:hover {
            background-color: #ADD8E6 ; /* Slightly darker green color for the active/current button on hover */
            color: #000000;
             text-decoration: none;
        }

        .custom-button-details {
          background-color: #28a745;
          border-color: #28a745;
          color: #fff;
          border-radius: 4px;
        }

        .page {
          text-decoration: none;
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
$servername = "lrgs.ftsm.ukm.my";
$username = "a186635";
$password = "cuteblacktiger";
$dbname = "a186635";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM book_counseling");
    $stmt->execute();
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

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

<div class="container py-5">
  <div class="row justify-content-center">
            <div class="col-6">
                <!-- Apply the "bold-text" class to make the text bold -->
                <h1 class="bold-text text-center" style="color: black;">Counselling List</h1>
            </div>
        </div>
  <div class="row py-5">
    <div class="col-lg-10 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="booking-id-column">Booking ID</th>
                  <th>Full Name</th>
                  <th>Matric No</th>
                  <th>Contact</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <?php
                    foreach ($result as $row) {
                      echo "<tr>";
                      echo "<td>{$row['Booking_ID']}</td>";
                      echo "<td>{$row['Full_Name']}</td>";
                      echo "<td>{$row['Matric_No']}</td>";
                      echo "<td>{$row['Phone_No']}</td>";
                      echo "<td>{$row['Counsel_Status']}</td>";
                      echo "<td>";
                      echo "<button type='button' onclick=\"window.location.href='BookingDetails.php?bid={$row['Booking_ID']}'\" class='custom-button-details'>Details</button>";
                      echo "</td>";
                      echo "</tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- DataTables jQuery -->
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>

    <script class="page">
        jQuery.noConflict();
        $(document).ready(function () {
            $('#example').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [10, 25, 50, 75, 100],
                "language": {
                    "paginate": {
                        "previous": "Previous",
                        "next": "Next"
                    }
                }
            });
        })(jQuery);
    </script>
</html>