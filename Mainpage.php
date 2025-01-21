<?php

include_once 'db.php';
session_start();

 try  
 {  

      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["matric"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required to be filled</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM login_info WHERE Matric_No = :matric AND password = :password";  
                $stmt = $conn->prepare($query);  
                $stmt->execute(  
                     array(  
                          'matric'     =>     $_POST["matric"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $stmt->rowCount();  
                if($count > 0)  
                {  
                  
                    $_SESSION["matric"] = $_POST["matric"];  
                     
                }  
                else  
                {  
                     $message = '<label>Password or ID is invalid</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style type="text/css">
        /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin-right: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        body {
            width: 100%;
            min-height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(Background1.jpg);
            background-position: center;
            background-size: cover;
            padding-left: 8%;
            padding-right: 8%;
            box-sizing: border-box;
        }

        .navbar {
            height: 12%;
            display: flex;
            align-items: center;
        }

        .logo {
            width: 80px;
            cursor: pointer;
        }

        .menu-icon {
            width: 30px;
            cursor: pointer;
            margin-left: 40px;
        }

        nav {
            flex: 1;
            text-align: right;
        }

        nav ul li {
            list-style: none;
            display: inline-block;
            margin-left: 60px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 13px;
        }

        .row {
            display: flex;
            height: 50%;
            align-items: center;
            margin-top: 60px; /* Add a margin-top value as needed */
        }

        .col {
            flex-basis: 50%;
        }

        .col h1 {
            color: #fff;
            font-size: 70px;
        }

        .col p {
            color: #fff;
            font-size: 25px;
            line-height: 10px;
        }

        .custom-button {
            background: #fff;
            color: #000;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-family: 'Sofia Sans', sans-serif;
        }

        .custom-button:hover {
            background-color: #e09079;
            transition: 0.5s;
        }

 .wrapper {
    width: 420px;
    background: rgba(255, 255, 255, 0.3);
    border: 2px solid rgba(255, 255, 255, .2);
    backdrop-filter: blur(35px);
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
    color: #fff;
    border-radius: 10px;
    padding: 30px 40px;
    position: fixed;
    top: 57%;
    right: 12%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 500px; /* Set the desired height */
}

        .wrapper .input-box{
            position: relative;
            width: 100%;
            height: auto;
            margin: 10px 0;
        }

        .input-box input{
            width: 100%;
            height: 15px;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder{
            color: #fff;
        }

        .input-box .btn-outline-secondary{
            position: absolute;
            right: 17px;
            top: 50%;
            transform: translateY(-60%);
            font-size: 20px;
            border: transparent;
        }

        .wrapper .forgot-password{
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }

        .forgot-password a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
        .wrapper .login{
            width: 100%;
            height: 45px;
            background: linear-gradient(45deg, #FF3131, #FF914D);
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow:  0 0 10px rgba(0,0,0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
            margin-top: 20px; /* Adjust the margin as needed */
        }

        .logo-container {
    text-align: center;
    margin-bottom: 20px; /* Adjust the margin as needed */
}

.logo {
    width: 100px; /* Adjust the width as needed */
    height: auto;
}

.card{
        transition: transform 0.5s;
        width: 200px;
        height: 230px;
        display: inline-block;
        border-radius: 10px;
        padding: 15px 25px;
        box-sizing: border-box;
        cursor: pointer;
        margin: 10px 15px;
        background-position: center;
        background-size: cover;
        transition: transform 0.5s;
      }

      .card1{
         background-image: url(1.jpg);
      }

      .card2{
         background-image: url(2.jpg);
       }

       .card3{
         background-image: url(3.jpg);
      }

      .card4{
         background-image: url(4.jpg);
      }

      .card:hover{
        transform: translateY(-10px);
      }

      #password-icon {
    color: #DCDCDC; /* Set the color to white */
}


    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <img src="Logo2.png" class="logo">
            <nav>
                <ul>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h1>WeCare</h1>
            <p>WeCare is a platform where students can seek financial and</p>
            <p>emotional assistance, supported by FTSM and the </p>
            <p>Student Representatives Council (PERTAMA).</p>
            <div class="card card1"></div>
            <div class="card card2"></div>
            <div class="card card4"></div>


        <div class="col">
            <!-- Login Form -->
                <div class="wrapper">
    <div class="logo-container">
        <img src="logo2.png" alt="Logo" class="logo">
    </div>

         <form action="validate.php" method="post" class="login_form">

        <div class="input-box">
                    <input type="text" name="id" id="id" placeholder="Matric No/UKMper" required>
                    
        </div>
                    <div class="input-box">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    
                            <button class="btn btn-outline-secondary" type="button" id="password-toggle">
                                <span id="password-icon" class="fa fa-eye"></span>
                            </button>
                        </div>
                 

                 <br>

                        <button type="submit" name="login" class="login" style="font-weight: bold;">Login</button>
                   
                    <div class="forgot-password">
      <a href="reset.php">Forget Password?</a>
    </div>

    <div class="text-center fs-6">
      <?php  if(isset($message)) {  
          echo '<label class="text-danger">'.$message.'</label>';  
        }  
      ?> 
    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // ... existing script for password toggle ...
         const passwordInput = document.getElementById("password");
        const passwordToggle = document.getElementById("password-toggle");
        const passwordIcon = document.getElementById("password-icon");
        let isPasswordVisible = false;

        passwordToggle.addEventListener("click", function() {
            if (isPasswordVisible) {
                passwordInput.type = "password";
                passwordIcon.className = "fa fa-eye";
                isPasswordVisible = false;
            } else {
                passwordInput.type = "text";
                passwordIcon.className = "fa fa-eye-slash";
                isPasswordVisible = true;
            }
        });

        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();

            // Submit the form via AJAX for asynchronous handling
            $.ajax({
            type: "POST",
            url: "validate.php",
            data: $(this).serialize(),
            success: function(response) {
                // Check the response from validate.php
                if (response.includes("Invalid")) {
                    // Show a Bootstrap modal with the error message
                    $("#errorModal .modal-body").text(response);
                    $("#errorModal").modal("show");
                } else {
                    // Redirect based on the fetched position
                    window.location.replace(response);
                }
            }
        });
    });
</script>

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Error message will be displayed here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <!-- ... rest of the existing code ... -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
