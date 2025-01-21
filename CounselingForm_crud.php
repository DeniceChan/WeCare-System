<?php
$servername = "lrgs.ftsm.ukm.my";
$username = "a186635";
$password = "cuteblacktiger";
$dbname = "a186635";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO book_counseling(Booking_ID, Full_Name, Matric_No, Phone_No, Description, Counsel_Status)
          VALUES (:ID,:name,:matric_no,:phone,:description, 'New')");


    $stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':matric_no', $matric_no, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);



    $getid = uniqid("BK", true);
    $getid1 = substr($getid,0,2);
    $getid2 = substr($getid,21);
    $ID = $getid1.$getid2;
    $matric_no = $_POST['matric_no'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $stmt->execute();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
   
}

$conn = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Successful</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .formtable {
            width: 50%;
            margin: 50px auto;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            width: 900px;
        }

        h1 {
            color: #4dae3c;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ced4da;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
        }
        .successimage{
            display: flex;
            justify-content: center; /* Center the icons horizontally */
            align-items: center; 
        }

        .successimage img{
            width: 300px;
            height: 300px;
        }



        /*.back-button {
            background: url('https://www.shareicon.net/data/512x512/2015/12/10/685271_arrows_512x512.png') no-repeat;
            background-size: contain;
            width: 30px;
            height: 30px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }*/
    </style>
    <link href="//unpkg.com/layui@2.8.18/dist/css/layui.css" rel="stylesheet">
</head>

<body>
    <header>
        <?php 
        include_once 'header3.php';
        ?>
    </header>

    <div class="formtable">
        <h1>Booking Successful!</h1>
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="150">
                <col>
            </colgroup>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Name</th>
                    <th>Matric no</th>
                    <th>Phone_no</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $ID; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $matric_no; ?></td>
                    <td><?php echo $phone;?></td>
                    <td><?php echo $description; ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Add a back button with a link to mainpage.php -->

        
         
    </div>
    <div class="successimage">
       <img src="successful.gif"> 
    </div>
    

    <script src="//unpkg.com/layui@2.8.18/dist/layui.js"></script>
</body>

</html>
