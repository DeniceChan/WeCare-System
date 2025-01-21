<?php

include_once 'db.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Handle supporting document upload
        $file = $_FILES['file'];
        $matric_no = $_POST['matric_no']; // Retrieve matric no from the form data
        $filename = $matric_no . '_doc.' . pathinfo($file['name'], PATHINFO_EXTENSION); // Concatenate matric no and add "_doc" suffix
        $upload_dir = 'uploads/docs/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir);
        }
        move_uploaded_file($file['tmp_name'], $upload_dir . $filename);

        // Handle picture upload
        $pictureFile = $_FILES['pictureFile'];
        $matric_no = $_POST['matric_no']; // Retrieve matric no from the form data
        $pictureFilename = $matric_no . '_qr.' . pathinfo( $pictureFile['name'], PATHINFO_EXTENSION); // Concatenate matric no and add "_qr" suffix 
        $pictureUploadDir = 'uploads/qr/';
        if (!file_exists($pictureUploadDir)) {
          mkdir($pictureUploadDir);
        }
        move_uploaded_file($pictureFile['tmp_name'], $pictureUploadDir . $pictureFilename);

        echo "Image uploaded";

        // Generate a unique Request_ID with a fixed prefix based on the type of donation
        $prefix = ($_POST['type_donation'] == "Family Death") ? 'FD' : 'ND';
        $randomNumber = rand(100000, 999999); // Range
        $Request_ID = $prefix . $randomNumber;

        $stmt = $conn->prepare("INSERT INTO request_donation_form(Request_ID, ID, Matric_No, Full_Name, Phone_No, Donation_Type, House_Address, Bank_Merchant, Account_Number,Document, QR, Status, Date_Time)
         VALUES (:Request_ID, :id,:matric_no,:name,:phone,:type_donation,:address,:bank,:account_number,:document, :qr,'New Request', NOW())");

        $stmt->bindParam(':Request_ID',$Request_ID,PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':matric_no', $matric_no, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':type_donation', $type_donation, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':bank', $bank, PDO::PARAM_STR);
        $stmt->bindParam(':account_number', $account_number, PDO::PARAM_STR);
        $stmt->bindParam(':document', $document, PDO::PARAM_STR);
        $stmt->bindParam(':qr', $pictureFilename, PDO::PARAM_STR);

        $id = $_POST['id'];
        $matric_no = $_POST['matric_no'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $type_donation = $_POST['type_donation'];
        $address = $_POST['address'];
        if ($_POST['bank'] == 0) {
            $bank = 'Maybank';
        } elseif ($_POST['bank'] == 1) {
            $bank = 'Bank Islam';
        } elseif ($_POST['bank'] == 2) {
            $bank = 'CIMB';
        } elseif ($_POST['bank'] == 3) {
            $bank = 'Bank Rakyat';
        } elseif ($_POST['bank'] == 4) {
            $bank = 'RHB';
        }
        $account_number = $_POST['account_number'];
        $document = $filename; // Use the filename for the document
        $qr = $pictureFilename; 

        $stmt->execute();

        echo '<script>
                function showPopupMessage(message) {
                    alert(message);
                }

                // Call the function to show the popup
                showPopupMessage("New record successfully added!");

                // Redirect to FTSMMember_Index.php after showing the popup
                setTimeout(function() {
                    window.location.href = "TimelineStatus.php";
                }, 1000); // Adjust the delay (in milliseconds) as needed
              </script>';
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>
