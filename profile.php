<?php
    require_once __DIR__ . '/partials/header.php';

    if (!isUserLoggedIn()) {
        header('Location: 404.php');
        exit;
    }

    if ($_POST) {
        $full_name = htmlspecialchars(trim($_POST['full_name']));
        $profile_picture_url = addslashes(trim($_POST['profile_picture_url']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));

        $user_exist = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));
        
        if ($user_exist > 1) {
            $_TOASTER = "This email is already in use!";
        } else {

            $update_user = mysqli_query($conn, "UPDATE users SET full_name='$full_name', email='$email', password='$password', profile_picture_url='$profile_picture_url' WHERE id='$user_id'");
            if ($update_user) {
                $_TOASTER = "Your profile is updated";
                header('Refresh:2; url=profile.php');
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
                    <div class="teacher-personal-info">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-4 col-12">
                                <div class="image">
                                    <img src="<?=$user_details->profile_picture_url;?>" alt="<?=$user_details->full_name;?>">
                                    <h4 class="name">
                                        <?=$user_details->full_name;?>
                                        <span><?=$user_details->email;?></span>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-12">
                                <form class="form" method="post" action="">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="profile_picture_url" type="url" placeholder="Profile Picture URL" required="required" value="<?=$user_details->profile_picture_url?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="full_name" type="text" placeholder="Your Name" required="required" value="<?=$user_details->full_name?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="email" type="email" placeholder="Your Email" required="required" value="<?=$user_details->email?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="password" type="password" placeholder="Your Password" required="required" value="<?=$user_details->password?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button">
                                                <button type="submit" class="btn ">Update Profile</button>
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