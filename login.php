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
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare: Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style type="text/css">
        /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        .bold-text {
            font-weight: bold;
        }

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;

        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('background.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        }

        .wrapper{
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(35px);
            box-shadow: 0 0 10px rgba(0,0,0,.2);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
            position: fixed;
            top: 117px; /* Adjust this value to move the box down */
        }

        .wrapper .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin: 10px 0;
        }

        .input-box input{
            width: 100%;
            height: 100%;
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
        }

 header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 10px 100px;
    background: #f2f2f2;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;

  }

  .WeCare{
    font-size: 1.4em;
    color: black;
    user-select: none;
  }

  .navigation a{
    position: relative;
    font-size: 1.1em;
    color: black;
    text-decoration: none;
    font-weight: 500;
    margin-left: 40px;
  }



       
    </style>
</head>

<body>

    <header>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <h2 class ="WeCare">WeCare</h2>
  <nav class="navigation">
        <a href="MainPage.php">Home</a>
</nav>

</header>


    <?php
    //include_once 'header_mainPage.php'
    ?>

    <br> </br>
    <br> </br>
    <br> </br>

    <div class="wrapper">
        <div class="row justify-content-center">
            <div class="col-6">
                <img src="Logo2.png" alt="WeCare Logo" class="text-center" style="display: block; margin: 0 auto; width: 150px; height: 180px; position: center;">
                <br>
            </div>
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

<!-- Bootstrap Modal for Error Messages -->
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
    
    <!-- Include Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>