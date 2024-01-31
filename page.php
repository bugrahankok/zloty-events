<?php
    require_once __DIR__ . '/partials/header.php';

    $page_slug = $_GET['slug'];

    $page = mysqli_query($conn, "SELECT * FROM pages WHERE slug = '$page_slug' LIMIT 1");
    $page_count = mysqli_num_rows($page);

    if ($page_count <= 0 || empty($page_slug)) {
        header("Location: 404.php");
    }

    $page_details = mysqli_fetch_object($page);
?>

    <!-- Start Hero Area -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Exclusive Events</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Hero Area -->

    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-left">
                        <div class="about-title align-left">
                            <span class="wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">
                            <?php echo setting('site_title'); ?>
                            </span>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                <?php echo $page_details->title; ?>
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                                <?php echo $page_details->description; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-right wow fadeInRight" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInRight;">
                        <img src="assets/images/about/about-img2.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
    require_once __DIR__ . '/partials/footer.php';
?>