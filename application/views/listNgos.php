<!DOCTYPE html>
<html lang="en">

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
                        <li><a class="page-scroll" href='Landing/about'>About Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
<!--HEADER STOPS-->
   <div class="container-fluid text-center" style="margin-top:10%;">
        <h3>Select NGOs</h3>
        <ul class="list-group">
            <?php
                foreach ($NGONoDonationDetails as $noDonation) {
                    echo'
                    <a onclick="ankit('.$noDonation['ngo_id'].')" href="#" data-toggle="modal" data-target="#myModal">
                    <li class="list-group-item">
                    <!-- Modal -->
                    <div class="row text-center">
                                <div class="col-md-9 text-left">
                                        <div class="row text-left">
                                            <div class="col-md-9">'.$noDonation['ngo_name'].'</div>
                                            <div class="col-md-3">'.$noDonation['strength'].'</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">'.$noDonation['location'].'</div>
                                            <div class="col-md-3">Contact no:</div>
                                        </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        '.$noDonation['ngo_description'].'
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </li>
                    </a>
            ';
                }

                foreach ($NGODonationDetails as $Donation) {
                    echo'<li class="list-group-item">
                            <div class="row text-left">
                                <div class="col-md-12 text-left">
                                        <div class="row text-left">
                                            <div class="col-md-9">'.$Donation['ngo_name'].'</div>
                                            <div class="col-md-3">'.$Donation['strength'].'</div>
                                        </div>
                                        <div class="row text-left">
                                            <div class="col-md-9">'.$Donation['location'].'</div>
                                            <div class="col-md-3">Contact no:</div>
                                        </div>
                                    <div class="row text-left">
                                        <div class="col-md-12">
                                        '.$Donation['ngo_description'].'
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
            ';
                }
            ?>
            


        </ul>
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
        <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- <input type="button" class="close" data-dismiss="modal">&times;</input> -->
                            <h4 style="color: #18a689" class="modal-title">Enter details</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <form method="post" action="makedonation">
                                        <input id="ngo_id" type="hidden" name="ngo_id" value="">
                                        <input  type="hidden" name="itemid" value="<?php echo $items;  ?>">
                                        <div class="form-group">
                                            <label for="usr">Item's Quantity</label>
                                            <input type="number" name="quantity" class="form-control" id="usr">
                                        </div>
                                        <br>
                                        <hr>
                                        <h3 style="color: #18a689">DONOR</h3>
                                        <hr>
                                        <div class="form-group">
                                            <label for="usr" name="name">Name</label>
                                            <input type="text" name="donor" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr" name="number">Contact no.</label>
                                            <input type="number" name="number" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr" name="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr" name="day">Schedule a day</label>
                                            <input type="date" name="day" class="form-control" id="usr">
                                        </div>
                                        <div class="form-group">
                                            <label for="usr" name="time">Schedule a time</label>
                                            <input type="time" name="time" class="form-control" id="usr">
                                        </div>
                                        <input type="submit">
                                    </form>  
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        
                      </div>
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
<script src="../<?php site_url();?>vendor/js/jquery-3.1.1.min.js"></script>
<script src="../<?php site_url();?>vendor/js/bootstrap.min.js"></script>
<script src="../<?php site_url();?>vendor/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../<?php site_url();?>vendor/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="../<?php site_url();?>vendor/js/inspinia.js"></script>
<script src="../<?php site_url();?>vendor/js/plugins/pace/pace.min.js"></script>
<script src="../<?php site_url();?>vendor/js/plugins/wow/wow.min.js"></script>


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

<script type="text/javascript">
    function ankit(ngo_id)
    {
        $("#ngo_id").replaceWith('<input id="ngo_id" type="hidden" name="ngo_id" value="'+ngo_id+'">');
    }    
</script>
      <!--FOOTER-->
</body>

</html>