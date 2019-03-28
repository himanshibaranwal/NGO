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

<body class="gray-bg landing-page no-skin-config" id="page-top">
<!---HEADER STARTS-->
<div class="navbar-wrapper">
        <nav style="background: black;" class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p style="color: white; margin:3%; padding: 1%; font-size:2.5em; letter-spacing: 2px; font-family: Helvetica, Arial, sans-serif;"><span>Helpinghand</span></p>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="#page-top">Home</a></li>
                        <li><a class="page-scroll" href="#features">About Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
<!--HEADER STOPS-->
    <div style="width:400px" class="middle-box text-center loginscreen animated fadeInDown">
        <div style=" margin-top: 20%;">
            <div>
            <form class="form-horizontal"  method="post" action="otpVerification">
                                <p style="font-size: 2em; margin: 2%; padding: 2%; letter-spacing: 1px;">Register here</p>
                                <div class="form-group"><label class="col-lg-2 control-label">Name</label>

                                    <div class="col-lg-10"><input type="text" name="name" placeholder="Enter Name" class="form-control" required=""> <span class="help-block m-b-none"> like XYZ Sharma.</span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">E-mail</label>

                                    <div class="col-lg-10"><input type="email" name="email" placeholder="E-mail" class="form-control" required=""> <span class="help-block m-b-none"> like XYZSharma@abc.com</span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Contact-no.</label>
                                    <div class="col-lg-10"><input type="text" name="number" placeholder="Contact-no" class="form-control" required=""> <span class="help-block m-b-none"></span>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input style="background: #1ab394;color: white;" class="btn btn-white" type="submit" value="Submit">
                                    </div>
                                </div>
            </form>
            </div>
        </div>
      <!--FOOTER TRIAL-->
      <section id="contact" class="gray-section contact" style="width: 308%; margin-left: -104%;">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Contact Us</h1>
                <p>A change that we bring.</p>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy">Helpinghand</span></strong><br/>
                    Nayandahalli<br/>
                    Bangalore-560039<br/>
                    <abbr title="Phone">Phone no.:</abbr>+91-9741596129
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                    A platform to bring together the minorities, bringing a positive change in society..
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:test@email.com" class="btn btn-primary">Send us mail</a>
                <p class="m-t-sm">
                    Or follow us on social platform
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>Helpinghand</strong><br/>A change that we bring.</p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="<?php site_url();?>vendor/js/jquery-3.1.1.min.js"></script>
<script src="<?php site_url();?>vendor/js/bootstrap.min.js"></script>
<script src="<?php site_url();?>vendor/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php site_url();?>vendor/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php site_url();?>vendor/js/inspinia.js"></script>
<script src="<?php site_url();?>vendor/js/plugins/pace/pace.min.js"></script>
<script src="<?php site_url();?>vendor/js/plugins/wow/wow.min.js"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>
      <!--FOOTER-->  


</body>

</html>
