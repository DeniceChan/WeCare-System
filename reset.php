<?php
  include_once 'db.php';
  include_once 'session.php';

  $id = '';

  // Check if the form is submitted
  if (isset($_POST["check_id"])) {
    // Retrieve the ID submitted by the user
    $id = $_POST["id"];

    // Query your database to check if the ID exists
    $query = "SELECT * FROM login_info WHERE Matric_No = :id";
    $stmt = $conn->prepare($query);
    $stmt->execute(array('id' => $id));
    $count = $stmt->rowCount();

    if ($count > 0) {
      // The ID exists in the database, display the password-related fields
      $showPasswordFields = true;
      // Store the ID in a session variable for use in reset.php
      $_SESSION['id'] = $id;
    } else {
      $message = "ID not found. Please enter a valid ID.";
    }
  }

  // Password reset logic
  try {
  if (isset($_POST["reset"])) {
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Check if the passwords match
    if ($newPassword === $confirmPassword) {
        if (!preg_match('/[A-Z]/', $newPassword) || strlen($newPassword) < 8 || !preg_match('/\d/', $newPassword)) {
            $message = "Password must contain at least one capital letter, be at least 8 characters long, and contain at least one number.";
        } else{
            // Password is valid, proceed with the password reset
            $updateQuery = "UPDATE login_info SET password = :password WHERE Matric_No = :id";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->execute(array('password' => $newPassword, 'id' => $_SESSION['id']));
            $message = "Password reset successful.";
            // Redirect to the login page
        
    } 
  }

    else {
        $message = "Passwords do not match.";
    }

  
}
}
catch(PDOException $error) {  
  $message = $error->getMessage();  
}  

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WeCare: Forgot Password</title>
  <!-- Latest compiled and minified CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled and minified CSS -->
<style type="text/css">

  /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

  .left-nav{
    margin-top: -21px;
    height: 950px;
    border-bottom: 1px solid;
    display:none;
}

</style>
  
 <style type="text/css">
        body {
            background-color: #FFDE59; /* Change to yellow or any other color you prefer */
            
        }

        .navbar-default .navbar-nav>li>a {
            color: #000 !important; /* Set the color to black for all navbar text */
        }

        .navbar-default .navbar-brand {
            color: #000 !important; /* Set the color to black for the navbar brand (WeCare) */
        }

        .form-control{
          border: none; /* Remove the default button border */
            border-radius: 10px; /* Apply rounded corners */
            padding: 10px 20px;
        }
        .custom-button{
          background: #000000;
          color: #fff; /* Text color is white */
            border: none; /* Remove the default button border */
            border-radius: 20px; /* Apply rounded corners */
            padding: 10px 20px; /* Add some padding for a rectangular shape */
        }

        .service-icon{
    color: #0a0a0a;
    font-size: 20px;
    padding: 10px;
}

.service-icon:hover{
    color: #0a0a0a;
}
        
        
    </style>
</head>
<body>

</head>

<body>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    
<nav class="navbar navbar-light bg-light" >
  <div class="container-fluid" style="font-family: Times New Roman, Times, serif;">
    <a class="navbar-brand" href="#">WeCare</a>

    <div class="container-fluid-right">
        <a class="service-icon" href="MainPage.php">
                    <span><i class="fa fa-home"></i></span></a>
        <a class="navbar-brand" href="">Contact Us</a>
        <a class="navbar-brand" href="login.php">Login</a>
        
    </div>
  </div>
</nav>

    <br> </br>
    <br> </br>
    <br> </br>

  <div class="container" style="width:500px;"> 

    <h3 align="">Reset your password</h3>
    <br />  

<form action="reset.php" method="post" class="form-horizontal">

        
          <label>ID</label>
            <input name="id" type="text" class="form-control" id="id" placeholder="Enter ID" value="<?php echo $id; ?>" required style="width: 500px;">
         
<br />
 <div class="form-group">
        <div class="text-center">
    <input type="submit" name="check_id" class="custom-button" value="Check ID">
  </div>
</div>

<br />

    <?php if (isset($showPasswordFields) && $showPasswordFields) { ?>

<form name="resetPass" method="post" action="reset.php" onSubmit="return validatePassword();">

            <label>New Password</label>
            
              <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Enter New Password" style="width: 500px;" ><span id="newPassword" class="required"></span> <!-- Add this line -->
            
              <br />
            <label>Retype Password</label>
              <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Retype Password" style="width: 500px;" ><span id="confirmPassword" class="required"></span><!-- Add this line -->
              <br />

<div class="form-group">
      <div class="text-center">
                    <input type="hidden" name="oldid" value="<?php echo $editrow['id']; ?>">
                    <button class="custom-button" type="submit" name="reset"><span aria-hidden="true"></span> Reset</button>
                    
  </div>
</div>


              <?php } ?>

              


   <div class="form-group">
      <div class="col-sm-12 text-center">
        <?php if (isset($message)) { echo '<label class="text-danger">' . $message . '</label>'; } ?>
      </div>
    </div>
  </form>

</div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</body>

</html>

<script>
function validatePassword() {
  var newPassword, confirmPassword, output = true;

  newPassword = document.resetPass.newPassword;
  confirmPassword = document.resetPass.confirmPassword;

  if (!newPassword.value) {
    newPassword.focus();
    document.getElementById("newPassword").innerText = "Password is required";
    output = false;
  } else if (!confirmPassword.value) {
    confirmPassword.focus();
    document.getElementById("confirmPassword").innerText = "Confirm password is required";
    output = false;
  } else if (newPassword.value !== confirmPassword.value) {
    newPassword.value = ""; // Clear the incorrect password
    confirmPassword.value = ""; // Clear the incorrect password
    newPassword.focus();
    document.getElementById("confirmPasswordError").innerText = "Passwords do not match";
    output = false;
  }

  return output;
}

</script>