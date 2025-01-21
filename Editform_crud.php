<?php
include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Edit
if (isset($_GET['edit'])) {

    try {

        $stmt = $conn->prepare("SELECT * FROM request_donation_form WHERE Matric_No = :matricno");
        $stmt->bindParam(':matricno', $matricno, PDO::PARAM_STR);
        $matricno = $_GET['edit'];
        $stmt->execute();
        $editrow = $stmt->fetch(PDO::FETCH_ASSOC);

        // Populate variables with values for form fields
        $matricno = $editrow['Matric_No'];
        $id = $editrow['ID'];
        $name = $editrow['Full_Name'];
        $phone = $editrow['Phone_No'];
        $donation = $editrow['Donation_Type'];
        $address = $editrow['House_Address'];
        $bank = $editrow['Bank_Merchant'];
        $account = $editrow['Account_Number'];
        $doc = $editrow['Document'];
        $qr = $editrow['QR'];

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

//Update
if (isset($_POST['update'])) {
 
  try {
        // Check if the file fields are set and not empty
        if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
            $file = $_FILES['file'];
            $matric_no = $_POST['matric_no']; // Retrieve matric no from the form data
            $filename = $matric_no . '_doc.' . pathinfo($file['name'], PATHINFO_EXTENSION); // Concatenate matric no and add "_doc" suffix
            $filename = $matricno . '_doc.' . pathinfo($file['name'], PATHINFO_EXTENSION);
            $upload_dir = 'uploads/docs/';

            if (!file_exists($upload_dir)) {
                mkdir($upload_dir);
            }

            move_uploaded_file($file['tmp_name'], $upload_dir . $filename);
        } 

        if (isset($_FILES['pictureFile']) && $_FILES['pictureFile']['size'] > 0) {
            $pictureFile = $_FILES['pictureFile'];
            $matric_no = $_POST['matric_no']; // Retrieve matric no from the form data
            $pictureFilename = $matric_no . '_qr.' . pathinfo( $pictureFile['name'], PATHINFO_EXTENSION); // Concatenate matric no and add "_qr" suffix 
            $pictureFilename = $matricno . '_qr.' . pathinfo($pictureFile['name'], PATHINFO_EXTENSION);
            $pictureUploadDir = 'uploads/qr/';

            if (!file_exists($pictureUploadDir)) {
                mkdir($pictureUploadDir);
            }

            move_uploaded_file($pictureFile['tmp_name'], $pictureUploadDir . $pictureFilename);
        } 

        echo "Image uploaded";
 
      $stmt = $conn->prepare("UPDATE request_donation_form SET Matric_No = :matricno,
        ID = :id, Full_Name = :name, Phone_No = :phone,
        Donation_Type = :donation, House_Address = :address, Bank_Merchant = :bank, Account_Number = :account, Document = :document, QR = :qr,
            Status = 'Edited'
        WHERE Matric_No = :oldmatricno");
     
      $stmt->bindParam(':matricno', $matricno, PDO::PARAM_STR);
      $stmt->bindParam(':id', $id, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
      $stmt->bindParam(':donation', $donation, PDO::PARAM_STR);
      $stmt->bindParam(':address', $address, PDO::PARAM_STR);
      $stmt->bindParam(':bank', $bank, PDO::PARAM_STR);
      $stmt->bindParam(':account', $account, PDO::PARAM_STR);
      $stmt->bindParam(':document', $filename, PDO::PARAM_STR);
      $stmt->bindParam(':qr', $pictureFilename, PDO::PARAM_STR);
      $stmt->bindParam(':oldmatricno', $oldmatricno, PDO::PARAM_STR);
       
    $matricno = $_POST['matricno'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone =  $_POST['phone'];
    $donation = $_POST['donation'];
    $address = $_POST['address'];
    $bank = $_POST['bank'];
    $account = $_POST['account'];
    $oldmatricno = $_POST['oldmatricno'];
     
    $stmt->execute();

    echo "Records edited successfully";
 
    header("Location: RequestForm.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}

$conn = null;
?>