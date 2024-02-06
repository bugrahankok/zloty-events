<?php
    require_once __DIR__ . '/partials/header.php';

    if (!isUserLoggedIn() || !isAdmin()) {
        header('Location: 404.php');
        exit;
    }

    $general_settings = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM general_settings WHERE id = '1'"));
    
    if ($_POST) {
        $site_title = addslashes(trim($_POST['site_title']));
        $site_description = addslashes(trim($_POST['site_description']));
        $site_twitter = trim($_POST['site_twitter']);
        $site_instagram = trim($_POST['site_instagram']);
        $site_facebook = trim($_POST['site_facebook']);
        $footer_description = addslashes(trim($_POST['footer_description']));

        $update_general_settings = mysqli_query($conn, "UPDATE general_settings SET site_title='$site_title', site_description='$site_description', site_twitter='$site_twitter', site_instagram='$site_instagram', site_facebook='$site_facebook', footer_description='$footer_description' WHERE id = '1'");
    
        if ($update_general_settings) {
            $_TOASTER = 'The website settings successfully updated';
            header("Refresh: 2; url=admin-dashboard.php");
        } else {
            $_TOASTER = 'Something went wrong!';
        }
    }

    if (!empty($_GET['delete_user'])) {
        $user_id = $_GET['delete_user'];
        mysqli_query($conn, "DELETE FROM users WHERE id = '$user_id'");
        $_TOASTER = 'The selected user is successfully deleted';
        header("Refresh: 2; url=admin-dashboard.php");
    }

    if (!empty($_GET['delete_event'])) {
        $event_id = $_GET['delete_event'];
        mysqli_query($conn, "DELETE FROM events WHERE id = '$event_id'");
        $_TOASTER = 'The selected event is successfully deleted';
        header("Refresh: 2; url=admin-dashboard.php");
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

    <div class="faq section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general" aria-selected="false">Website Settings</button>
                            <button class="nav-link" id="nav-users-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="false">All Users</button>
                            <button class="nav-link" id="nav-events-tab" data-bs-toggle="tab" data-bs-target="#nav-events" type="button" role="tab" aria-controls="nav-events" aria-selected="false">All Events</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-general" role="tabpanel">
                            <div class="card p-3">
                                <div class="card-body">
                                    <p class="card-text">
                                        <h5>Website Settings</h5>
                                        <br />
                                        <form class="form" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input name="site_title" type="text" placeholder="Site Title" required="required" value="<?=$general_settings->site_title?>">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input name="site_description" type="text" placeholder="Site Description" required="required" value="<?=$general_settings->site_description?>">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input name="site_instagram" type="text" placeholder="Site Instagram URL" required="required" value="<?=$general_settings->site_instagram?>">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input name="site_twitter" type="text" placeholder="Site Twitter URL" required="required" value="<?=$general_settings->site_twitter?>">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input name="site_facebook" type="text" placeholder="Site Facebook URL" required="required" value="<?=$general_settings->site_facebook?>">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input name="footer_description" type="text" placeholder="Footer Text" required="required" value="<?=$general_settings->footer_description?>">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group button">
                                                        <button type="submit" class="btn">Update Settings</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
                            <div class="card p-3">
                                <div class="card-body">
                                    <p class="card-text">
                                        <h5>All Users</h5>
                                        <br />
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Last Login</th>
                                                    <th scope="col">Signup Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $users = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
                                                    while ($user = mysqli_fetch_object($users)) {
                                                        echo '<tr>';
                                                        echo '<td>' . $user->id . '</td>';
                                                        echo '<td>' . $user->full_name . '</td>';
                                                        echo '<td>' . $user->email . '</td>';
                                                        echo '<td>' . formatDate($user->last_login_at, "d M Y, H:i") . '</td>';
                                                        echo '<td>' . formatDate($user->created_at, "d M Y, H:i") . '</td>';
                                                        echo '<td><a href="?delete_user=' . $user->id . '" class="btn btn-sm btn-danger">Delete</a></td>';
                                                        echo '</tr>';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
                            <div class="card p-3">
                                <div class="card-body">
                                    <p class="card-text">
                                        <h5>All Events</h5>
                                        <br />
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Create Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $events = mysqli_query($conn, "SELECT * FROM events ORDER BY id DESC");
                                                    while ($event = mysqli_fetch_object($events)) {
                                                        $author = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM users WHERE id = '$event->user_id'"));
                                                        echo '<tr>';
                                                        echo '<td>' . $event->id . '</td>';
                                                        echo '<td>' . mb_substr($event->title, 0, 45, "UTF-8") . '</td>';
                                                        echo '<td>' . $author->full_name . '</td>';
                                                        echo '<td>' . formatDate($event->created_at, "d M Y, H:i") . '</td>';
                                                        echo '<td><a href="?delete_event=' . $event->id . '" class="btn btn-sm btn-danger">Delete</a></td>';
                                                        echo '</tr>';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </p>
                                </div>
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