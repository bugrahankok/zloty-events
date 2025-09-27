<?php
    require_once __DIR__ . '/partials/header.php';

    if (!isUserLoggedIn()) {
        header('Location: 404.php');
        exit;
    }

    $event_id = $_GET['id'];
    $event_detail = mysqli_query($conn, "SELECT * FROM events WHERE id = '$event_id' AND user_id = '$user_id'");
    $event_exist = mysqli_num_rows($event_detail);

    if ($event_exist <= 0) {
        header("Location: 404.php");
    }

    $event = mysqli_fetch_object($event_detail);

    if ($_POST) {

        $title = htmlspecialchars(trim($_POST['title']));
        $description = addslashes(trim($_POST['description']));
        $date = htmlspecialchars(trim($_POST['date']));
        $address = htmlspecialchars(trim($_POST['address']));
        $link_url = htmlspecialchars(trim($_POST['link_url']));
        $cover_url = htmlspecialchars(trim($_POST['cover_url']));
        $slug = slug($title . '-' . rand(1000,9999));

        if (empty($title) || empty($description) || empty($date) || empty($cover_url)) {
            $_TOASTER = "Please fill all required fields!";
        } else {

            $update_event = mysqli_query($conn, "UPDATE events SET user_id='$user_id', slug='$slug', title='$title', description='$description', date='$date', address='$address', link_url='$link_url', cover_url='$cover_url' WHERE id = '$event_id'");
            if ($update_event) {
                $_TOASTER = "The event is successfully updated";
                header("Refresh: 2; url=my-events.php");
            } else {
                $_TOASTER = "Something went wrong!";
            }
        }
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

    <div class="teacher-details-area section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="teacher-details-item">
                        <div class="teacher-details-right">
                            <div class="teacher-contact-form">
                                <h3>Update an event</h3>
                                <form class="form" method="post" action="?id=<?=$event_id?>">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="cover_url" type="text" placeholder="Event Image" required="required" value="<?=$event->cover_url?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="title" type="text" placeholder="Event Title" required="required" value="<?=$event->title?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="address" type="text" placeholder="Event Address" value="<?=$event->address?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="date" type="datetime-local" placeholder="Event Date" required="required" value="<?=$event->date?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="link_url" type="url" placeholder="Event Link URL" value="<?=$event->link_url?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group message">
                                                <textarea name="description" placeholder="Event Detail" required="required"><?=$event->description?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn">Update Event</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once __DIR__ . '/partials/footer.php';
?>