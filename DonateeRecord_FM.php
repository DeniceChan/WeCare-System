
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare: Donatee Record List</title>

   
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
    <link href="//unpkg.com/layui@2.8.10/dist/css/layui.css" rel="stylesheet">


    <style type="text/css">

        body {
            min-height: 100vh;
            /* background-color: #FFDE59; */
            color: #000;
            font-family: 'Times New Roman', Times, serif;
            background: rgb(229,207,255);
            background-image: url(donateepage.jpg);
            background-size: cover;

        }

     
        .data-box {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            min-height: 150px;
            border-radius: 20px;
            box-shadow: 0 0 15px -5px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease 0s;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: left;
            max-width: 500px;
            font-size: 18px;
            width: 300px;
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

.see-more-btn {
            margin-top: 10px;
            padding: 8px 16px;
            border: 1px solid #28a745;
            border-radius: 20px;
            background-color: #224585;
            border-color: #224585;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .see-more-btn:hover {
            background-color: #12264d;
            border-color: #12264d;
        }

       h1 {
  font-size: 50px; 
  letter-spacing: -1px; 
  line-height: 1;
  text-align: center;
  font-family: 'Times New Roman', Times, serif;
  font-weight: 100;
}

    </style>
</head>

<body>
    <?php
$servername = "lrgs.ftsm.ukm.my";
$username = "a186635";
$password = "cuteblacktiger";
$dbname = "a186635";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM request_donation_form WHERE Status = 'Approved'";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $requestId = $row['Request_ID'];

        // Fetch donation amounts for the current request_id
        $donationSql = "SELECT SUM(Total) AS totalAmount FROM give_donation WHERE Request_ID = '$requestId'";
        $donationResult = $conn->query($donationSql);
        $donationRow = $donationResult->fetch_assoc();
        $totalAmount = $donationRow['totalAmount'];

        // Add total amount to the data array
        $row['Total_Amount'] = $totalAmount;
        $data[] = $row;
    }
}

$conn->close();
$json = json_encode($data);
?>

    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-6">
       <h1 class="text-center" style="color: black; font-size: 65px;"> <!-- Replace with the path to your image -->
                Donation Records
            </h1>
        </div>
    </div>
</div>

      <div id="options">
  <input type="checkbox" id="options-toggle"/>
  <ul>
    <li>
      <a>WeCare</a>
    </li>
    <li>
      <a href="FTSMManagement_Index.php">&#8962;</a>
    </li>
  </ul>
</div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <?php
            foreach ($data as $record) {
    echo '<div class="col-md-3">';
    echo '<div class="data-box">';
    echo '<p>Request ID: ' . $record['Request_ID'] . '</p>';
    echo '<p>Full Name: ' . $record['Full_Name'] . '</p>';
    echo '<p>Matric No: ' . $record['Matric_No'] . '</p>';
    echo '<p>Status: ' . $record['Status'] . '</p>';
    echo '<p><strong>Total Amount: RM' . $record['Total_Amount'] . '</strong></p>';
 // Display total amount

    // See more button
    // echo '<button class="see-more-btn" onclick="seeMore()">See more</button>';
    echo "<button type='button' class='see-more-btn' data-href='ListofDonateeDetails.php?Request_ID={$record['Request_ID']}'>See more</button>";
    echo '</div>';
    echo '</div>';
}
            ?>

<div class="bs-example">
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" data-keyboard="false"data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Donation Details</h4>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">

              </div>
            </div>
          </div>
        </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<!-- Datatable jQuery-->
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>

<script>
    $(document).ready(function () {
        $(".see-more-btn").click(function () {
            var dataURL = $(this).attr("data-href");
            $('.modal-body').load(dataURL, function () {
                $('#myModal').modal('show');
            });
        });

        // Reload the page after the modal is hidden
        $('#myModal').on('hidden.bs.modal', function () {
            location.reload();
        });

        // Add this part to close the modal properly
        $('#myModal').on('click', '[data-dismiss="modal"]', function () {
            $('#myModal').modal('hide');
        });
    });
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
