<? include_once('clientobjects.php'); ?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?=PAGE_TITLE ?>
    <?php if($pageName!=""){ echo $pageName;}else if(isset($_GET['action'])){ echo $_GET['action'];}else{ echo "Home";}?></title>
	<meta name="description" content="">
	
	<!-- CSS FILES -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" data-name="skins">
    <link rel="stylesheet" href="css/layout/wide.css" data-name="layout">

    <link rel="stylesheet" href="css/fractionslider.css"/>
    <link rel="stylesheet" href="css/style-fraction.css"/>

    <link rel="stylesheet" type="text/css" href="css/switcher.css" media="screen" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<!--Start Header-->
	<header id="header" class="clearfix">
        <div id="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 top-info">
                        <ul>
                            <iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true" src="http://www.ashesh.com.np/linknepali-time.php?time_only=no&font_color=ffffff&aj_time=yes&font_size=12&line_brake=0&api=2710y0g415" width="334" height="22"></iframe>
                        </ul>
                    </div>

                    <div class="col-sm-7 hidden-xs top-info">
                        <span><i class="fa fa-phone"></i>Phone: +81-80-6874-9751</span>
                        <span><i class="fa fa-envelope"></i>Email: info@nepaljss.com</span>
                    </div>
                                    </div>
            </div>
        </div>
        <!-- LOGO bar -->
       <div id="logo-bar" class="clearfix" style="border-top: 5px solid rgba(5, 93, 173, 1);">
           <!-- Container -->
           <div class="container">
               <div class="row">
                   <!-- Logo / Mobile Menu -->
                   <div class="col-xs-12">
                       <div id="logo">
                           <h1>
						   <? $logo=$groups->getById(479);
								$logoGet=$conn->fetchArray($logo)
								?>
						   <a href="index.php"><img src="<?=CMS_GROUPS_DIR.$logoGet['image'];?>" alt="logo" /></a></h1>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Container / End -->
       </div>
        <!--LOGO bar / End-->

        <!-- Navigation
================================================== -->
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
					
					
					<? if(isset($_GET['pageId'])){ $pageId=$_GET['pageId']; }?>
                    <? createMenu(0, "Header", $pageId); ?>
                       
                    </div>
                </div><!--/.row -->
            </div><!--/.container -->
        </div>
	</header>
	<!--End Header-->

	<!--start wrapper-->
	<section class="wrapper">
      
		<? if(!isset($_GET['action']) and !isset($pageLinkType))
				{?>
	
<? include('includes/slider.php'); ?>
 <? }?>
			<!--End Slider-->
			 <?php 
							if(isset($_GET['action']))
							{
									$action = $_GET['action'];
									$action = str_replace(".","", $action);
									include("includes/".$action.".php");			
							}				
							else if(isset($pageLinkType))
							{
									if ($pageLinkType!="") 
									{
											include("includes/cmspage.php");
									}
							}
							else 
							{
									include("includes/main.php");
							}
						?>
			
		
		
				
	
       
    </section>

   
	
	<section class="footer_bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 ">
                    <p class="copyright">&copy; Copyright 2016 Nepal Japan Student Society.  Design and Developed by 
					<a href="http://www.recentitsolution.com">Recent IT Solution and Research Center</a></p>
				</div>
				
				<div class="col-lg-3 ">
					<div class="footer_social">
						<ul class="footbot_social">
							<li><a class="fb" href="#." data-placement="top" data-toggle="tooltip" title="Facbook"><i class="fa fa-facebook"></i></a></li>
							<li><a class="twtr" href="#." data-placement="top" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a class="dribbble" href="#." data-placement="top" data-toggle="tooltip" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
							<li><a class="skype" href="#." data-placement="top" data-toggle="tooltip" title="Skype"><i class="fa fa-skype"></i></a></li>
							<li><a class="rss" href="#." data-placement="top" data-toggle="tooltip" title="RSS"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script> <!-- jQuery cookie -->
    <script type="text/javascript" src="js/styleswitch.js"></script> <!-- Style Colors Switcher -->
    <script src="js/jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery.smartmenus.min.js"></script>
    <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.jcarousel.js"></script>
    <script type="text/javascript" src="js/jflickrfeed.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/swipe.js"></script>
    <script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>

    <script src="js/main.js"></script>

    <!-- Start Style Switcher 
    <div class="switcher"></div>-->
    <!-- End Style Switcher -->
    <script>
        $(window).load(function(){
            $('.slider').fractionSlider({
                'fullWidth': 			true,
                'controls': 			true,
                'responsive': 			true,
                'dimensions': 			"1920,450",
                'increase': 			true,
                'pauseOnHover': 		true,
                'slideEndAnimation': 	true,
                'autoChange':           true
            });
        });
    </script>
</body>
</html>


