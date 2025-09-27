<?php
    require_once __DIR__ . '/partials/header.php';

    if (!isUserLoggedIn()) {
        header('Location: 404.php');
        exit;
    }

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

            $insert_event = mysqli_query($conn, "INSERT INTO events (user_id, slug, title, description, date, address, link_url, cover_url) VALUES ('$user_id', '$slug', '$title', '$description', '$date', '$address', '$link_url', '$cover_url')");
            if ($insert_event) {
                $_TOASTER = "The event is successfully created";
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
                                <h3>Create an event</h3>
                                <form class="form" method="post" action="">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="cover_url" type="text" placeholder="Event Image" required="required">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="title" type="text" placeholder="Event Title" required="required">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="address" type="text" placeholder="Event Address">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="date" type="datetime-local" placeholder="Event Date" required="required">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="link_url" type="url" placeholder="Event Link URL">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group message">
                                                <textarea name="description" placeholder="Event Detail" required="required"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn">Create Event</button>
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