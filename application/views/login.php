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

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">HH</h1>

            </div>
            <h3>Helpinghand</h3>
            <p>Change That We Bring.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="post" action="../Login/checkLogin">
                <div class="form-group">
                    <input type="email" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <input type="submit" class="btn btn-primary block full-width m-b" value="Login">

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register">Register NGO</a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../<?php site_url();?>vendor/js/jquery-3.1.1.min.js"></script>
    <script src="../<?php site_url();?>vendor/js/bootstrap.min.js"></script>

</body>

</html>
