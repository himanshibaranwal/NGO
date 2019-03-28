<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Helpinghand</title>

    <link href="../<?php site_url();?>vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="../<?php site_url();?>vendor/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../<?php site_url();?>vendor/css/animate.css" rel="stylesheet">
    <link href="../<?php site_url();?>vendor/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div style="width:400px" class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            <form class="form-horizontal" method="post" action="verifyotp">
                <?php echo'
                   <input type="hidden" name="name" value="'.$name.'">
                   <input type="hidden" name="email" value="'.$email.'">
                   <input type="hidden" name="number" value="'.$number.'">
                   ';
                   ?>
                                <p>OTP</p>
                                <?php echo'<input type="hidden" name="generatedotp" value="'.$otp_number.'">'; ?>
                                
                                <div class="form-group"><label class="col-lg-2 control-label">Enter OTP</label>
                                     <div class="col-lg-10"><input type="input" name="userotp"  class="form-control"> <span class="help-block m-b-none"> like -----</span>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input style="background: #2f4050;color: white;" class="btn btn-white" type="submit" value="Verify">
                                    </div>
                                </div>
                            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../<?php site_url();?>vendor/js/jquery-3.1.1.min.js"></script>
    <script src="../<?php site_url();?>vendor/js/bootstrap.min.js"></script>

</body>

</html>
