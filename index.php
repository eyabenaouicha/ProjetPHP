<!doctype html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Hotel</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/simplegrid.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="js/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" href="js/owl-carousel/owl.theme.css" />
    <link rel="stylesheet" href="js/owl-carousel/owl.transitions.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c516515596.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900' rel='stylesheet'
        type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
             <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
             <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
           <![endif]-->
</head>

<body id="home">
    <!-- Header -->
    <header id="top-header" class="header-home">
        <div class="grid">
            <div class="col-1-1">
                <div class="content">
                    <div class="logo-wrap">
                        <a href="#0" class="logo">The7</a>
                    </div>
                    <nav class="navigation">
                        <input type="checkbox" id="nav-button">
                        <label for="nav-button" onclick></label>
                        <ul class="nav-container">
                            <li><a href="#home" class="current">Home</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#work">Work</a></li>
                            <li><a href="#blog">Blog</a></li>
                            <li><a href="#pricing">Pricing</a></li>

                            <li><a href="#contact">Contact</a></li>
                            <?php
                           session_start();
                            if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
                            ?>
                            <li><a href="login/logout.php">Logout</a></li>
                            <?php
                            } else {
                            ?>
                            <li><a href="login/login.php">Register</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- Parallax Section -->
    <div class="parallax-section parallax1">
        <div class="grid grid-pad">
            <div class="col-1-1">
                <div class="content content-header">
                    <h2>THE 7 Hotel</h2>
                    <p>The 5-star Hotel name is a deluxe hotel located on a landscape of dreams and relaxation, between
                        sea and forest, with a magnificient view over the Gulf of Hammamet.</p>

                </div>
            </div>
        </div>
    </div>
    <!-- End Parallax Section -->

    <!-- CurveUp -->
    <svg class="curveUpColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 100 C 20 0 50 0 100 100 Z"></path>
    </svg>

    <!-- Services Section -->
    <div class="wrap services-wrap" id="services">
        <section class="grid grid-pad services">
            <h2>Our Services</h2>
            <h3>WHAT OUR HOTEL OFFERS</h3>
            <div class="col-1-4 service-box service-1">
                <div class="content">
                    <div class="service-icon">
                        <i class="circle-icon icon-heart4"></i>
                    </div>
                    <div class="service-entry">
                        <h3>High speed Wifi</h3>
                        <p>Wi-Fi connection in all rooms.</p>

                    </div>
                </div>
            </div>
            <div class="col-1-4 service-box service-2">
                <div class="content">
                    <div class="service-icon">
                        <i class="circle-icon icon-star4"></i>
                    </div>
                    <div class="service-entry">
                        <h3>Laundry</h3>
                        <p>Ironig, dry cleaning and laundry service available for an extra charge.</p>

                    </div>
                </div>
            </div>
            <div class="col-1-4 service-box service-3">
                <div class="content">
                    <div class="service-icon">
                        <i class="circle-icon icon-display"></i>
                    </div>
                    <div class="service-entry">
                        <h3>Room Service</h3>
                        <p>Our room service is available 24 hours a day, 7 days a week.</p>

                    </div>
                </div>
            </div>
            <div class="col-1-4 service-box service-4">
                <div class="content">
                    <div class="service-icon">
                        <i class="circle-icon icon-user6"></i>
                    </div>
                    <div class="service-entry">
                        <h3>Parking and Shuttles</h3>
                        <p>Outdoor parking for up to 300 cars.</p>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End Services Section -->

    <!-- CurveDown -->
    <svg class="curveDownColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 0 C 50 100 80 100 100 0 Z"></path>
    </svg>

    <!-- Work Section -->
    <div class="wrap grey recent-wrap" id="work">
        <section class="grid grid-pad">
            <h2>AVAILABLE ROOMS</h2>
            <!-- Start of Filter section -->
            <div class="col-1-1 mix">
                <ul class="filters">
                    <li class="filter active" data-filter="all">All</li>
                    <li class="filter" data-filter=".Individuelle">Individuelle</li>
                    <li class="filter" data-filter=".Double">Double</li>
                    <li class="filter" data-filter=".Triple">A3</li>
                    <li class="filter" data-filter=".a4">A4</li>
                </ul>
            </div>
            <!-- End of Filter section -->
            <div class="portfolio-items">
                <div class="col-1-3 mix Individuelle">
                    <div class="content">
                        <div class="recent-work">
                            <img src="images/chambre/indiv1.jpg" alt="">
                            <div class="overlay">
                                <span>Individuelle</span>
                                <h2><a class="img-wrap" data-rel="lightcase:Individuelle"
                                        title="Asian tourist - Individuelle" href="images/work/1-big.jpg">Asian
                                        tourist</a></h2>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-1-3 mix Triple">
                    <div class="content">
                        <div class="recent-work">
                            <img src="images/chambre/triple1.jpg" alt="">
                            <div class="overlay">
                                <span>Triple</span>
                                <h2><a class="img-wrap" data-rel="lightcase:Triple" title="Blue flowers - Triple"
                                        href="images/work/5-big.jpg">Blue flowers</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-3 mix Individuelle">
                    <div class="content">
                        <div class="recent-work">
                            <img src="images/chambre/indiv1.jpg" alt="">
                            <div class="overlay">
                                <span>Individuelle</span>
                                <h2><a class="img-wrap" data-rel="lightcase:Individuelle"
                                        title="Batman Wannabe - Individuelle" href="images/work/2-big.jpg">Batman
                                        Wannabe</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-3 mix Triple">
                    <div class="content">
                        <div class="recent-work">
                            <img src="images/chambre/triple2.jpg" alt="">
                            <div class="overlay">
                                <span>Triple</span>
                                <h2><a class="img-wrap" data-rel="lightcase:Triple" title="Big city and dreams - Triple"
                                        href="images/work/8-big.jpg">Big city and dreams</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-3 mix Double">
                    <div class="content">
                        <div class="recent-work">
                            <img src="images/chambre/double1.jpg" alt="">
                            <div class="overlay">
                                <span>Web Design</span>
                                <h2><a class="img-wrap" data-rel="lightcase:webdesign"
                                        title="Minimal nature - Web Design" href="images/work/6-big.jpg">Minimal
                                        nature</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-3 mix Double">
                    <div class="content">
                        <div class="recent-work">
                            <img src="images/chambre/double2.jpg" alt="">
                            <div class="overlay">
                                <span>Individuelle</span>
                                <h2><a class="img-wrap" data-rel="lightcase:Individuelle"
                                        title="Jack the sailor - Individuelle" href="images/work/3-big.jpg">Jack the
                                        sailor</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-3 mix Triple">
                    <div class="content">
                        <div class="recent-work">
                            <img src="images/chambre/triple3.jpg" alt="">
                            <div class="overlay">
                                <span>Triple</span>
                                <h2><a class="img-wrap" data-rel="lightcase:Triple" title="Enjoy live - Triple"
                                        href="images/work/7-big.jpg">Enjoy live</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-3 mix a4">
                    <div class="content">
                        <div class="recent-work">
                            <img src="images/chambre/double1.jpg" alt="">
                            <div class="overlay">
                                <span>Individuelle</span>
                                <h2><a class="img-wrap" data-rel="lightcase:Individuelle" title="Run kitty run - Triple"
                                        href="images/work/4-big.jpg">Run kitty run</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-3 mix a4">
                    <div class="content">
                        <div class="recent-work">
                            <img src="images/chambre/double2.jpg" alt="">
                            <div class="overlay">
                                <span>Web Design</span>
                                <h2><a class="img-wrap" data-rel="lightcase:webdesign" title="Would you? - Web Design"
                                        href="images/work/9-big.jpg">Would you?</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </section>
    </div>
    <!-- End Work Section -->

    <!-- CurveUp -->
    <svg class="curveUpColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 100 C 20 0 50 0 100 100 Z"></path>
    </svg>

    <!-- Quotes Section -->
    <div class="wrap services-wrap">
        <section class="grid grid-pad">
            <h3>
                <center>Testimonials</center>
            </h3>
            <h2>
                <center>WHAT THEY SAY ABOUT US</center>
            </h2>
            <div class="col-1-1 service-box cl-client-carousel-container">
                <div class="content">
                    <div class="cl-client-carousel">


                        <div class="item client-carousel-item"><!-- Start of item -->
                            <div class="quotes-icon">
                                <i class="icon-quotes-left"></i>
                            </div>
                            <p>Very good reception at check-in and check-out.Breakfast from 6am: very good for those who
                                have an early plane. Count a little half an hour for the airport. Very good meal and
                                service by room service ...</p>
                            <h4>-David Bell</h4>
                        </div><!-- End of item -->

                        <div class="item client-carousel-item"><!-- Start of item -->
                            <div class="quotes-icon">
                                <i class="icon-quotes-left"></i>
                            </div>
                            <p>TA very good hotel to advise with a superb staff! A customer service that is excellent
                                and I highly recommend it! Plus a great view and a perfect location! Thank you and see
                                you soon !</p>
                            <h4>-Eve Stinger</h4>
                        </div><!-- End of item -->


                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- End Quotes Section -->

    <!-- CurveDown -->
    <svg class="curveDownColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 0 C 50 100 80 100 100 0 Z"></path>
    </svg>

    <!-- Blog Section -->
    <div class="wrap blog-grid grey" id="blog">
        <div class="grid grid-pad">
            <div class="content">
                <h2>Our Blog</h2>



                <div class="col-1-2">
                    <article class="post-wrap">
                        <div class="post-img">
                            <a href="#0"><img src="images/chambre/spa.jpg" alt=""></a>
                        </div>
                        <div class="post">
                            <h2 class="entry-title"><a href="#0">HEALTH CLUB & SPA</a></h2>
                            <div class="post-meta">

                            </div>
                            <p>The health club & spa invites you to find a vital interior energy and calm. As soon as
                                you enter, the pleasant aroma will charm you and help you to spend a moment of pure
                                enchantment.
                            </p>

                        </div>
                    </article>
                </div>
                <div class="col-1-2">
                    <article class="post-wrap">
                        <div class="post-img">
                            <a href="#0"><img src="images/chambre/gym.jpg" alt=""></a>
                        </div>
                        <div class="post">
                            <h2 class="entry-title"><a href="#0">SPORTS FACILITIES</a></h2>
                            <div class="post-meta">

                            </div>
                            <p>Train in a privileged, easy-to-reach location, with high-quality, modern sports
                                facilities just a short walk away and available to Hotel Samos guests thanks to our
                                partnership with Calvià Council.
                            </p>

                        </div>
                    </article>
                </div>
                <div class="col-1-2">
                    <article class="post-wrap">
                        <div class="post-img">
                            <a href="#0"><img src="images/chambre/fun.jpg" alt=""></a>
                        </div>
                        <div class="post">
                            <h2 class="entry-title"><a href="#0">ENTERTAINMENT</a></h2>
                            <div class="post-meta">

                            </div>
                            <p>Let us entertain you with our daytime and evening programmes packed with fun group
                                activities and water games, plus professional acts such as live bands, acrobats,
                                dancers, DJs, light artists and fire jugglers.
                            </p>

                        </div>
                    </article>
                </div>
                <div class="col-1-2">
                    <article class="post-wrap">
                        <div class="post-img">
                            <a href="#0"><img src="images/chambre/resto.jpg" alt=""></a>
                        </div>
                        <div class="post">
                            <h2 class="entry-title"><a href="#0">RESTAURANT AND BARS </a></h2>
                            <div class="post-meta">

                            </div>
                            <p>Discover a wide range of delicious, freshly prepared dishes at every meal in our stylish,
                                light and airy buffet restaurant with show cooking, or enjoy a refreshing drink at one
                                of our three modern indoor or outdoor bars.
                            </p>

                        </div>
                    </article>
                </div>

            </div>
        </div>
    </div>
    <!-- End Blog Section -->

    <!-- CurveUp -->
    <svg class="curveUpColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 100 C 20 0 50 0 100 100 Z"></path>
    </svg>

    <!-- Pricing Section -->
    <div class="wrap" id="pricing">
        <div class="grid grid-pad">
            <div class="content">
                <div class="col-1-1">
                    <section id="price-tables">
                        <h2>Pensions</h2>
                        <ul id="plans">
                            <li class="plan">
                                <ul class="plan-wrap">
                                    <li class="title">
                                        <h2>Complete</h2>
                                    </li>
                                    <li class="price">
                                        <p>$150 per day</p>
                                    </li>


                                </ul>
                            </li>
                            <li class="plan">
                                <ul class="plan-wrap">
                                    <li class="title">
                                        <h2>Half pension</h2>
                                    </li>
                                    <li class="price">
                                        <p>$100 per day</p>
                                    </li>


                                </ul>
                            </li>
                            <li class="plan">
                                <ul class="plan-wrap">
                                    <li class="title">
                                        <h2>Bed & Breakfast</h2>
                                    </li>
                                    <li class="price">
                                        <p>$80 per day</p>
                                    </li>


                                </ul>
                            </li>
                            <li class="plan">
                                <ul class="plan-wrap">
                                    <li class="title">
                                        <h2>Bed only</h2>
                                    </li>
                                    <li class="price">
                                        <p>$50 per day</p>
                                    </li>


                                </ul>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing Section -->

    <!-- CurveDown -->
    <svg class="curveDownColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 0 C 50 100 80 100 100 0 Z"></path>
    </svg>

    <!-- Parallax Section - Counter -->
    <div class="parallax-section parallax2">
        <div class="wrap">
            <section class="grid grid-pad callout">
                <div class="col-1-3">
                    <div class="content">
                        <div class="info-counter">
                            <div class="info-counter-row">
                                <i class="info-counter-icon icon-mug"></i>
                            </div>
                            <div class="info-counter-content">
                                <h5 class="info-counter-number">
                                    <span class="counter">+900</span>
                                    <span class="info-counter-units">Rooms</span>
                                </h5>
                                <div class="info-counter-text">More than 900 hotel rooms</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-3">
                    <div class="content">
                        <div class="info-counter">
                            <div class="info-counter-row">
                                <i class="info-counter-icon icon-embed"></i>
                            </div>
                            <div class="info-counter-content">
                                <h5 class="info-counter-number">
                                    <span class="counter">7</span>
                                    <span class="info-counter-units">Lines</span>
                                </h5>
                                <div class="info-counter-text">Average weekly lines of code</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-1-3">
                    <div class="content">
                        <div class="info-counter">
                            <div class="info-counter-row">
                                <i class="info-counter-icon icon-trophy"></i>
                            </div>
                            <div class="info-counter-content">
                                <h5 class="info-counter-number">
                                    <span class="counter">400</span>
                                    <span class="info-counter-units">Clients</span>
                                </h5>
                                <div class="info-counter-text">Average yearly happy clients</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- End Parallax Section -->

    <!-- CurveUp -->
    <svg class="curveUpColor curveGrey" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 100 C 20 0 50 0 100 100 Z"></path>
    </svg>



    <!-- CurveUp -->
    <svg class="curveUpColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 100 C 20 0 50 0 100 100 Z"></path>
    </svg>

    <!-- Clients Logos Section -->
    <div class="wrap">
        <div class="grid grid-pad">
            <div class="col-1-1">
                <div class="content">
                    <!-- Start of Carousel Container -->
                    <div class="cl-logo-carousel col-sm-12">

                        <div class="item"><!-- Start of item -->
                            <a href="#">
                                <figure>
                                    <img src="images/clients/1.png" alt="" />
                                </figure>
                            </a>
                        </div><!-- End of item -->

                        <div class="item"><!-- Start of item -->
                            <a href="#">
                                <figure>
                                    <img src="images/clients/2.png" alt="" />
                                </figure>
                            </a>
                        </div><!-- End of item -->

                        <div class="item"><!-- Start of item -->
                            <a href="#">
                                <figure>
                                    <img src="images/clients/3.png" alt="" />
                                </figure>
                            </a>
                        </div><!-- End of item -->

                        <div class="item"><!-- Start of item -->
                            <a href="#">
                                <figure>
                                    <img src="images/clients/4.png" alt="" />
                                </figure>
                            </a>
                        </div><!-- End of item -->

                        <div class="item"><!-- Start of item -->
                            <a href="#">
                                <figure>
                                    <img src="images/clients/5.png" alt="" />
                                </figure>
                            </a>
                        </div><!-- End of item -->

                        <div class="item"><!-- Start of item -->
                            <a href="#">
                                <figure>
                                    <img src="images/clients/1.png" alt="" />
                                </figure>
                            </a>
                        </div><!-- End of item -->

                        <div class="item"><!-- Start of item -->
                            <a href="#">
                                <figure>
                                    <img src="images/clients/2.png" alt="" />
                                </figure>
                            </a>
                        </div><!-- End of item -->

                        <div class="item"><!-- Start of item -->
                            <a href="#">
                                <figure>
                                    <img src="images/clients/3.png" alt="" />
                                </figure>
                            </a>
                        </div><!-- End of item -->

                    </div>
                    <!-- End of Carousel Container -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Clients Logos Section -->

    <!-- CurveDown -->
    <svg class="curveDownColor curveMapUp" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 0 C 50 100 80 100 100 0 Z"></path>
    </svg>

    <!-- Parallax Section -->
    <div class="map">
        <div class="wrap">
            <section id="cd-google-map">
                <div id="google-container"></div>
                <div id="cd-zoom-in"></div>
                <div id="cd-zoom-out"></div>
            </section>
        </div>
    </div>
    <!-- End Parallax Section -->

    <!-- CurveUp -->
    <svg class="curveUpColor curveMapDown" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 100 C 20 0 50 0 100 100 Z"></path>
    </svg>

    <!-- Contact Section -->
    <div class="wrap contact" id="contact">
        <div class="grid grid-pad">
            <h2>Contact</h2>
            <div class="col-1-2">
                <div class="content address">
                    <h3>Talk to us</h3>
                    <p>
                        Thank you for considering our hotel for your upcoming stay.
                        We value your interest and would be delighted to answer any questions or assist you with making
                        a reservation.
                        Our knowledgeable staff is available to provide personalized recommendations, address any
                        concerns, and ensure that your experience at our hotel is nothing short of exceptional.
                        We look forward to hearing from you and having the opportunity to create a memorable stay for
                        you.</p>
                    <address>
                        <div>
                            <div class="box-icon">
                                <i class="icon-location"></i>
                            </div>
                            <span>Address:</span>
                            <p>9983 City name, Street name, 232 Apartment C</p>
                        </div>

                        <div>
                            <div class="box-icon">
                                <i class="icon-clock"></i>
                            </div>
                            <span>Work Time:</span>
                            <p>Monday - Friday from 9am to 5pm</p>
                        </div>

                        <div>
                            <div class="box-icon">
                                <i class="icon-phone"></i>
                            </div>
                            <span>Phone:</span>
                            <p>595 12 34 567</p>
                        </div>
                    </address>
                </div>
            </div>
            <div class="col-1-2 pleft-25">
                <div class="content contact-form">
                    <form class="form">
                        <input type="text" class="comment-name" placeholder="Name*" required>
                        <input type="email" class="comment-email" placeholder="Email*" required>
                        <input type="text" class="comment-subject" placeholder="Subject">
                        <textarea class="required comment-text" placeholder="Message..." required></textarea>
                        <input type="submit" value="Send Message" class="btn submit comment-submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Section -->

    <!-- CurveDown -->
    <svg class="curveDownColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0 0 C 50 100 80 100 100 0 Z"></path>
    </svg>

    <!-- Footer -->
    <footer class="wrap">
        <div class="grid grid-pad">
            <div class="col-1-4">
                <div class="content">
                    <div class="footer-widget">
                        <h3>About</h3>
                        <div class="textwidget">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore.</p><br>
                            <p>Et dolore magna aliquyam erat sed diam voluptua.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1-4">
                <div class="content">
                    <div class="footer-widget">
                        <h3>Recent Posts</h3>
                        <div class="fwidget">
                            <ul>
                                <li><a href="#0">Suspendisse nec lectus non</a></li>
                                <li><a href="#0">Phasellus euismod pulvinar</a></li>
                                <li><a href="#0">Aliquam erat volutpat</a></li>
                                <li><a href="#0">Phasellus euismod pulvinar</a></li>
                                <li><a href="#0">Aliquam erat volutpat</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1-4">
                <div class="content">
                    <div class="footer-widget">
                        <h3>More info</h3>
                        <div class="textwidget">
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore.</p>
                            <br>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1-4">
                <div class="content">
                    <div class="footer-widget">
                        <h3>Flickr Feed</h3>
                        <div class="flickr-widget">
                            <ul class="flickr-list">
                                <li><a href="#0"><img src="images/flickr-widget/flickr1.jpg" alt=""></a></li>
                                <li><a href="#0"><img src="images/flickr-widget/flickr2.jpg" alt=""></a></li>
                                <li><a href="#0"><img src="images/flickr-widget/flickr3.jpg" alt=""></a></li>
                                <li><a href="#0"><img src="images/flickr-widget/flickr4.jpg" alt=""></a></li>
                                <li><a href="#0"><img src="images/flickr-widget/flickr5.jpg" alt=""></a></li>
                                <li><a href="#0"><img src="images/flickr-widget/flickr6.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-footer">
            <div class="grid grid-pad">
                <div class="col-1-1">
                    <div class="content">
                        <div class="social-set">
                            <a href="#0"><i class="icon-facebook"></i></a>
                            <a href="#0"><i class="icon-twitter"></i></a>
                            <a href="#0"><i class="icon-linkedin2"></i></a>
                            <a href="#0"><i class="icon-dribbble4"></i></a>
                            <a href="#0"><i class="icon-instagram"></i></a>
                        </div>
                        <p class="source-org copyright">© 2016 | All Rights Reserved Created By <a
                                href="http://templatestock.co">Template Stock</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div class="loader-overlay">
        <div class="loader">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>

    <!-- JS -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <script src="js/mixitup.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/owl-carousel/owl.carousel.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/lightcase.min.js"></script>
</body>

</html>