<!DOCTYPE html>
<html lang="en">

<head>
    <title>Helpinghand</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="../<?php site_url();?>vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="../<?php site_url();?>vendor/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../<?php site_url();?>vendor/css/animate.css" rel="stylesheet">
    <link href="../<?php site_url();?>vendor/css/style.css" rel="stylesheet">
    <link href="../<?php site_url();?>vendor/css/template_2.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="template_2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
</head>

<body>
<form action="previewTemplate_save" method="post">
    <input type="hidden" value="<?php echo $name; ?>" name="name">
    <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
    <input type="hidden" value="<?php echo $template; ?>" name="template">
    <input type="hidden" value="<?php echo $type; ?>" name="type">
    <input type="hidden" value="<?php echo $description; ?>" name="description">
    <input type="hidden" value="<?php echo $location; ?>" name="location">
    <input type="hidden" value="<?php echo $strength; ?>" name="strength">
    <input type="hidden" value="<?php echo $username; ?>" name="username">
    <input type="hidden" value="<?php echo $password; ?>" name="password">
    <input style="background: #2f4050;color: white;position: fixed;z-index: 33;margin-left: 50%;" class="btn btn-white" type="submit" value="Finalize Theme">
</form>
<form action="SelectTemplate" method="post">
    <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
    <input style="background: #2f4050;color: white;position: fixed;z-index: 33;margin-left: 60%;" class="btn btn-white" type="submit" value="Choose Another Theme">
</form>
    <div class="jumbotron text-center" style="margin-bottom: 0px;">
        <h1 style="margin-top: 30px;"><?php echo $name; ?></h1>
        <p>The change we bring...</p>
        <p><?php echo $description; ?></p>
    </div>
    <div class="grad6" style="text-align:center; ">
        <div class="navbar">
            <a href="#home">Home</a>
            <a href="#news">Gallery</a>
            <a href="#contact">Contact</a>
        </div>
    </div>

    <div class="container">
        <h2 class="text-center"><b>Impact Stories</b></h2>
        <div class="row">
            <div class="col-sm-4 text-center border">
                <h3>Column 1</h3>
                <img src="Column1.jpg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4 text-center border">
                <h3>Column 2</h3>
                <img src="Column2.jpg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4 text-center border">
                <h3>Column 3</h3>
                <img src="Column3.jpg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
        </div>
    </div>
    <div class="grad5 container-fluid" style="text-align:center; color:white; ">
        <hr>
        <h3>Contact-no.: </h3>
        <h3>Address: <?php echo $location; ?></h3>
    </div>
</body>

</html>