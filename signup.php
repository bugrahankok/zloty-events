<?php
    require_once __DIR__ . '/partials/header.php';

    if (isUserLoggedIn()) {
        header('Location: index.php');
        exit;
    }

    if ($_POST) {
        $email = htmlspecialchars(trim($_POST['email']));
        $full_name = htmlspecialchars(trim($_POST['full_name']));
        $password = htmlspecialchars($_POST['password']);
        $profile_picture_url = "https://dummyimage.com/100x100/9c9c9c/fff.png&text=" . mb_substr($full_name, 0, 2, "UTF-8");

        if (empty($email) || empty($full_name) || empty($password)) {

            $_TOASTER = "Please fill the blanks!";

        } else {

            $user_exist = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));

            if ($user_exist > 0) {

                $_TOASTER = "This email is already in use!";

            } else {

                $user_signup = mysqli_query($conn, "INSERT INTO users (full_name, email, password, profile_picture_url) VALUES ('$full_name', '$email', '$password', '$profile_picture_url')");
            
                if ($user_signup) {
                    $_TOASTER = "You're successfully registered!";
                    header('Refresh: 2; url=login.php');
                } else {
                    $_TOASTER = "Something went wrong!";
                }
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

    <section class="login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Register</h4>
                        <form action="signup.php" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="margin-5px-bottom" type="email" name="email" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="margin-5px-bottom" type="text" name="full_name" id="exampleInputName1" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="margin-5px-bottom" type="password" name="password" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="button">
                                <button type="submit" class="btn">Register</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="login.php">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
    require_once __DIR__ . '/partials/footer.php';
?>