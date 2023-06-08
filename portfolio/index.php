<?php
session_start();
require '../db.php';

// Logo
$select_logo = "SELECT * FROM logos WHERE status=1";
$select_logo_res = mysqli_query($db_connect, $select_logo);
$after_assoc_logo_res = mysqli_fetch_assoc($select_logo_res);


// Banner
$select_banner = "SELECT * FROM banners";
$select_banner_res = mysqli_query($db_connect, $select_banner);
$after_assoc_banner_res = mysqli_fetch_assoc($select_banner_res);

// About
$select_about = "SELECT * FROM about";
$select_about_res = mysqli_query($db_connect, $select_about);
$after_assoc_about = mysqli_fetch_assoc($select_about_res);


// Banner Photo
$select_banner_photo = "SELECT * FROM banner_photo WHERE status=1";
$select_banner_photo_res = mysqli_query($db_connect, $select_banner_photo);
$after_assoc_banner_photo_res = mysqli_fetch_assoc($select_banner_photo_res);

// Social Icon
$select_social = "SELECT * FROM social WHERE status=1";
$select_social_res = mysqli_query($db_connect, $select_social);


// Skills 
$select_skill = "SELECT * FROM skills WHERE status=1";
$select_skill_res = mysqli_query($db_connect, $select_skill);

// Services 
$select_ser = "SELECT * FROM service WHERE status=1";
$select_ser_res = mysqli_query($db_connect, $select_ser);

// Counter 
$select_count= "SELECT * FROM number WHERE status=1";
$select_count_res = mysqli_query($db_connect, $select_count);

// Testimonial 
$select_test= "SELECT * FROM test WHERE status=1";
$select_test_res = mysqli_query($db_connect, $select_test);

// Brands 
$select_brand= "SELECT * FROM brand WHERE status=1";
$select_brand_res = mysqli_query($db_connect, $select_brand);

// Works 
$select_work= "SELECT * FROM works";
$select_work_res = mysqli_query($db_connect, $select_work);

// Menu 
$select_menu= "SELECT * FROM menus";
$select_menu_res = mysqli_query($db_connect, $select_menu);


?>

<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa - Personal Portfolio HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">


        <style>

                 .transparent-header.sticky-menu {
                    background: #152136 !important;
                 }

        </style>
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" style="padding: 0!important;"  class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="index.html" style="padding-top: 0!important; padding-bottom: 0!important" class="navbar-brand logo-sticky-none"><img src="../upload/logo/<?=$after_assoc_logo_res['logo']?>" width="150" alt="Logo"></a>
                                    <a href="index.html" class="navbar-brand s-logo-none"><img src="../upload/logo/<?=$after_assoc_logo_res['logo']?>" width="150" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <?php foreach($select_menu_res as $menu) {?>
                                            <li class="nav-item"><a class="nav-link" href="#<?=$menu['sec_id']?>"><?=$menu['name']?></a></li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="fa fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="../upload/logo/<?=$after_assoc_logo_res['logo']?>" width ="100" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p>123/A, Miranda City Likaoli
                            Prikano, Dope</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+0989 7876 9865 9</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                <?php foreach($select_social_res as $icon) {?>
                   <a target="_blank" href="<?=$icon['link']?>"><i class="<?=$icon['icon']?>"></i></a>       
                <?php } ?>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?=$after_assoc_banner_res['sub_title']?></h6>
                                <h2 class="wow fadeInUp" style="font-size: 70px !important;" data-wow-delay="0.4s"><?=$after_assoc_banner_res['title']?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?=$after_assoc_banner_res['desp']?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <?php foreach($select_social_res as $icon) {?>
                                            <li><a target="_blank" href="<?=$icon['link']?>"><i class="<?=$icon['icon']?>"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img height="800" src="../upload/banner/<?=$after_assoc_banner_photo_res['photo']?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="img/banner/banner_img2.png" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span><?=$after_assoc_about['sub_title']?></span>
                                <h2><?=$after_assoc_about['title']?></h2>
                            </div>
                            <div class="about-content">
                                <p><?=$after_assoc_about['desp']?></p>
                                <h3>Education:</h3>
                            </div>
                            <!-- Education Item -->
                            <?php foreach($select_skill_res as $skil) {?>
                            <div class="education">
                                <div class="year"><?=$skil['title']?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?=$skil['desp']?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?=$skil['percentage']?>%;" aria-valuenow="65" aria-valuemin="<?=$skil['percentage']?>" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                       <?php foreach($select_ser_res as $ser) {?>
						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                 <i class="<?=$ser['icon']?>"></i>
								<h3><?=$ser['title']?></h3>
								<p><?=$ser['desp']?></p>
							</div>
						</div>
                        <?php }?>
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($select_work_res as $work) {?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="/part1/upload/work/thum/<?=$work['thum']?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?=$work['category']?></span>
									<h4><a href="portfolio-single.php?id=<?=$work['id']?>"><?=$work['sub_title']?></a></h4>
									<a href="portfolio-single.php?id=<?=$work['id']?>" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->

            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                        <?php foreach($select_count_res as $count) {?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?=$count['icon']?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2>
                                            <?php 

                                            $number = $count['number'];
                                            if($number >= 1000){
                                                $result = $number/1000;
                                                echo "<span class='count'>$result</span>" . "<span>k</span>";
                                            }
                                            else{
                                                echo "<span class='count'>$number</span>";
                                            }
                                            
                                            ?>
                                        </h2>
                                        <span><?=$count['desp']?></span>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                                <?php foreach($select_test_res as $test) {?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img style="border-radius: 50%; width: 100px; height: 100px;" src="/part1/upload/test/<?=$test['photo']?>" alt="">
                                    </div>
                                    <div class="testi-content">
                                        <h4><?=$test['desp']?></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?=$test['name']?></h5>
                                            <span><?=$test['sub_name']?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                      <?php foreach($select_brand_res as $brand) {?>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="/part1/upload/brand/<?=$brand['brand']?>" alt="img">
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5>OFFICE IN <span>NEW YORK</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fa fa-map-marker"></i><span>Address :</span>Event Center park WT 22 New York</li>
                                        <li><i class="fa fa-headphones"></i><span>Phone :</span>+9 125 645 8654</li>
                                        <li><i class="fa fa-globe-asia"></i><span>e-mail :</span>info@exemple.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php if(isset($_SESSION['msg'])) {?>
                                <strong class="alert alert-success"><?=$_SESSION['msg']?></strong>
                            <?php } unset($_SESSION['msg'])?>
                            <div class="contact-form mt-3">
                                <form action="../massage/msg_post.php" method="POST">
                                    <input type="text" name="name" placeholder="your name *">
                                    <input type="email" name="email" placeholder="your email *">
                                    <textarea name="message" id="message" placeholder="your message *"></textarea>
                                    <button type="submit" class="btn">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/one-page-nav-min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->
</html>
