<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Helpinghand</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php site_url();?>vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="<?php site_url();?>vendor/css/animate.css" rel="stylesheet">
    <link href="<?php site_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php site_url();?>vendor/css/style.css" rel="stylesheet">
</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav style="background: black;" class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="landing/login">Login</a>
                </div>
                <form class="navbar-form navbar-left" method="post" action="landing/action_page">
                <div class="form-group">
                    <select style="height:35px" name="category">
                        <option>Select Category</option>
                    <?php
                        foreach ($SearchCategory as $cat) {
                            echo'<option value="'.$cat['category_id'].'">'.$cat['category_name'].'</option>';
                        }
                    ?>
                    </select>
                </div>
                <input type="submit" value="Donate" class="btn btn-warning"></input>
                
                </form>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="#page-top">Home</a></li>
                        <li><a class="page-scroll" href="#features">About Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>

<section id="features" class="container services">
    <br><br>
    <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-sm-12 col-lg-7 col-md-12">
            <?php
            foreach($AllPostdata as $data) {
                echo'
                <div class="social-feed-box">

                        <div class="pull-right social-action dropdown">
                            <!--<button data-toggle="dropdown" class="dropdown-toggle btn-white">
                                Donate now!
                            </button>
                            <ul class="dropdown-menu m-t-xs">
                                <li><a href="#">Config</a></li>
                            </ul>-->
                        </div>
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="vendor/img/'.$data['post_image_name'].'">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    '.$data['name'].'
                                </a>
                                <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                '.$data['post_description'].'
                            </p>
                            <img src="vendor/img/'.$data['post_image_name'].'" class="img-responsive">
                            <div class="btn-group">
                                <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                                <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                                <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                            </div>
                        </div>
                        <div class="social-footer">
                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="vendor/img/avatar3.jpg">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        Preeti Yadav
                                    </a>
                                    Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words.
                                    <br/>
                                    <a href="#" class="small"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> -
                                    <small class="text-muted">12.06.2014</small>
                                </div>
                            </div>

                            <div class="social-comment">
                                <a href="" class="pull-left">
                                    <img alt="image" src="vendor/img/user.png">
                                </a>
                                <div class="media-body">
                                    <textarea class="form-control" placeholder="Write comment..."></textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                ';
            }
            
            ?>
            

        </div>
      <div class="col-lg-3">


      </div>
    </div>
</section>

<section id="contact" class="gray-section contact">
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

</body>
</html>
