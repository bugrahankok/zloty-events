<?php
    require_once __DIR__ . '/partials/header.php';

    $event_slug = $_GET['slug'];

    $event = mysqli_query($conn, "SELECT * FROM events WHERE slug = '$event_slug' LIMIT 1");
    $event_count = mysqli_num_rows($event);

    if ($event_count <= 0 || empty($event_slug)) {
        header("Location: 404.php");
    }

    $event_details = mysqli_fetch_object($event);
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

    <!-- Start Event Area -->
    <div class="event-details section">
        <div class="container">
            <div class="row">
                <!-- Start Event Details Content -->
                <div class="col-lg-8 col-12">
                    <div class="details-content">
                        <h2 class="title"><?php echo $event_details->title; ?></h2>
                        <ul class="meta-data">
                            <li><i class="lni lni-map-marker"></i> <?php echo $event_details->address; ?></li>
                            <li><i class="lni lni-calendar"></i> <?php echo formatDate($event_details->date, "M d, Y"); ?></li>
                            <li><i class="lni lni-timer"></i> <?php echo formatDate($event_details->date, "h.ia"); ?></li>
                        </ul>
                        <!-- Start Google-map Area -->
                        <div class="map-section">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe width="100%" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo urlencode($event_details->address); ?>&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>
                            <p class="location"> <i class="lni lni-map-marker"></i> <?php echo $event_details->address; ?></p>
                        </div>
                        <!-- End Google-map Area -->
                        <div class="text">
                            <p>
                                <?php echo $event_details->description; ?>
                            </p>
                            <?php
                                if (!empty($event_details->link_url)) {
                                   echo '<a class="btn btn-success" target="_blank" href="' . $event_details->link_url . '">Event Link</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- End Event Details Content -->
                <!-- Start Event Details Sidebar -->
                <div class="col-lg-4 col-12">
                    <div class="event-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget first-wedget">
                            <div class="sidebar-widget-content">
                                <div class="sidebar-entry-event">
                                    <div class="entry-register">
                                        <p class="event-register-message">Do you want to share this event?</p>
                                    </div>
                                    <ul class="author-social-networks event-social">
                                        <li class="item">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo currentUrl(); ?>" target="_blank" class="social-link"> <i class="lni lni-facebook-original"></i> </a>
                                        </li>
                                        <li class="item">
                                            <a href="https://twitter.com/intent/tweet?url=<?php echo currentUrl(); ?>" target="_blank" class="social-link"> <i class="lni lni-twitter-original"></i> </a>
                                        </li>
                                        <li class="item">
                                            <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="lni lni-linkedin-original"></i> </a>
                                        </li>
                                        <li class="item">
                                            <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="lni lni-tumblr"></i> </a>
                                        </li>
                                        <li class="item">
                                            <a href="JavaScript:Void(0);" target="_blank" class="social-link"> <i class="lni lni-youtube"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget other-event-wedget">
                            <h3 class="sidebar-widget-title">Other Events</h3>
                            <ul class="other-event">
                                <?php 
                                    $recommended_events = mysqli_query($conn, "SELECT * FROM events ORDER BY RAND() LIMIT 3");
                                    while ($recommended_event = mysqli_fetch_object($recommended_events)) {
                                ?>
                                <li class="single-event">
                                    <div class="thumbnail">
                                        <a href="javascript:void(0)" class="image">
                                            <img src="<?php echo $recommended_event->cover_url; ?>" alt="<?php echo $recommended_event->title; ?>">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <span class="date"><i class="lni lni-calendar"></i> <?php echo formatDate($recommended_event->date, "d M Y"); ?></span>
                                        <h6 class="title"><a href="event-details.html"><?php echo mb_substr($recommended_event->title, 0, 35, "UTF-8"); ?></a></h6>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
                <!-- End Event Details Sidebar -->
            </div>
        </div>
    </div>
    <!-- End Event Area -->

<style>
    .breadcrumbs {
        background-image: url("<?php echo $event_details->cover_url; ?>")!important;
    }
</style>

<?php
    require_once __DIR__ . '/partials/footer.php';
?>