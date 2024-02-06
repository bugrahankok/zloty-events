<?php
    require_once __DIR__ . '/partials/header.php';

    if (!isUserLoggedIn()) {
        header('Location: 404.php');
        exit;
    }

    if (!empty($_GET['delete'])) {
        $event_id = htmlspecialchars($_GET['delete']);
        mysqli_query($conn, "DELETE FROM events WHERE id = '$event_id' AND user_id = '$user_id'");
        $_TOASTER = 'The selected event is successfully deleted';
        header("Refresh: 2; url=my-events.php");
    }
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

    <!-- Start Events Area -->
    <section class="events section grid-page">
        <div class="container">
            <div class="row">
                <?php
                    $page = empty($_GET['page']) ? 1 : $_GET['page'];
                    $items_per_page = 6;
                    $offset = ($page * $items_per_page) - $items_per_page;

                    $events = mysqli_query($conn, "SELECT events.*, users.full_name, users.profile_picture_url 
                                                    FROM events LEFT JOIN users ON users.id = events.user_id 
                                                    WHERE user_id = '$user_id'
                                                    ORDER BY id DESC LIMIT $items_per_page OFFSET $offset");
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
                                    <a href="edit-event.php?id=<?php echo $event->id; ?>">
                                        <img src="<?php echo $event->cover_url; ?>" alt="<?php echo $event->title; ?>">
                                    </a>
                                    <p class="date">
                                        <?php echo formatDate($event->date, "d"); ?>
                                        <span><?php echo formatDate($event->date, "M"); ?></span>
                                    </p>
                                </div>
                                <div class="content">
                                    <h3>
                                        <a href="edit-event.php?id=<?php echo $event->id; ?>">
                                            <?php echo mb_substr($event->title, 0, 32, "UTF-8") ?>
                                        </a>
                                    </h3>
                                    <a href="edit-event.php?id=<?=$event->id?>" class="btn btn-primary">Edit</a>
                                    <a href="my-events.php?delete=<?=$event->id?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                            <!-- End Single Event -->
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>

            <?php
                $total_page = ceil($event_count / $items_per_page);
                $prev_page = $page > 1 ? $page-1 : 0;
                $next_page = $total_page > $page ? $page+1 : $total_page;
            ?>
            
            <div class="row">
                <div class="col-12">
                    <div class="pagination center">
                        <ul class="pagination-list">
                            <?php if ($total_page > 0) : ?>
                                <li><a href="events.php?page=<?php echo $prev_page; ?>">Prev</a></li>
                            <?php endif; ?>
                            <?php 
                                for ($i = 1; $i <= $total_page; $i++) {

                                    $class = ($page == $i) ? 'active' : '';
                                    echo "<li class='{$class}'><a href='events.php?page={$i}'>{$i}</a></li>";
                                }
                            ?>
                            <?php if ($total_page > 0) : ?>
                                <li><a href="events.php?page=<?php echo $next_page; ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- End Events Area -->

<?php
    require_once __DIR__ . '/partials/footer.php';
?>