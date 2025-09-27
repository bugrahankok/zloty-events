<?php
    require_once __DIR__ . '/partials/header.php';
?>

    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="hero-slider">
            <!-- Single Slider -->
            <div class="hero-inner overlay" style="background-image: url('assets/images/hero/breadcrumbs.jpeg');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                            <div class="home-slider">
                                <div class="hero-text">
                                    <h5 class="wow fadeInUp" data-wow-delay=".3s">Zloty Events</h5>
                                    <h1 class="wow fadeInUp" data-wow-delay=".5s">Find Your Event Place</h1>
                                    <p class="wow fadeInUp" data-wow-delay=".7s">Lorem Ipsum is simply dummy text of the
                                        printing and typesetting <br> industry. Lorem Ipsum has been the industry's
                                        standard
                                        <br>dummy text ever since an to impression.</p>
                                    <div class="button wow fadeInUp" data-wow-delay=".9s">
                                        <a href="contact.php" class="btn">Learn More</a>
                                        <a href="events.php" class="btn alt-btn">Our Events</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Single Slider -->
            <!-- Single Slider -->
            <div class="hero-inner overlay" style="background-image: url('assets/images/hero/breadcrumbs.jpeg');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                            <div class="home-slider">
                                <div class="hero-text">
                                    <h5 class="wow fadeInUp" data-wow-delay=".3s">Zloty Events</h5>
                                    <h1 class="wow fadeInUp" data-wow-delay=".5s">Find Your Concert Place </h1>
                                    <p class="wow fadeInUp" data-wow-delay=".7s">Lorem Ipsum is simply dummy text of the
                                        printing and typesetting <br> industry. Lorem Ipsum has been the industry's
                                        standard
                                        <br>dummy text ever since an to impression.</p>
                                    <div class="button wow fadeInUp" data-wow-delay=".9s">
                                        <a href="contact.php" class="btn">Learn More</a>
                                        <a href="events.php" class="btn alt-btn">Our Events</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Single Slider -->
            <!-- Single Slider -->
            <div class="hero-inner overlay" style="background-image: url('assets/images/hero/breadcrumbs.jpeg');">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                            <div class="home-slider">
                                <div class="hero-text">
                                    <h5 class="wow fadeInUp" data-wow-delay=".3s">Zloty Events</h5>
                                    <h1 class="wow fadeInUp" data-wow-delay=".5s">Find Your Party Place</h1>
                                    <p class="wow fadeInUp" data-wow-delay=".7s">Lorem Ipsum is simply dummy text of the
                                        printing and typesetting <br> industry. Lorem Ipsum has been the industry's
                                        standard
                                        <br>dummy text ever since an to impression.</p>
                                    <div class="button wow fadeInUp" data-wow-delay=".9s">
                                        <a href="contact.php" class="btn">Learn More</a>
                                        <a href="events.php" class="btn alt-btn">Our Events</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Single Slider -->
        </div>
    </section>
    <!--/ End Hero Area -->

    <!-- Start Events Area -->
    <section class="events section grid-page">
        <div class="container">
            <div class="row">

                <?php 
                    $events = mysqli_query($conn, "SELECT events.*, users.full_name, users.profile_picture_url 
                                                    FROM events LEFT JOIN users ON users.id = events.user_id 
                                                    ORDER BY id DESC LIMIT 6");
                    $event_count = mysqli_num_rows($events);                    
                ?>
                
                <?php if ($event_count <= 0) : ?>

                    <div class="alert alert-warning">
                        We don't have any events yet, sorry for that!
                    </div>

                <?php else: ?>
                    <?php while($event = mysqli_fetch_object($events)) : ?>
                        
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Start Single Event -->
                            <div class="single-event wow fadeInUp" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <div class="event-image">
                                    <a href="<?php echo eventUrl($event->slug); ?>">
                                        <img src="<?php echo $event->cover_url; ?>" alt="<?php echo $event->title; ?>">
                                    </a>
                                    <p class="date">
                                        <?php echo formatDate($event->date, "d"); ?>
                                        <span><?php echo formatDate($event->date, "M"); ?></span>
                                    </p>
                                </div>
                                <div class="content">
                                    <h3>
                                        <a href="<?php echo eventUrl($event->slug); ?>">
                                            <?php echo mb_substr($event->title, 0, 32, "UTF-8") ?>
                                        </a>
                                    </h3>
                                    <p>
                                        <?php
                                            $three_dot_needed = strlen($event->description) > 140;
                                            $dot_part = $three_dot_needed ? '...' : '';
                                            echo mb_substr($event->description, 0, 140, "UTF-8") . $dot_part;
                                        ?>
                                    </p>
                                </div>
                                <div class="bottom-content">
                                    <a class="speaker" href="javascript:void(0)">
                                        <img src="<?php echo $event->profile_picture_url; ?>" alt="<?php echo $event->full_name; ?>">
                                        <span><?php echo $event->full_name; ?></span>
                                    </a>
                                    <span class="time">
                                        <i class="lni lni-timer"></i>
                                        <a href="javascript:void(0)"><?php echo formatDate($event->date, "h.ia"); ?></a>
                                    </span>
                                </div>
                            </div>
                            <!-- End Single Event -->
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
            <!--
            <div class="row">
                <div class="col-12">
                    <div class="pagination center">
                        <ul class="pagination-list">
                            <li><a href="javascript:void(0)">Prev</a></li>
                            <li class="active"><a href="javascript:void(0)">1</a></li>
                            <li><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><a href="javascript:void(0)">4</a></li>
                            <li><a href="javascript:void(0)">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            -->
        </div>
    </section>
    <!-- End Events Area -->

    <!-- Start Call To Action Area -->
    <section class="call-action section overlay">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="call-content">
                        <span>Zloty Events</span>
                        <h2>All Events in Warsaw</h2>
                        <p>Please, purchase full version of the template to get all pages,<br>
                            features and commercial licenseLorem Ipsum is simply dummy text of the printing and typesetting industry. 
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        <div class="button">
                            <a href="events.php" class="btn">Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Call To Action Area -->


<?php
    require_once __DIR__ . '/partials/footer.php';
?>