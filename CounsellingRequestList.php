<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare: Counselling Request List</title>

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
            min-height: 100vh;
            /* background-color: #FFDE59; */
            color: #000;
            font-family: 'Times New Roman', Times, serif;
            background: rgb(229,207,255);
            /*background: linear-gradient(99deg, rgba(243,225,182,1) 39%, rgba(230,193,105,1) 62%); */
            background-image: url(donateepage.jpg);
            background-size: cover;

        }

        .custom-button-details {
          background-color: #28a745;
          border-color: #28a745;
          color: #fff;
          border-radius: 4px;
        }

        @import "https://fonts.googleapis.com/css?family=Montserrat:300,400,700";
.rwd-table {
  width: 100%;
  margin: 1em 0;
  min-width: 300px;
  padding: 0 2em;
  font-family: 'Times New Roman', Times, serif;
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
  
}
.rwd-table tr {
  border-top: 0px solid #fff;
  border-bottom: 0px solid #fff;
}
.rwd-table th {
  display: none;
}
.rwd-table td {
  display: block;
}
.rwd-table td:first-child {
  padding-top: .5em;
}
.rwd-table td:last-child {
  padding-bottom: .5em;
}
.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 6.5em;
  display: inline-block;
}
@media (min-width: 480px) {
  .rwd-table td:before {
    display: none;
  }
}
.rwd-table th, .rwd-table td {
  text-align: left;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child, .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child, .rwd-table td:last-child {
    padding-right: 0;
  }
}

.rwd-table {
  background: #fff;
  color: #000;
  border-radius: .4em;
  overflow: hidden;
}
.rwd-table tr {
  border-color: #46637f;
}
.rwd-table th, .rwd-table td {
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    padding: 1em !important;
  }
}
.rwd-table th, .rwd-table td:before {
  color: #706233;
  font-size: 15px;
}

.rwd-table tbody tr:hover {
    background-color: #E3C770;
    transition: background-color 0.3s;
}

.rwd-table tbody tr:hover td {
    border-color: transparent; /* Remove borders between cells on hover */
}


h1 {
  font-size: 45px; 
  letter-spacing: -1px; 
  line-height: 1;
  text-align: left;
  font-family: 'Times New Roman', Times, serif;
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


td.status {
    /* Common styles for all status */
    padding: 7px;
    text-align: center;
}

td.status span {
    display: inline-block;
    border-radius: 50%;
    padding: 7px;
  border-radius: 500px;
  width: 100px; /* Set a fixed width */
    height: 20px; /* Set a fixed height */
  /* animation: showup 10s infinite; Adjust the duration as needed */
  color: #fff;
  /* opacity: 0; Start with opacity set to 0 */
}

td.status.new span {
    background-color: #427D9D;
    /* border: 2px solid blue; Border color for 'New Request' */
    color: black; /* Text color for 'New Request' */
    animation: showup 5s infinite;
    opacity: 0; /* Start with opacity set to 0 */
    font-weight: bold;
}

td.status.forwarded span {
    background-color: orange; /* No background color */
    /* border: 2px solid red; Border color for 'Rejected' */
    color: black; /* Text color for 'Rejected' */
    font-weight: bold;
}

@keyframes showup {
  0%, 100% {
    opacity: 0;
  }
  50% {
    opacity: 1;
  }
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

        // Custom sorting function to sort by date and status
        usort($result, function ($a, $b) {
          // Compare by status (prioritize 'New Request')
          if ($a['Counsel_Status'] == 'New' && $b['Counsel_Status'] != 'New') {
              return -1; // $a comes first
          } elseif ($a['Counsel_Status'] != 'New' && $b['Counsel_Status'] == 'New') {
              return 1; // $b comes first
          }

          // If both have the same status, compare by date
          return strtotime($b['Set_Date']) - strtotime($a['Set_Date']);
      });

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
      <a href="PERTAMA_Index.php">&#8962;</a>
    </li>
  </ul>
</div>



<br>
<br>
<br>
<div class="container py-5">
    <div class="row justify-content-start">
        <div class="col-12">
            <h1 class="text-left" style="color: black; margin-left: 220px;">Counselling Request List</h1>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="card rounded shadow border-0">
                <div class="card-body p-5 rounded" style="background-color: #fff; width: 910px;">
                        <!-- <div class="table-responsive"> -->
                        
                            <table id="requestList" class="rwd-table" style="width: 840px;">
                                <thead>
                                    <tr>
                                        <th class="booking-id-column l">Booking ID</th>
                                        <th>Name</th>
                                        <th>Matric No</th>
                                        <th>Phone No</th>
                                        <!--<th>Description</th> -->
                                        <th>Status</th>
                                        <!-- <th>Date Time</th> -->

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
                                       
                                        $statusClass = strtolower(str_replace(' ', '-', $row['Counsel_Status']));
                                        echo "<td class='status " . $statusClass . "'><span>{$row['Counsel_Status']}</span></td>";
                                        // echo "<td class=''>{$row['Date_Time']}</td>";
                                        echo "<td>";
                                        echo "<button type='button' onclick=\"window.location.href='ForwardCounseling.php?booking_id={$row['Booking_ID']}'\" class='custom-button-details'>Details</button>";
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



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- DataTables jQuery -->
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>



    <!-- <script>
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        jQuery('#requestList').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [5, 10, 15, 25, 50],
            "language": {
                "paginate": {
                    "previous": "Previous",
                    "next": "Next"
                }
            },
            "dom": 'Bfrtip', // Add the "B" option for Buttons
            "buttons": [
                'pageLength', // Page length button
                'colvis', // Column visibility button
                {
                    text: 'Filter',
                    action: function (e, dt, node, config) {
                        // Add your custom filter logic here
                        alert('Filter button clicked!');
                    }
                }
            ]
        });
    })(jQuery);
</script> -->

<script type="text/javascript">
          $(document).ready( function () {
            $('#rwd-table').DataTable();
          } );
        </script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Datatable jQuery-->
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>

        <!-- DataTables Buttons CSS and JS -->

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>


<!-- DataTable Script-->
<script>
$(document).ready(function () {
    var table = $('#requestList').DataTable({
        lengthMenu: [
            [5, 10, 15, 25, 50],
            [5, 10, 22, 30, 'All'],
        ],
        order: [
            [4, 'desc'], // Sort by the fifth column (Status) in descending order
            [5, 'desc']  // Then sort by the sixth column (Date_Time) in descending order
        ],
    });

    // Add click event listener to the table rows
    $('#requestList tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected-row');
    });

    // Add click event listener for the sort button
    $('.sort-btn').on('click', '[data-sort]', function (event) {
        event.preventDefault();

        var $this = $(this),
            columnIndex = $this.data('column'),
            sortDir = table.order()[0][1];

        if (sortDir === 'desc') {
            sortDir = 'asc';
        } else {
            sortDir = 'desc';
        }

        // Update the DataTables sorting
        table.order([columnIndex, sortDir]).draw();
    });
});
</script>


</body>
</html>