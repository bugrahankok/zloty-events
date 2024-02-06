<?php
    require_once __DIR__ . '/../core/database.php';
?>

<!DOCTYPE html>
<html class="no-js" lang="en_US">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?=setting('site_title')?></title>
    <meta name="description" content="<?=setting('site_description')?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Toolbar Start -->
        <div class="toolbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="toolbar-social">
                            <ul>
                                <li><span class="title">Follow Us On : </span></li>
                                <li><a href="<?=setting('site_facebook')?>"><i class="lni lni-facebook-original"></i></a></li>
                                <li><a href="<?=setting('site_twitter')?>"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="<?=setting('site_instagram')?>"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="<?=setting('site_linkedin')?>"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="<?=setting('site_google')?>"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <?php if (!isUserLoggedIn()): ?>
                            <div class="toolbar-login">
                                <div class="button">
                                    <a href="signup.php">Create an Account</a>
                                    <a href="login.php" class="btn">Log In</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="dropdown float-end">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="profileMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?=$user_details->full_name?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="profileMenu">
                                    <?php if (isAdmin()): ?>
                                        <li><a class="dropdown-item" href="admin-dashboard.php" class="btn">Admin Dashboard</a></li>
                                    <?php endif; ?>
                                    <li><a class="dropdown-item" href="create-event.php" class="btn">New Event</a></li>
                                    <li><a class="dropdown-item" href="my-events.php" class="btn">My Events</a></li>
                                    <li><a class="dropdown-item" href="profile.php" class="btn">My Profile</a></li>
                                    <li><a class="dropdown-item" href="logout.php" class="btn">Logout</a></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Toolbar End -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                <div class="nav-inner">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/images/logo/logo.svg" alt="Logo">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="active" href="index.php">Home</a></li>
                                <li class="nav-item"><a href="events.php">Events</a></li>
                                <li class="nav-item"><a href="contact.php">Contact</a></li>
                            </ul>
                            <form class="d-flex search-form" method="get" action="events.php">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q" value="<?php echo @$_GET['q']; ?>">
                                <button class="btn btn-outline-success" type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->