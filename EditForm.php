<?php
include_once 'Editform_crud.php';
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
            background: #4dae3c;
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
    </style>

</head>

<body>

    <?php
    include_once 'header3.php'
    ?>

    <div class="row justify-content-center">
        <div class="col-6">
            <!-- Apply the "bold-text" class to make the text bold -->
            <h1 class="bold-text text-center" style="color: black;">Donation Request Form</h1><br>
        </div>

        <br>
   


        <div class="form-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                        <div class="form-container">
                            <div class="form-img"></div>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                
                                <h3 class="title">Request Information</h3>
                                
                                <div class="form-group">
                                    <input name="id" type="text" class="form-control" id="id" placeholder="Identification Number" value="<?php if(isset($_GET['edit'])) echo $editrow['ID']; ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <input name="matricno" type="text" class="form-control" id="matricno" placeholder="Matric No" value="<?php if(isset($_GET['edit'])) echo $editrow['Matric_No']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" value="<?php if(isset($_GET['edit'])) echo $editrow['Full_Name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone Number" value="<?php if(isset($_GET['edit'])) echo $editrow['Phone_No']; ?>" pattern="01\d-\d{7}" required>
                                </div>

                                <div class="form-group"> 
                                    
                                    <select name="donation" class="form-control" id="donation" required>
                                        <option value="" disabled selected>Type of Donation</option>
                                        <option value="Family Death" <?php if(isset($_GET['edit'])) if($editrow['Donation_Type']=="Family Death") echo "selected"; ?>>Family Death</option>
                                        <option value="Natural Disaster" <?php if(isset($_GET['edit'])) if($editrow['Donation_Type']=="Natural Disaster") echo "selected"; ?>>Natural Disaster</option>
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <input name="address" type="text" class="form-control" id="address" placeholder="House Address" value="<?php if(isset($_GET['edit'])) echo $editrow['House_Address']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <select name="bank" class="form-control" id="bank" required>
                                       <option value="" disabled selected>Bank Merchant</option>
                                        <option value="Maybank" <?php if(isset($_GET['edit'])) if($editrow['Bank_Merchant']=="Maybank") echo "selected"; ?>>Maybank</option>
                                        <option value="Bank Islam" <?php if(isset($_GET['edit'])) if($editrow['Bank_Merchant']=="Bank Islam") echo "selected"; ?>>Bank Islam</option>
                                        <option value="CIMB" <?php if(isset($_GET['edit'])) if($editrow['Bank_Merchant']=="CIMB") echo "selected"; ?>>CIMB</option>
                                        <option value="Bank Rakyat" <?php if(isset($_GET['edit'])) if($editrow['Bank_Merchant']=="Bank Rakyat") echo "selected"; ?>>Bank Rakyat</option>
                                        <option value="RHB" <?php if(isset($_GET['edit'])) if($editrow['Bank_Merchant']=="RHB") echo "selected"; ?>>RHB</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input name="account" type="text" class="form-control" id="account" placeholder="Account Number" value="<?php if(isset($_GET['edit'])) echo $editrow['Account_Number']; ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <p class="form-title">Please upload any supporting documents:</p>
                                    <input name="file" type="file" class="form-control" id="supportingDocuments" placeholder="Document" value="<?php if(isset($_GET['edit'])) echo $editrow['Document']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <p class="form-title">Please upload any DuitNow QR Code:</p>
                                    <input name="pictureFile" type="file" class="form-control" id="QRcode" placeholder="QR Code" value="<?php if(isset($_GET['edit'])) echo $editrow['QR']; ?>" required>
                                </div>

                                <div class="text-center">
    
                                    <?php if (isset($_GET['edit'])) { ?>
                                        <input type="hidden" name="oldmatricno" value="<?php echo $editrow['Matric_No']; ?>">
                                        <button class="btn btn-default" type="submit" name="update">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update
                                        </button>
                                        <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
                                    <?php } else { ?>
                                        <div class="text-center">
                                            <button class="btn btn-default" lay-submit lay-filter="formDemo" id="submit" style="margin-right: 10px;">Submit</button>
                                            <button class="btn btn-default" lay-submit lay-filter="formDemo" id="reset">Reset</button>
                                        </div>
                                    <?php } ?>
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

        form.render(); // This line is added to render the form elements

        form.on('submit(formDemo)', function (data) {
            // Prevent form submission (we'll handle it using JavaScript)
            data.elem.form.action = "RequestForm_crud.php"; // Set the form action
            layer.msg('Your request for donation is successfully submitted.', {
                time: 2000, // 2 seconds
                end: function () {
                    // Redirect to the landing page after the popup message disappears
                    window.location.href = 'TimelineStatus.php';
                }
            });

            return false;
        });
    });

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


    </script>

<?php
include 'footer.php';
?>

</body>


</html>