<?php
// Your PHP code for database connection and data fetching
$servername = "lrgs.ftsm.ukm.my";
$username = "a186635";
$password = "cuteblacktiger";
$dbname = "a186635";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $currentTime = date('d-m-Y h:i:s A', time());}

                 // Fetch data from the database with Month in words and sorted by date
                    $sql = "SELECT DATE_FORMAT(Date_Time, '%M %Y') AS MonthYear, Donation_Type, COUNT(*) AS RequestCount
                    FROM request_donation_form
                    GROUP BY MonthYear, Donation_Type
                    ORDER BY STR_TO_DATE(CONCAT('01 ', MonthYear), '%d %M %Y')";

            $result = $conn->query($sql);

            // Prepare data for Google Charts
            $data = [];

            while ($row = $result->fetch_assoc()) {
             $monthYear = $row['MonthYear'];
             $donationType = $row['Donation_Type'];
             $requestCount = $row['RequestCount'];

             if (!isset($data[$monthYear])) {
                 $data[$monthYear] = [
                     'MonthYear' => $monthYear,
                     'Natural Disaster' => null,
                     'Family Death' => null,
                 ];
             }

             if ($donationType === 'Natural Disaster') {
                 $data[$monthYear]['Natural Disaster'] = (int)$requestCount;
             } elseif ($donationType === 'Family Death') {
                 $data[$monthYear]['Family Death'] = (int)$requestCount;
             }
            }

            // Format data into the expected array format for Google Charts
            $formattedData = [['Month', 'Natural Disaster', 'Family Death']];
            foreach ($data as $monthData) {
             $formattedData[] = [
                 $monthData['MonthYear'],
                 $monthData['Natural Disaster'],
                 $monthData['Family Death']
             ];
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare System: Analytical Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.10.2/Chart.min.css">

    <style type="text/css">
        #options {
          position: absolute;
          z-index: 2;
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

        .buttonprint {
          margin-right: 300px;
          margin-left: 40px;
          margin-bottom: 40px;
           background: linear-gradient(45deg, #022954, #5d76cb); /* Apply the gradient background */
          color: #fff; /* Text color is white */
          border: none; /* Remove the default button border */
        border-radius: 10px; /* Apply rounded corners */
        padding: 10px 20px; /* Add some padding for a rectangular shape */
        font-weight: bold; /* Make the text bold */
        cursor: pointer;
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
            <a href="FTSMManagement_Index.php">&#8962;</a>
          </li>
        </ul>
    </div>


    <div class="Dashboard" style="width: 1440px; height: 990px; position: relative">

        \

      <div class="Rectangle4" style="width: 1440px; height: 993px; left: 0px; top: -3px; position: absolute; background: rgba(255, 255, 255, 0.90); border-radius: 25px"></div>

      <div class="WecareSystemAnalyticalReport" style="left: 51px; top: 90px; position: absolute; color: #171F46; font-size: 40px; font-family: Rubik; font-weight: 800; line-height: 40px; word-wrap: break-word">WeCare System Analytical Report <button onclick="MyPrintFunction()" class="buttonprint">PRINT REPORT</button></div>
      
      <!--Total New Request-->
      <div class="NewRequest" style="width: 182px; height: 202px; left: 40px; top: 148px; position: absolute; background: white; border-radius: 30px; overflow: hidden">
          <div class="Bg" style="width: 182px; height: 202px; left: 0px; top: 0px; position: absolute; background: linear-gradient(4deg, #F1F4F9 0%, #D4DDEE 70%, #D2E1FF 100%); box-shadow: 19px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 4px"></div>
          <div class="NewRequest" style="left: 40px; top: 10px; position: absolute; text-align: center; color: #171F46; font-size: 18px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word">New Request</div>
          <div class="PersonXl" style="width: 80px; height: 80px; left: 51px; top: 45px; position: absolute">
              <div class="Mask" style="width: 80px; height: 80px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 100px; border: 1px #D7DFE9 solid"></div>
              <img class="Image" style="width: 50px; height:50px; top: 15px; left: 20px; position: absolute" src="https://cdn-icons-png.flaticon.com/512/5825/5825337.png" />
          </div>
          <div class="SecondaryWide" style="width: 108.82px; height: 40px; left: 37px; top: 140px; position: absolute; border-radius: 30px; overflow: hidden">
            <div class="Bg" style="width: 109px; height: 40px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 4px"></div>
            <div class="Text" style="width: 77px; height: 24px; left: 16px; top: 8px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word">
                <?php
                $statusCounts = array();

                $sql = "SELECT Status, COUNT(*) AS status_count FROM request_donation_form WHERE Status IN ('New Request') GROUP BY Status";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $statusCounts[$row["Status"]] = $row["status_count"];
                    }

                    echo '<div class="status-count">' . (isset($statusCounts['New Request']) ? $statusCounts['New Request'] : 0) . '</div>';
                    echo '</div>';
                    echo '<div class="status-text">New Request</div>';
                    } else {
                    echo "No records found";
                }
                ?>
            </div>
          </div>
      </div>


      <!--Total Pending-->
      <div class="Pending" style="width: 182px; height: 202px; left: 256px; top: 158px; position: absolute; background: white; border-radius: 30px; overflow: hidden">
          <div class="Bg" style="width: 182px; height: 202px; left: 0px; top: 0px; position: absolute; background: linear-gradient(4deg, #FFFEFA 0%, #F3F1DF 70%, #FEFFD2 100%); box-shadow: 19px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 4px"></div>
          <div class="Pending" style="left: 60px; top: 10px; position: absolute;text-align: center; color: #171F46; font-size: 18px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word">Pending</div>
          <div class="PersonXl" style="width: 80px; height: 80px; left: 51px; top: 45px; position: absolute">
              <div class="Mask" style="width: 80px; height: 80px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 100px; border: 1px #D7DFE9 solid"></div>
              <img class="Image" style="width: 50px; height: 50px; top: 15px; left: 15px; position: absolute" src="https://cdn.iconscout.com/icon/free/png-256/free-pending-5-861794.png?f=webp" />
          </div> 
          <div class="SecondaryWide" style="width: 108.82px; height: 40px; left: 37px; top: 140px; position: absolute; border-radius: 30px; overflow: hidden">
              <div class="Bg" style="width: 109px; height: 40px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 4px"></div>
              <div class="Text" style="width: 77px; height: 24px; left: 16px; top: 8px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word">

                <?php
                $statusCounts = array();

                $sql = "SELECT Status, COUNT(*) AS status_count FROM request_donation_form WHERE Status IN ('Edited', 'Pending', 'Returned') GROUP BY Status";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $statusCounts[$row["Status"]] = $row["status_count"];
                    }

                    echo '<div class="status-count">' . (
                    (isset($statusCounts['Edited']) ? $statusCounts['Edited'] : 0) +
                    (isset($statusCounts['Pending']) ? $statusCounts['Pending'] : 0) +
                    (isset($statusCounts['Returned']) ? $statusCounts['Returned'] : 0)
                ) . '</div>';
                echo '</div>';
                echo '<div class="status-text">Pending</div>';
                
                    } else {
                    echo "No records found";
                }
                ?>

              </div>
        </div>
      </div>


      <!--Total Approved-->
      <div class="Approved" style="width: 182px; height: 202px; left: 461px; top: 158px; position: absolute; background: white; border-radius: 30px; overflow: hidden">
        <div class="Bg" style="width: 182px; height: 202px; left: 0px; top: 0px; position: absolute; background: linear-gradient(4deg, #F4F9F1 0%, #D6EED4 70%, #D3FFD2 100%); box-shadow: 19px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 4px"></div>
        <div class="Approved" style="left: 50px; top: 10px; position: absolute; text-align: center; color: #171F46; font-size: 18px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word">Approved</div>
        <div class="PersonXl" style="width: 80px; height: 80px; left: 51px; top: 45px; position: absolute">
          <div class="Mask" style="width: 80px; height: 80px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 100px; border: 1px #D7DFE9 solid"></div>
          <img class="Image" style="width: 50px; height: 50px; left: 15px; top: 15px; position: absolute" src="https://cdn-icons-png.flaticon.com/512/575/575832.png" />
        </div>
        <div class="SecondaryWide" style="width: 108.82px; height: 40px; left: 37px; top: 140px; position: absolute; border-radius: 30px; overflow: hidden">
          <div class="Bg" style="width: 109px; height: 40px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 4px"></div>
          <div class="Text" style="width: 77px; height: 24px; left: 16px; top: 10px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word">

            <?php
            $statusCounts = array();

            $sql = "SELECT Status, COUNT(*) AS status_count FROM request_donation_form WHERE Status IN ('New Request', 'Approved', 'Edited', 'Pending', 'Returned', 'Rejected') GROUP BY Status";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $statusCounts[$row["Status"]] = $row["status_count"];
                }
                echo '<div class="status-count">' . (isset($statusCounts['Approved']) ? $statusCounts['Approved'] : 0) . '</div>';
                echo '</div>';
                echo '<div class="status-text">Approved</div>';
                } else {
                echo "No records found";
            }
            ?>
          </div>
        </div>
        
      </div>


      <!--Total Rejected-->
      <div class="Rejected" style="width: 182px; height: 202px; left: 666px; top: 158px; position: absolute; background: white; border-radius: 30px; overflow: hidden">
          <div class="Bg" style="width: 182px; height: 202px; left: 0px; top: 0px; position: absolute; background: linear-gradient(4deg, #F9F2F1 0%, #EED6D4 70%, #FFD5D2 100%); box-shadow: 19px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 4px"></div>
          <div class="Rejected" style="left: 55px; top: 10px; position: absolute; text-align: center; color: #171F46; font-size: 18px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word">Rejected</div>
          <div class="PersonXl" style="width: 80px; height: 80px; left: 51px; top: 45px; position: absolute">
              <div class="Mask" style="width: 80px; height: 80px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 100px; border: 1px #D7DFE9 solid"></div>
              <img class="Image21" style="width: 50px; height: 50px; left: 20px; top: 15px; position: absolute" src="https://cdn-icons-png.flaticon.com/512/5266/5266684.png" />
          </div>
          <div class="SecondaryWide" style="width: 108.82px; height: 40px; left: 37px; top: 140px; position: absolute; border-radius: 30px; overflow: hidden">
            <div class="Bg" style="width: 109px; height: 40px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 4px"></div>
            <div class="Text" style="width: 77px; height: 24px; left: 16px; top: 10px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word">

                  <?php
                    $statusCounts = array();

                    $sql = "SELECT Status, COUNT(*) AS status_count FROM request_donation_form WHERE Status IN ('New Request', 'Approved', 'Edited', 'Pending', 'Returned', 'Rejected') GROUP BY Status";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $statusCounts[$row["Status"]] = $row["status_count"];
                        }

                        echo '<div class="status-count">' . (isset($statusCounts['Rejected']) ? $statusCounts['Rejected'] : 0) . '</div>';
                        echo '</div>';
                        echo '<div class="status-text">Rejected</div>';
                        } else {
                        echo "No records found";
                    }
                    ?>
            </div>
          </div>
        </div>


  <!-- Total Donation Request -->
<div class="Today" style="left: 980px; top: 102px; position: absolute; text-align: center; color: #171F46; font-size: 24px; font-family: Rubik; font-weight: 700; line-height: 24px; word-wrap: break-word">Today</div>

<div class="TodayCards1" style="width: 469px; height: 143px; left: 980px; top: 144px; position: absolute">
    <div class="Rectangle3" style="width: 469px; height: 143px; left: 0px; top: 0px; position: absolute; background: #E2DCEE; border-radius: 15px; border: 1px #E1E7FC solid"></div>
    <div class="TotalDonationRequest" style="width: 248px; height: 33px; left: 115px; top: 60px; position: absolute; text-align: center; color: #171F46; font-size: 20px; font-family: Rubik; font-weight: 700; line-height: 24px; word-wrap: break-word">Total Donation Request:</div>
  <div style="width: 32px; height: 33px; left: 360px; top: 30px; position: absolute; text-align: center; color: #171F46; font-size: 32px; font-family: Rubik; font-weight: 900; line-height: 24px; word-wrap: break-word">

    <?php
          
            $sql = "SELECT COUNT(*) AS total_requests FROM request_donation_form";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalRequests = $row["total_requests"];
                echo "<p class='total-requests'><strong>$totalRequests</strong></p>";
            } else {
                echo "No records found";
            }

            ?>
    </div>
    <div class="Rectangle2" style="width: 81px; height: 88px; left: 19px; top: 28px; position: absolute; background: white; box-shadow: 3px 1px 50px rgba(0, 0, 0, 0.15); border-radius: 20px"></div>
    <div class="day" id="dayOfWeek" style="width: 29.81px; height: 33.41px; left: 45px; top: 71.84px; position: absolute; text-align: center; color: #171F46; font-size: 16px; font-family: Rubik; font-weight: 500; line-height: 24px; word-wrap: break-word"></div>
    <div id="currentDate" style="width: 25.70px; height: 33.41px; left: 46.03px; top: 44px; position: absolute; text-align: center; color: #171F46; font-size: 24px; font-family: Rubik; font-weight: 500; line-height: 24px; word-wrap: break-word">
    </div>
  </div>
    

<script>
    // Get the current date
    var currentDate = new Date();

    // Array of weekdays
    var weekdays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    // Update the day of the week and date in your HTML
    document.getElementById("dayOfWeek").innerHTML = weekdays[currentDate.getDay()];
    document.getElementById("currentDate").innerHTML = currentDate.getDate();
</script>


  <!-- Line Chart -->
  <div class="ChartTitle" style="left: 60px; top: 390px; position: absolute; text-align: center; color: #171F46; font-size: 28px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word">Monthly Request Trend 2023</div>
  <div id="line-chart" style="width: 1060px; height: 400px; position: absolute; left: 0px; top: 450px;"></div>

  <!-- Load Google Charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var data = google.visualization.arrayToDataTable(<?php echo json_encode($formattedData); ?>);

          var options = {
              curveType: 'function',
              legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('line-chart'));

          chart.draw(data, options);
      }
  </script>


  <!--Bar Graph-->
  <div class="GraphTitle" style="left: 60px; top: 890px; position: absolute; text-align: center; color: #171F46; font-size: 28px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word">Monthly Donation Trend 2023</div>
    <div id="donationChart" style="width: 960px; height: 350px; position: absolute; top: 950px;"></div>
        <?php
       
        $monthlyCounts = array();

        $sqlMonthly = "SELECT MONTH(Donate_Time) AS month, COUNT(*) AS month_count FROM give_donation GROUP BY MONTH(Donate_Time)";
        $resultMonthly = $conn->query($sqlMonthly);

        if ($resultMonthly->num_rows > 0) {
            while ($row = $resultMonthly->fetch_assoc()) {
                $monthlyCounts[$row["month"]] = $row["month_count"];
            }
        } else {
            echo "No records found";
        }
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.10.2/Chart.min.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Month');
                data.addColumn('number', 'Number of Donation');

                <?php
                if ($resultMonthly->num_rows > 0) {
                    foreach ($monthlyCounts as $month => $count) {
                        $monthName = date('F', mktime(0, 0, 0, $month, 1)); // Convert month number to name
                        echo "data.addRow(['$monthName', $count]);";
                    }
                } else {
                    echo "data.addRow(['No records found', 0]);";
                }
                ?>

                var options = {
                    chart: {
                        title: 'Donation',
                        subtitle: 'Donation per month',
                    },
                    hAxis: {
                        title: 'Month',
                    },
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('donationChart'));

                chart.draw(data, options);
            }
        </script>

  <!--Request Donation Ranking-->
    <div class="TopRMonth" style="width: 161px; height: 35px; left: 980px; top: 379px; position: absolute; color: #171F46; font-size: 24px; font-family: Rubik; font-weight: 700; line-height: 40px; word-wrap: break-word">Top Month</div>
    <div class="CardsUserMiniProfile" style="width: 464px; height: 414px; left: 980px; top: 432px; position: absolute; box-shadow: 1px 10px 30px rgba(42.55, 67.10, 114.75, 0.10); border-radius: 30px; overflow: hidden">
          <div class="Bg" style="width: 505px; height: 414px; background: linear-gradient(180deg, #FFE3B9 75%, #FFFAF4 75%); box-shadow: 0px 30px 50px #0057FF; border-radius: 30px"></div>
          <div class="Desc" style="left: 75px; top: 30px; position: absolute; text-align: center; color: #51565B; font-size: 20px; font-family: Rubik; font-weight: 400; line-height: 24px; word-wrap: break-word">Highest number of request for donation.</div>
          <div class="Month" style="left: 172px; top: 240px; position: absolute; text-align: center; color: #51565B; font-size: 18px; font-family: Rubik; font-weight: 500; line-height: 24px; word-wrap: break-word">
          <!-- display top month with highest amount of donation request -->

              <?php
                
                $sqlTopMonth = "SELECT DATE_FORMAT(Date_Time, '%M') AS TopMonth, COUNT(*) AS RequestCount
                     FROM request_donation_form
                     GROUP BY TopMonth
                     ORDER BY RequestCount DESC
                     LIMIT 1";

                $resultTopMonth = $conn->query($sqlTopMonth);

                if ($resultTopMonth->num_rows > 0) {
                    $rowTopMonth = $resultTopMonth->fetch_assoc();
                    $topMonth = $rowTopMonth["TopMonth"];
                    $requestCount = $rowTopMonth["RequestCount"];

                    echo "<span style='color: #171F46; font-size: 28px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word'>$topMonth<br/></span>";
                    echo "<span style='color: #51565B; font-size: 16px; font-family: Rubik; font-weight: 500; line-height: 24px; word-wrap: break-word'>$requestCount Requests</span>";
                } else {
                    echo "No records found";
                }
                ?>
            </div>
            <div class="NoFD" style="left: 120px; top: 330px; position: absolute; text-align: center">

              <?php
                
                $sqlTopMonth = "SELECT DATE_FORMAT(Date_Time, '%M %Y') AS TopMonth, COUNT(*) AS RequestCount
                       FROM request_donation_form
                       GROUP BY TopMonth
                       ORDER BY RequestCount DESC
                       LIMIT 1";

                $resultTopMonth = $conn->query($sqlTopMonth);

                if ($resultTopMonth->num_rows > 0) {
                    $rowTopMonth = $resultTopMonth->fetch_assoc();
                    $topMonth = $rowTopMonth["TopMonth"];

                    $sqlFamilyDeath = "SELECT COUNT(*) AS FamilyDeathCount
                                       FROM request_donation_form
                                       WHERE DATE_FORMAT(Date_Time, '%M %Y') = '$topMonth' AND Donation_Type = 'Family Death'";

                    $resultFamilyDeath = $conn->query($sqlFamilyDeath);

                    if ($resultFamilyDeath->num_rows > 0) {
                        $rowFamilyDeath = $resultFamilyDeath->fetch_assoc();
                        $familyDeathCount = $rowFamilyDeath["FamilyDeathCount"];

                        echo "<span style='color: #171F46; font-size: 18px; font-family: Rubik; font-weight: 500; line-height: 24px; word-wrap: break-word'>$familyDeathCount<br/></span>";
                        echo "<span style='color: #51565B; font-size: 16px; font-family: Rubik; font-weight: 500; line-height: 24px; word-wrap: break-word'>Family Death</span>";
                    } else {
                        echo "No records found for Family Death";
                    }
                } else {
                    echo "No records found for the top month";
                }
                ?>
          
            </div>

            <div class="NoND" style="left: 250px; top: 330px; position: absolute; text-align: center">

                <?php
                $sqlNaturalDisaster = "SELECT COUNT(*) AS NaturalDisasterCount
                                       FROM request_donation_form
                                       WHERE DATE_FORMAT(Date_Time, '%M %Y') = '$topMonth' AND Donation_Type = 'Natural Disaster'";

                $resultNaturalDisaster = $conn->query($sqlNaturalDisaster);

                if ($resultNaturalDisaster->num_rows > 0) {
                    $rowNaturalDisaster = $resultNaturalDisaster->fetch_assoc();
                    $naturalDisasterCount = $rowNaturalDisaster["NaturalDisasterCount"];

                    echo "<span style='color: #171F46; font-size: 18px; font-family: Rubik; font-weight: 500; line-height: 24px; word-wrap: break-word'>$naturalDisasterCount<br/></span>";
                    echo "<span style='color: #51565B; font-size: 16px; font-family: Rubik; font-weight: 500; line-height: 24px; word-wrap: break-word'>Natural Disaster</span>";
                } else {
                    echo "No records found for Natural Disaster";
                }

                ?>
            </div>
            <div class="PersonXl" style="width: 124px; height: 124px; left: 187px; top: 66px; position: absolute">
              <div class="Mask" style="width: 124px; height: 124px; left: -15px; top: 10px; position: absolute; background: white; border-radius: 100px; border: 1px #D7DFE9 solid"></div>
              <img class="Image" style="width: 90px; height: 90px; top: 25px; position: absolute" src="https://www.iconpacks.net/icons/1/free-chart-icon-646-thumb.png" />
            </div>
          </div>

    
    <!--Give Donation Ranking-->
    <div class="TopDMonth" style="width: 161px; height: 35px; left: 980px; top: 920px; position: absolute; color: #171F46; font-size: 24px; font-family: Rubik; font-weight: 700; line-height: 40px; word-wrap: break-word">Top Month</div>

    <div class="CardsUserMiniProfile" style="width: 464px; height: 300px; left: 980px; top: 980px; position: absolute; box-shadow: 1px 10px 30px rgba(42.55, 67.10, 114.75, 0.10); border-radius: 30px; overflow: hidden">
    <div class="Bg" style="width: 505px; height: 414px; background: linear-gradient(180deg, #FFD5D2 14%, #FFFAF4 95%); box-shadow: 0px 30px 50px #0057FF; border-radius: 30px"></div>        
    <div class="Desc" style="left: 100px; top: 30px; position: absolute; text-align: center; color: #51565B; font-size: 20px; font-family: Rubik; font-weight: 400; line-height: 24px; word-wrap: break-word">Highest number of donation made.</div>
        <div class="Month" style="left: 190px; top: 230px; position: absolute; text-align: center; color: #51565B; font-size: 18px; font-family: Rubik; font-weight: 500; line-height: 24px; word-wrap: break-word">

            <?php
            $sqlTopMonth = "SELECT DATE_FORMAT(Donate_Time, '%M') AS TopMonth, COUNT(*) AS DonationCount
                            FROM give_donation
                            GROUP BY TopMonth
                            ORDER BY DonationCount DESC
                            LIMIT 1";

            $resultTopMonth = $conn->query($sqlTopMonth);

            if ($resultTopMonth->num_rows > 0) {
                $rowTopMonth = $resultTopMonth->fetch_assoc();
                $topMonth = $rowTopMonth["TopMonth"];
                $donationCount = $rowTopMonth["DonationCount"];

                echo "<span style='color: #171F46; font-size: 28px; font-family: Rubik; font-weight: 800; line-height: 24px; word-wrap: break-word'>$topMonth<br/></span>";
                echo "<span style='color: #51565B; font-size: 16px; font-family: Rubik; font-weight: 500; line-height: 24px; word-wrap: break-word'>$donationCount Donations</span>";
            } else {
                echo "No records found";
            }
            ?>

        </div>
        <div class="PersonXl" style="width: 124px; height: 124px; left: 187px; top: 66px; position: absolute">
            <div class="Mask" style="width: 124px; height: 124px; left: -15px; top: 10px; position: absolute; background: white; border-radius: 100px; border: 1px #D7DFE9 solid"></div>
            <img class="Image" style="width: 90px; height: 90px; top: 25px; position: absolute" src="https://static.thenounproject.com/png/4909976-200.png" />
        </div>
    </div>
    <div>
        <br><br>
    </div>

    <script>
    function MyPrintFunction() {
        var elementsToHide = document.querySelectorAll('.no-print, #print');
        for (var i = 0; i < elementsToHide.length; i++) {
            elementsToHide[i].style.display = 'none';
        }
        var windowContent = '<!DOCTYPE html>';
        windowContent += '<html>'

        windowContent += '<title>WECARE SYSTEM ANALYTICAL REPORT</title>';

        windowContent += '<style>p { font-size: 14px; text-align: center; position: absolute; bottom: 0; width: 100%; }</style>';
        windowContent += '<style>table, td , th {border: 1px solid black; font-size:14px;}table {width: 100%;border-collapse: collapse;} table{tr:nth-child(even)}; </style> ';
        windowContent += '<style>th{ padding : 5px 0 5px 0;margin-bottom:10px;overflow :auto;border-bottom : 2px }</style>';

        windowContent += '</head>';
        windowContent += '<body>'

        window.print()

        // Add a space or any content to create a gap
        windowContent += '<div style="margin-top: 20px;"></div>';

        windowContent += document.getElementById("line-chart").innerHTML;

        // Add a space or any content to create a gap
        windowContent += '<div style="margin-top: 20px;"></div>';

        windowContent += document.getElementById("print3").innerHTML;

        windowContent += '</body>';
        windowContent += '</body>';
        windowContent += '</html>';



        // Show elements with class "no-print" after printing
        for (var i = 0; i < elementsToHide.length; i++) {
            elementsToHide[i].style.display = ''; // Revert to original display setting
        }
    }
</script>

    </body>
</html>