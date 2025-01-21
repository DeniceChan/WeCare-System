<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeCare: List of Donatee</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        body {
            background-color: #FFCABF; 
        }
        h2 {
            color: #667C26;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
// Check if Request_ID is provided in the URL
if (isset($_GET['Request_ID'])) {
    $requestID = $_GET['Request_ID'];

    // Fetch data based on Request ID
    $servername = "lrgs.ftsm.ukm.my";
    $username = "a186635";
    $password = "cuteblacktiger";
    $dbname = "a186635";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch details for the provided Request ID
    $sql = "SELECT gd.Donator_Name, gd.Total FROM give_donation gd
            WHERE gd.Request_ID = '$requestID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data
        ?>
        <div class="container-fluid" style="text-align: center;">
            <div class="row">
                <div style='display: inline-block; margin: 0 auto; padding: 3px;'>
                    <div class="panel panel-default">
                        <div class="panel-heading text-left"><strong>Donatee List</strong></div>
                        <div class="panel-body text-left">
                            Below is the list of donatees and their donation amounts.
                        </div><br>

                        <table class="table text-left">
                            <tr>
                                <th>Donatee Name</th>
                                <th>Amount Donated</th>
                            </tr>

                            <?php
                            $totalAmountDonated = 0; // Initialize total amount

                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $row['Donator_Name']; ?></td>
                                    <td>RM <?php echo $row['Total']; ?></td>
                                </tr>
                                <?php
                                $totalAmountDonated += $row['Total']; // Accumulate total amount
                            }
                            ?>
                            <tr>
                                <td colspan="2" style="text-align: right;"><strong>Total Amount Donated:</strong> RM <?php echo $totalAmountDonated; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "No data found for the provided Request ID.";
    }

    $conn->close();
} else {
    echo "Request ID is not provided in the URL.";
}
?>

</body>
</html>
