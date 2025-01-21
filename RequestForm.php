<?php
include_once 'RequestForm_crud.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCare: Donation Request Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>

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



        .form-container {
            font-family: "Times New Roman", Times, serif;
            font-size: 0;
            border-radius: 20px;
            overflow: hidden;
            display: flex; /* Add display flex to the form-container */
        }

        .form-container .form-img {
           background-image: url(https://img.indiafilings.com/learn/wp-content/uploads/2021/11/12003509/about.jpg);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover; /* Ensure the entire container is covered without stretching */
    width: 50%;
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
            color: #000000;
            /* booking info colour */
            font-size: 25px;
            font-weight: 400;
            margin: 0 0 35px;
        }

        .form-container .form-horizontal .form-group {
            margin-bottom: 20px;
            /* Add margin to space out form controls */
        }

        .form-container .form-horizontal .form-control {
            color: #000000;
            /* Change text color to black */
            background: #f8f9fa;
            /* Set background color */
            padding: 10px;
            /* Add padding for better appearance */
            border: 1px solid #ced4da;
            /* Add border */
            border-radius: 5px;
            /* Add border-radius for rounded corners */
            width: 100%;
            /* Make the input width 100% */
        }

        .form-container .form-horizontal .form-control:focus {
            outline: none;
            box-shadow: none;
        }

        .form-container .form-horizontal .form-control::placeholder {
            color: #000000;
            /* text colour */
            font-size: 16px;
            font-weight: 400;
        }

        .form-container .form-horizontal .form-group select.form-control option {
            color: #000;
            background: #fff;
        }

        .form-container .form-horizontal .btn {
            color: #fff;
            background: linear-gradient(45deg, #022954, #5d76cb);
            /* button colour */
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
                /* Remove fixed height */
                height: auto;
                /* Adjust to content height */
            }

            .form-container .form-horizontal {
                width: 100%;
            }
        }
        .form-group .form-title {
    color: #000000; /* text color */
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px; /* Add margin to space out the title and file input */
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

/* h1 {
  font-size: 45px; 
  letter-spacing: -1px; 
  line-height: 1;
  text-align: left;
  font-family: Impact, fantasy;
  font-weight: 80;
} */

.col-6 {
    padding-top: 100px; /* Adjust the value to control the amount of space */
}

.form-container {
    /* existing styles */
    margin-top: -2px; /* Adjust the value to control the amount of space */
}

.form-container .form-horizontal .form-control::placeholder {
    color: #999; /* Use a lighter shade of gray or your preferred color */
    font-size: 16px;
    font-weight: 400;
}

.btn .btn-default {
      background: linear-gradient(45deg, #022954, #5d76cb); /* Apply the gradient background */
      color: #fff; /* Text color is white */
      border: none; /* Remove the default button border */
      border-radius: 10px; /* Apply rounded corners */
      padding: 10px 20px; /* Add some padding for a rectangular shape */
      font-weight: bold; /* Make the text bold */
      cursor: pointer;
      margin: 10px auto; /* Center the button */
      display: block; /* Ensure it's a block-level element for centering */
      width: fit-content; /* Set the width to fit the content */
      justify-content: center;
      margin-bottom: 40px;
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

    <div class="row justify-content-center">
        <div class="col-6">
            <!-- Apply the "bold-text" class to make the text bold -->
            <h1 class="bold-text text-center" style="color: black;">Donation Request Form</h1><br>
        </div>

        <br>
   


        <div class="form-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1"  >
                        <div class="form-container" style="margin-bottom: 20px";>
                            <div class="form-img"></div>
                            <form class="form-horizontal" id="donationForm" method="post" enctype="multipart/form-data " onsubmit="return validateForm();">
                                
                                <h3 class="title">Request Info</h3>
                                
                                <div class="form-group">
                                    <input type="text" id="id" name= "id" autocomplete= "off" class="form-control black-text" placeholder="Identification Number" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" id=" matric_no" name= "matric_no" autocomplete= "off" class="form-control" placeholder="Matric No" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="name" name= "name" autocomplete= "off" class="form-control" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" id="phone" name= "phone" autocomplete= "off" class="form-control" placeholder="Phone Number" pattern="01\d-\d{7}" required>
                                    <small id="phoneHelp" class="form-text text-muted">Format: 01X-XXXXXXX</small>
                                </div>

                                <div class="form-group"> 
                                    <select class="form-control" id="type_donation" name="type_donation" placeholder="Type of Donation" required>
                                        <option value="" disabled selected>Type of Donation</option>
                                        <option value="Family Death">Family Death</option>
                                        <option value="Natural Disaster">Natural Disaster</option>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <input type="text" id="address" name= "address" autocomplete= "off" class="form-control" placeholder="House Address" required>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name= "bank" autocomplete= "off" id="bank" placeholder="Bank Merchant" required>
                                        <option value="" disabled selected>Bank Merchant</option>
                                        <option value="0">Maybank</option>
                                        <option value="1">Bank Islam</option>
                                        <option value="2">CIMB</option>
                                        <option value="3">Bank Rakyat</option>
                                        <option value="4">RHB</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" id="accountno" name= "account_number" autocomplete= "off" class="form-control" placeholder="Account Number" required>
                                </div>
                                
                                <div class="form-group">
                                    <p class="form-title">Please upload any supporting documents:</p>
                                    <input type="file" class="form-control" id="supportingDocuments" name="file" required>
                                </div>

                                <div class="form-group">
                                    <p class="form-title">Please upload any DuitNow QR Code:</p>
                                    <input type="file" class="form-control" id="QRcode" name="pictureFile" required>
                                </div>

                                <div class="layui-form-item">
                                <div class="layui-input-block" style="text-align: center;">
                                    <button class="btn btn-default" name="button" lay-submit lay-filter="formDemo" id="submit" style="margin-right: 10px;">Submit</button>
                                <button class="btn btn-default" lay-submit lay-filter="formDemo" id="reset">Reset</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="//unpkg.com/layui@2.8.18/dist/layui.js"></script>
        <script>
layui.use(['layer', 'form'], function () {
    var layer = layui.layer;
    var form = layui.form;

    layui.use(['upload', 'layer', 'element', '$'], function () {
        var upload = layui.upload;
        var layer = layui.layer;
        var element = layui.element;
        var $ = layui.$;

        // 多图片上传
        upload.render({
            elem: '#ID-upload-demo-btn-2',
            url: '', // 实际使用时改成您自己的上传接口即可。
            multiple: true,
            auto: false,
            bindAction: '#submit',
            before: function (obj) {
                // 预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#upload-demo-preview').append('<img src="' + result + '" alt="' + file.name + '" style="width: 100px; height: 100px;">');
                });
            },
            done: function (res) {
                // 上传完毕
                // …
            }
        });

        Date.prototype.Format = function (fmt) {
            var o = {
                "M+": this.getMonth() + 1, //月份 
                "d+": this.getDate(), //日 
                "H+": this.getHours(), //小时 
                "m+": this.getMinutes(), //分 
                "s+": this.getSeconds(), //秒 
                "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
                "S": this.getMilliseconds() //毫秒 
            };
            if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
            for (var k in o)
                if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
            return fmt;
        }
        var time1 = new Date().Format("yyyy-MM-dd");
    });
});
</script>



</body>


</html>
