<!doctype html>
<html lang="en-US">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pixel Photography</title>
    <meta name="description" content="Pixel Phtography">
    <meta name="keywords" content="HTML5, Bootsrtrap, One Page, Responsive, Template, Portfolio" />
    <meta name="author" content="imransdesign.com">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    <!-- Body font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <!-- Navbar font -->

    <!-- Libs and Plugins CSS -->
    <link rel="stylesheet" href="inc/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="inc/animations/css/animate.min.css">
    <link rel="stylesheet" href="inc/font-awesome/css/font-awesome.min.css"> <!-- Font Icons -->
    <link rel="stylesheet" href="inc/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="inc/owl-carousel/css/owl.theme.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="css/skin/cool-gray.css">
    <!-- <link rel="stylesheet" href="css/skin/ice-blue.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/summer-orange.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/fresh-lime.css"> -->
    <!-- <link rel="stylesheet" href="css/skin/night-purple.css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
<style>
    /* Add some basic styling */
.page-header-wrapper {
    padding: 50px 0;
}

.page-header {
    margin-bottom: 40px;
}

.devider {
    height: 3px;
    width: 50px;
    background: #333;
    margin: 20px auto;
}

.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
}

.gallery img {
    max-width: 100%;
    height: auto;
    display: block;
}

.gallery .image-container {
    flex: 1 1 calc(25% - 10px); /* Four images per row */
    box-sizing: border-box;
}

.image-container {
    margin: 10px;
    text-align: center;
}

.gallery .btn {
    margin: 5px;
}

.gallery .btn.active {
    background-color: #333;
    color: #fff;
}

.gallery .btn {
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

.gallery .btn:hover {
    background-color: #555;
    color: #fff;
}

</style>

<body data-spy="scroll" data-target="#main-navbar">
    <div class="page-loader"></div> <!-- Display loading image while page loads -->
    <div class="body">

        <!--========== BEGIN HEADER ==========-->
        <header id="header" class="header-main">

            <!-- Begin Navbar -->
            <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
                <!-- Classes: navbar-default, navbar-inverse, navbar-fixed-top, navbar-fixed-bottom, navbar-transparent. Note: If you use non-transparent navbar, set "height: 98px;" to #header -->

                <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand page-scroll" href="index.html">Pixel Photography</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="page-scroll" href="body">Home</a></li>
                            <li><a class="page-scroll" href="#about-section">About</a></li>
                            <li><a class="page-scroll" href="#services-section">Services</a></li>
                            <li><a class="page-scroll" href="#portfolio-section">Gallery</a></li>
                            <li><a class="page-scroll" href="#team-section">Team</a></li>
                            <li><a class="page-scroll" href="#contact-section">Contact</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
            <!-- End Navbar -->

        </header>
        <!-- ========= END HEADER =========-->




        <!-- Begin text carousel intro section -->
        <section id="text-carousel-intro-section" class="parallax" data-stellar-background-ratio="0.5"
            style="background-image: url(img/slider-bg.jpg);">

            <div class="container">
                <div class="caption text-center text-white" data-stellar-ratio="0.7">

                    <div id="owl-intro-text" class="owl-carousel">
                        <div class="item">
                            <h1>Pixel Photography</h1>
                            <?php
                            include 'connection.php';

                            $query = "SELECT Description FROM home";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $description = $row['Description'];
                            } else {
                                $description = "Default description"; // Provide a default if no description is found
                            }

                            mysqli_close($conn);
                            ?>
                            <p data-animation="bounceInUp" data-delay="500ms">
                                <?php echo htmlspecialchars($description); ?></p>
                            <div class="extra-space-l"></div>
                            <a class="btn btn-blank page-scroll" href="#contact-section" role="button">Contact Us</a>
                        </div>
                        <div class="item">
                            <h1>Capture your best pictures</h1>
                            <p>Because every picture tells a story</p>
                            <div class="extra-space-l"></div>
                            <a class="btn btn-blank page-scroll" href="#contact-section" role="button">Contact Us</a>
                        </div>
                        <div class="item">
                            <h1>Join with us</h1>
                            <p>To the greatest Journey</p>
                            <div class="extra-space-l"></div>
                            <a class="btn btn-blank page-scroll" href="#contact-section" role="button">Contact Us</a>
                        </div>
                    </div>

                </div> <!-- /.caption -->
            </div> <!-- /.container -->

        </section>
        <!-- End text carousel intro section -->




        <!-- Begin about section -->
        <section id="about-section" class="page bg-style1">
            <!-- Begin page header-->
            <div class="page-header-wrapper">
                <div class="container">
                    <div class="page-header text-center wow fadeInUp" data-wow-delay="0.3s">
                        <h2>About</h2>
                        <div class="devider"></div>
                        <p class="subtitle">Know more about us</p>
                    </div>
                </div>
            </div>
            <!-- End page header-->

            <!-- Begin rotate box-1 -->
            <div class="rotate-box-1-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="rotate-box-1 square-icon wow zoomIn" data-wow-delay="0">
                                <span class="rotate-box-icon"><i class="fa fa-users"></i></span>
                                <div class="rotate-box-info">
                                    <h4>Who We Are?</h4>
                                    <p>We are Nepal’s leading photography agency. Our brands provide professional
                                        photography solutions for almost every business and individual looking to boost
                                        their online presence.</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="rotate-box-1 square-icon wow zoomIn" data-wow-delay="0.2s">
                                <span class="rotate-box-icon"><i class="fa fa-diamond"></i></span>
                                <div class="rotate-box-info">
                                    <h4>What We Do?</h4>
                                    <p>We specialise in photoshoots for Nature, Wedding, Product,and Portrait.</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="rotate-box-1 square-icon wow zoomIn" data-wow-delay="0.4s">
                                <span class="rotate-box-icon"><i class="fa fa-heart"></i></span>
                                <div class="rotate-box-info">
                                    <h4>Why We Do It?</h4>
                                    <p>We want to convey emotions through photography. A well-composed photograph can
                                        evoke a wide range of emotions, from joy and happiness to sadness and grief.</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="rotate-box-1 square-icon wow zoomIn" data-wow-delay="0.6s">
                                <span class="rotate-box-icon"><i class="fa fa-clock-o"></i></span>
                                <div class="rotate-box-info">
                                    <h4>Since When?</h4>
                                    <p>We have been doing our projects since 2016.</p>
                                </div>
                            </a>
                        </div>

                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div>
            <!-- End rotate box-1 -->

            <div class="extra-space-l"></div>

            <!-- Begin page header-->
            <div class="page-header-wrapper">
                <div class="container">
                    <div class="page-header text-center wow fadeInUp" data-wow-delay="0.3s">
                        <h4>Our Skills</h4>
                    </div>
                </div>
            </div>
            <!-- End page header-->

            <!-- Begin Our Skills -->
            <div class="our-skills">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="skill-bar wow slideInLeft" data-wow-delay="0.2s">
                                <div class="progress-lebel">
                                    <h6>Photoshop & Illustrator</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 95%;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="skill-bar wow slideInRight" data-wow-delay="0.2s">
                                <div class="progress-lebel">
                                    <h6>Da Vinci</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 85%;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="skill-bar wow slideInLeft" data-wow-delay="0.4s">
                                <div class="progress-lebel">
                                    <h6>Final Cut pro</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 80%;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="skill-bar wow slideInRight" data-wow-delay="0.4s">
                                <div class="progress-lebel">
                                    <h6>Photography & Videography</h6>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                        aria-valuemax="100" style="width: 90%;">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div>
            <!-- End Our Skill -->
        </section>
        <!-- End about section -->

        <!-- Begin Services -->
        <section id="services-section" class="page text-center">
            <!-- Begin page header-->
            <div class="page-header-wrapper">
                <div class="container">
                    <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                        <h2>Services</h2>
                        <div class="devider"></div>
                        <p class="subtitle">what we really know </p>
                    </div>
                </div>
            </div>
            <!-- End page header-->

            <!-- Begin roatet box-2 -->
            <div class="rotate-box-2-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="rotate-box-2 square-icon text-center wow zoomIn" data-wow-delay="0">
                                <span class="rotate-box-icon"><i class="fa fa-camera"></i></span>
                                <div class="rotate-box-info">
                                    <h4>Photography</h4>
                                    <p>Professional Photography with mesmarizing photographs</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="rotate-box-2 square-icon text-center wow zoomIn" data-wow-delay="0.2s">
                                <span class="rotate-box-icon"><i class="fa fa-video-camera"></i></span>
                                <div class="rotate-box-info">
                                    <h4>Videography</h4>
                                    <p>High Quality Video capturing along with aerial videography with drones</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="rotate-box-2 square-icon text-center wow zoomIn" data-wow-delay="0.4s">
                                <span class="rotate-box-icon"><i class="fa fa-cubes"></i></span>
                                <div class="rotate-box-info">
                                    <h4>Graphic Designing</h4>
                                    <p>24/7 support of high skilled graphic designers</p>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="rotate-box-2 square-icon text-center wow zoomIn" data-wow-delay="0.6s">
                                <span class="rotate-box-icon"><i class="fa fa-pencil"></i></span>
                                <div class="rotate-box-info">
                                    <h4>Editing</h4>
                                    <p>24/7 support with easy customization of videos as well as photos.</p>
                                </div>
                            </a>
                        </div>

                    </div> <!-- /.row -->
                </div> <!-- /.container -->

                <div class="container">
                    <!-- Cta Button -->
                    <div class="extra-space-l"></div>
                    <div class="text-center">
                        <a class="btn btn-default btn-lg-xl page-scroll" href="#contact-section" role="button">Contact
                            Us</a>
                    </div>
                </div> <!-- /.container -->
            </div>
            <!-- End rotate-box-2 -->
        </section>
        <!-- End Services -->




        <!-- Begin testimonials -->
        <section id="testimonial-section">
            <div id="testimonial-trigger" class="testimonial text-white parallax" data-stellar-background-ratio="0.5"
                style="background-image: url(img/testimonial-bg.jpg);">
                <div class="cover"></div>
                <!-- Begin page header-->
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>Reviews</h2>
                            <div class="devider"></div>
                            <p class="subtitle">What people say about us</p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->
                <div class="container">
                    <div class="testimonial-inner center-block text-center">
                        <div id="owl-testimonial" class="owl-carousel">
                            <div class="item">
                                <blockquote>
                                    <p>"This was my first experience with that team and outperformed my expectation!
                                        They know there stuff and I highly recommend them! A+++".</p>
                                    <footer><cite title="Source Title">Pawan Thapa</cite></footer>
                                </blockquote>
                            </div>
                            <div class="item">
                                <blockquote>
                                    <p>"Thanks so much for your work - we love them!
                                        You’ve captured some wonderful moments for us and really appreciate everything"
                                    </p>
                                    <footer><cite title="Source Title">Anup Bhattarai</cite></footer>
                                </blockquote>
                            </div>
                            <div class="item">
                                <blockquote>
                                    <p>"We had the best time shooting some special moments with you!

                                        Can’t wait to work with yourself and team pixel in the future ".</p>
                                    <footer><cite title="Source Title">Praveen Kandel </cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End testimonials -->




 <!-- Begin Portfolio -->
 <section id="portfolio-section" class="page bg-style1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portfolio">
                    <!-- Begin page header-->
                    <div class="page-header-wrapper">
                        <div class="container">
                            <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                                <h2>Gallery</h2>
                                <div class="devider"></div>
                                <?php
                                    include 'connection.php';

                                    // Get the selected category from the form, default to 'All'
                                    $category = isset($_GET['category']) ? $_GET['category'] : 'All';

                                    // Modify the query based on the selected category
                                    if ($category === 'All') {
                                        $query = "SELECT img_name, category FROM image";
                                    } else {
                                        $query = "SELECT img_name, category FROM image WHERE category = ?";
                                    }

                                    // Prepare the statement
                                    if ($stmt = mysqli_prepare($conn, $query)) {
                                        if ($category !== 'All') {
                                            mysqli_stmt_bind_param($stmt, "s", $category);
                                        }
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);

                                        echo '<div class="gallery">';
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<div class="image-container">'; // Centered and with margin for spacing
                                                echo '<img src="images/' . htmlspecialchars($row['img_name']) . '" alt="Image">'; // No width or height, original size
                                                echo '</div>';
                                            }
                                        } else {
                                            echo '<p>No images found in the database.</p>';
                                        }
                                        echo '</div>';
                                    } else {
                                        echo '<p>Database query failed: ' . mysqli_error($conn) . '</p>';
                                    }

                                    // Close the statement and connection
                                    mysqli_stmt_close($stmt);
                                    mysqli_close($conn);
                                ?>
                                <p class="subtitle">Some of our latest works</p>
                                <div class="gallery">
                                    <div class="lx-projects-menu wow fadeInUp" data-wow-delay="100ms">
                                        <form method="GET" style="text-align: center;">
                                            <button type="submit" name="category" value="All" class="btn <?php echo ($category == 'All') ? 'active' : ''; ?>">All</button>
                                            <button type="submit" name="category" value="Portrait" class="btn <?php echo ($category == 'Portrait') ? 'active' : ''; ?>">Portrait</button>
                                            <button type="submit" name="category" value="Nature" class="btn <?php echo ($category == 'Nature') ? 'active' : ''; ?>">Nature</button>
                                            <button type="submit" name="category" value="Product" class="btn <?php echo ($category == 'Product') ? 'active' : ''; ?>">Product</button>
                                            <button type="submit" name="category" value="Wedding" class="btn <?php echo ($category == 'Wedding') ? 'active' : ''; ?>">Wedding</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- End page header-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- End portfolio -->



        <!-- Begin counter up -->
        <section id="counter-section">
            <div id="counter-up-trigger" class="counter-up text-white parallax" data-stellar-background-ratio="0.5"
                style="background-image: url(img/counter-bg.jpg);">
                <div class="cover"></div>
                <!-- Begin page header-->
                <div class="page-header-wrapper">
                    <div class="container">
                        <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                            <h2>Some Fun Facts</h2>
                            <div class="devider"></div>
                            <p class="subtitle">Before anyone is not told</p>
                        </div>
                    </div>
                </div>
                <!-- End page header-->
                <div class="container">

                    <div class="row">

                        <div class="fact text-center col-md-3 col-sm-6">
                            <div class="fact-inner">
                                <i class="fa fa-users fa-3x"></i>
                                <div class="extra-space-l"></div>
                                <span class="counter">643</span>
                                <p class="lead">Clients Worked With</p>
                            </div>
                        </div>

                        <div class="fact text-center col-md-3 col-sm-6">
                            <div class="fact-inner">
                                <i class="fa fa-leaf fa-3x"></i>
                                <div class="extra-space-l"></div>
                                <span class="counter">600</span>
                                <p class="lead">Completed Projects</p>
                            </div>
                        </div>

                        <div class="fact text-center col-md-3 col-sm-6">
                            <div class="fact-inner">
                                <i class="fa fa-trophy fa-3x"></i>
                                <div class="extra-space-l"></div>
                                <span class="counter">176</span>
                                <p class="lead">5 star reviews</p>
                            </div>
                        </div>

                        <div class="fact last text-center col-md-3 col-sm-6">
                            <div class="fact-inner">
                                <i class="fa fa-coffee fa-3x"></i>
                                <div class="extra-space-l"></div>
                                <span class="counter">1100</span>
                                <p class="lead">Cups of coffee drinking</p>
                            </div>
                        </div>

                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div>
        </section>
        <!-- End counter up -->




        <!-- Begin team-->
        <section id="team-section" class="page">
            <!-- Begin page header-->
            <div class="page-header-wrapper">
                <div class="container">
                    <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                        <h2>Our Team</h2>
                        <div class="devider"></div>
                        <p class="subtitle">Meet our experts</p>
                    </div>
                </div>
            </div>
            <!-- End page header-->
            <div class="container">
                <div class="row">
                    <div class="team-items">
                        <div class="col-md-2">
                            <div class="team-container wow bounceIn" data-wow-delay="0.2s">
                                <div class="team-item">
                                    <div class="team-triangle">
                                        <div class="content">
                                            <img src="img/team/q555.jpg" alt="title" />
                                            <div class="team-hover text-center">
                                                <i class="fa fa-male"></i>
                                                <p>Sohan K.C</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="team-container wow bounceIn" data-wow-delay="0.3s">
                                <div class="team-item">
                                    <div class="team-triangle">
                                        <div class="content">
                                            <img src="img/team/q3.jpg" alt="title" />
                                            <div class="team-hover text-center">
                                                <i class="fa fa-male"></i>
                                                <p>Arpan Bhattarai</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="team-container wow bounceIn" data-wow-delay="0.4s">
                                <div class="team-item">
                                    <div class="team-triangle">
                                        <div class="content">
                                            <img src="img/team/q22.jpg" alt="title" />
                                            <div class="team-hover text-center">
                                                <i class="fa fa-male"></i>
                                                <p>Ritesh Gyawali</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="team-container wow bounceIn" data-wow-delay="0.5s">
                                <div class="team-item">
                                    <div class="team-triangle">
                                        <div class="content">
                                            <img src="img/team/q4.jpg" alt="title" />
                                            <div class="team-hover text-center">
                                                <i class="fa fa-male"></i>
                                                <p>Sijan Shrestha</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="team-container wow bounceIn" data-wow-delay="0.6s">
                                <div class="team-item">
                                    <div class="team-triangle">
                                        <div class="content">
                                            <img src="img/team/q77.jpg" alt="title" />
                                            <div class="team-hover text-center">
                                                <i class="fa fa-female"></i>
                                                <p>Pratistha Aryal</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="team-container wow bounceIn" data-wow-delay="0.7s">
                                <div class="team-item">
                                    <div class="team-triangle">
                                        <div class="content">
                                            <img src="img/team/q11.jpg" alt="title" />
                                            <div class="team-hover text-center">
                                                <i class="fa fa-male"></i>
                                                <p>Bhanu Chaudhary</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="team-container wow bounceIn" data-wow-delay="0.8s">
                                <div class="team-item">
                                    <div class="team-triangle">
                                        <div class="content">
                                            <img src="img/team/q66.jpg" alt="title" />
                                            <div class="team-hover text-center">
                                                <i class="fa fa-male"></i>
                                                <p>Ngo Singh Rana</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </section>
        <!-- End team-->








        <!-- Begin social section -->
        <section id="social-section">

            <!-- Begin page header-->
            <div class="page-header-wrapper">
                <div class="container">
                    <div class="page-header text-center wow fadeInDown" data-wow-delay="0.4s">
                        <h2>Join Us</h2>
                        <div class="devider"></div>
                        <p class="subtitle">Follow us on social networks</p>
                    </div>
                </div>
            </div>
            <!-- End page header-->

            <div class="container">
                <ul class="social-list">
                    <li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.3s"><span
                                class="rotate-box-icon"><i class="fa fa-facebook"></i></span></a></li>
                    <li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.4s"><span
                                class="rotate-box-icon"><i class="fa fa-twitter"></i></span></a></li>
                    <li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.5s"><span
                                class="rotate-box-icon"><i class="fa fa-google-plus"></i></span></a></li>
                    <li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.6s"><span
                                class="rotate-box-icon"><i class="fa fa-pinterest-p"></i></span></a></li>
                    <li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.7s"><span
                                class="rotate-box-icon"><i class="fa fa-tumblr"></i></span></a></li>
                    <li> <a href="#" class="rotate-box-1 square-icon text-center wow zoomIn" data-wow-delay="0.8s"><span
                                class="rotate-box-icon"><i class="fa fa-dribbble"></i></span></a></li>
                </ul>
            </div>

        </section>
        <!-- End social section -->




        <!-- contact section -->
        <section id="contact" class="py-7">
            <div class="container">
                <div class="contact-content flex">
                    <div class="contact-left">
                        <div class="title">
                            <h2>Contact Us</h2>
                        </div>
                        <div class="contact wow bounceInRight" data-wow-delay="0.4s">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="contact-info">
                                            <h4>Our Address</h4>
                                            <ul class="contact-address">
                                                <li><i class="fa fa-map-marker fa-lg"></i>&nbsp; Tilottama-07,
                                                    Bhalwari,<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    Rupandehi,
                                                    Lumbini,<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nepal
                                                </li>
                                                <li><i class="fa fa-phone"></i>&nbsp; 9800769650</li>
                                                <li><i class="fa fa-envelope"></i> pixel_photography@gmail.com</li>
                                                <li><i class="fa fa-skype"></i> Pixel-Photography</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="contact-form">
                                            <h4>Write to us</h4>
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                                                method="POST">
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-lg" name="first_name"
                                                        placeholder="First Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control input-lg" name="last_name"
                                                        placeholder="Last Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control input-lg" name="email"
                                                        placeholder="Email" required>
                                                </div>
                                                <input type="submit" class="btn-submit btn" value="Submit">
                                            </form>
                                            <?php
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                include 'connection.php';
                                                $first_name = $_POST['first_name'];
                                                $last_name = $_POST['last_name'];
                                                $email = $_POST['email'];

                                                // Check if any field is empty
                                                if (empty($first_name) || empty($last_name) || empty($email)) {
                                                    echo "Error: All fields are required.";
                                                } else {
                                                    $query = "INSERT INTO contact (First_name, Last_name, Email) VALUES (?, ?, ?)";
                                                    $stmt = mysqli_prepare($conn, $query);
                                                    mysqli_stmt_bind_param($stmt, "sss", $first_name, $last_name, $email);
                                                    mysqli_stmt_execute($stmt);

                                                    if (mysqli_stmt_affected_rows($stmt) > 0) {
                                                        echo "Thank you for contacting us.";
                                                    } else {
                                                        echo "Error: " . mysqli_error($conn);
                                                    }
                                                }

                                                // Close connection
                                                mysqli_close($conn);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of contact section -->




        <!-- Begin footer -->
        <footer class="text-off-white">

            <div class="footer-top">
                <div class="container">
                    <div class="row wow bounceInLeft" data-wow-delay="0.4s">

                        <div class="col-sm-6 col-md-4">
                            <h4>Useful Links</h4>
                            <ul class="imp-links">
                                <li><a href="">About</a></li>
                                <li><a href="">Services</a></li>
                                <li><a href="">Works</a></li>
                            </ul>
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div>

            <div class="footer">
                <div class="container text-center wow fadeIn" data-wow-delay="0.4s">
                    <p class="copyright">Copyright &copy; 2024 - Designed By <a href="" class="theme-author">Manik
                            Thapa</a> &amp; Developed by <a href="" class="theme-author">Pixel Photohraphy</a></p>
                </div>
            </div>

        </footer>
        <!-- End footer -->

        <a href="#" class="scrolltotop"><i class="fa fa-arrow-up"></i></a> <!-- Scroll to top button -->

    </div><!-- body ends -->




    <!-- Plugins JS -->
    <script src="inc/jquery/jquery-1.11.1.min.js"></script>
    <script src="inc/bootstrap/js/bootstrap.min.js"></script>
    <script src="inc/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="inc/stellar/js/jquery.stellar.min.js"></script>
    <script src="inc/animations/js/wow.min.js"></script>
    <script src="inc/waypoints.min.js"></script>
    <script src="inc/isotope.pkgd.min.js"></script>
    <script src="inc/classie.js"></script>
    <script src="inc/jquery.easing.min.js"></script>
    <script src="inc/jquery.counterup.min.js"></script>
    <script src="inc/smoothscroll.js"></script>

    <!-- Theme JS -->
    <script src="js/theme.js"></script>

</body>


</html>
