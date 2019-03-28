
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $name; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../<?php site_url();?>vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="../<?php site_url();?>vendor/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../<?php site_url();?>vendor/css/animate.css" rel="stylesheet">
    <link href="../<?php site_url();?>vendor/css/style.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
 <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
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
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1><?php echo $name; ?></h1>
  <!-- <p>Resize this responsive page to see the effect!</p>  -->
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#"><?php echo $name; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link-3</a>
      </li>    
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2>About us</h2>
      <h5>Gallery</h5>
      <div class="fakeimg">Image</div>
      <p>Some text about the organisation, basically description.</p>
    </div>
    <div class="col-sm-8">
      <h2>Impact Stories</h2>
      <hr>
      <div class="fakeimg">Image</div>
      <h6>Change that we bring...</h6>
      <p><?php echo $description; ?></p>
      <br>
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
	<hr>
  <h5>Contact-no.: </h5>
  <h5>Address: <?php echo $location; ?> </h5>
</div>

</body>
</html>
