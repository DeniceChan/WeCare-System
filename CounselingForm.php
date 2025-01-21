<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare: Donation Request Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>

        body {
          background: rgb(229,207,255);
          background-image: url(donateepage.jpg);
          background-size: cover;
          font-family: "Times New Roman", Times, serif;
        }
       .form-container {
            font-family: "Times New Roman", Times, serif;
            font-size: 0;
            border-radius: 20px;
            overflow: hidden;
            display: flex; /* Add display flex to the form-container */
            margin-bottom: 20px;
        }

        .form-container .form-img {
           background-image: url(https://static.vecteezy.com/system/resources/previews/012/393/508/original/psychologist-appointment-in-cartoon-flat-style-concept-of-mental-health-illustration-of-doctor-counseling-patient-two-black-women-talking-psychology-consultation-vector.jpg);
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover; /* Add this line to resize the background image */
            width: 50%;
            height: 554px;
            vertical-align: top;
            display: inline-block;
            flex: 1;
        }

        .form-container .form-horizontal {
            background: #fff;
            width: 50%;
            padding: 33px 35px 32.5px;
            display: inline-block;
            
            vertical-align: top;
            flex: 1; /* Add flex: 1 to make it flexible */
        }

        .form-container .title {
            color: #000000; /* booking info colour */
            font-size: 25px;
            font-weight: 400;
            margin: 0 0 35px;
        }

        .form-container .form-horizontal .form-group {
            margin-bottom: 20px; /* Add margin to space out form controls */
        }

        .form-container .form-horizontal .form-control {
            color: #000000; /* Change text color to black */
            background: #f8f9fa; /* Set background color */
            padding: 10px; /* Add padding for better appearance */
            border: 1px solid #ced4da; /* Add border */
            border-radius: 5px; /* Add border-radius for rounded corners */
            width: 100%; /* Make the input width 100% */
        }

        .form-container .form-horizontal .form-control:focus {
            outline: none;
            box-shadow: none;
        }

        .form-container .form-horizontal .form-control::placeholder {
            color: #000000; /* text colour */
            font-size: 16px;
            font-weight: 400;
        }

        .form-container .form-horizontal .form-group select.form-control option {
            color: #000;
            background: #fff;
        }

        .form-container .form-horizontal .btn {
            color: #fff;
            background: #4dae3c; /* button colour */
            font-size: 18px;
            letter-spacing: 1px;
            border-radius: 50px;
            padding: 8px 25px;
            border: none;
            transition: all .4s ease;
        }

        .form-container .form-horizontal .btn:hover {
            text-shadow: 2px 2px 2px rgba(0, 0, 0, .6);
        }

        .form-container .form-horizontal .btn:focus {
            outline: none;
        }

        @media only screen and (max-width:576px) {
            .form-container .form-img {
                width: 100%;
                height: 400px;
            }

            .form-container .form-horizontal {
                width: 100%;
            }
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
                <a href="FTSMMember_Index.php">&#8962;</a>
              </li>
            </ul>
    </div>

    <div class="row justify-content-center" style="color: black; margin-top: 80px;">
        <div class="col-6">
            <!-- Apply the "bold-text" class to make the text bold -->
            <h1 class="bold-text text-center">Book A Counseling Session</h1>
            <h5 class="bold-text text-center">Please fill in all details</h5>
        </div>

        <br>
        <div class="form-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                        <div class="form-container">
                            <div class="form-img"></div>
                            <form class="form-horizontal" method="post" action="counselingform_crud.php">
                                <h3 class="title">Booking Info</h3>
                                <div class="form-group">
                                    <input type="text" class="form-control black-text" name="name" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="matric_no" placeholder="Matric No">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="phone" placeholder="Phone Number" pattern="01\d-\d{7}" required>
                                    <small id="phoneHelp" class="form-text text-muted">Format: 01X-XXXXXXX</small>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" placeholder="Description" rows="4" required></textarea>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block" style="text-align: center;">
                                        <button type="submit" class="btn btn-default" lay-submit lay-filter="formDemo" id="submit" style="margin-right: 10px;">SUBMIT</button>
                                        <button class="btn btn-default" lay-submit lay-filter="formDemo" id="reset">RESET</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>