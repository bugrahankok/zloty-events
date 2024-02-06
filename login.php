<?php
    require_once __DIR__ . '/partials/header.php';

    if (isUserLoggedIn()) {
        header('Location: index.php');
        exit;
    }

    if ($_POST) {
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars($_POST['password']);
        $remember = $_POST['remember'];

        if (empty($email) || empty($password)) {

            $_TOASTER = "Please fill the blanks!";

        } else {

            $user_exist = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'"));

            if ($user_exist > 0) {

                $user = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'"));
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_role'] = $user->role;

                $_TOASTER = "You're successfully logged-in";
                header('Location: index.php');

            } else {

                $_TOASTER = "Please check you email and password again!";
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
                        <h4 class="title">Login</h4>
                        <form action="#!" method="post">
                            <div class="form-group">
                                <label>Username or email</label>
                                <input class="margin-5px-bottom" type="email" name="email" id="exampleInputEmail1" placeholder="Username or email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="margin-5px-bottom" type="password" name="password" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="check-and-pass">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input width-auto" name="remember" id="exampleCheck1">
                                            <label class="form-check-label">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <a href="javascript:void(0)" class="lost-pass">Lost your password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                                <button type="submit" class="btn">Log In</button>
                            </div>
                            <p class="outer-link">Don't have an account? <a href="signup.php">Register here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
    require_once __DIR__ . '/partials/footer.php';
?>