<?php
    require_once __DIR__ . '/partials/header.php';

    if (isUserLoggedIn()) {
        $_SESSION['login'] = false;
        $_SESSION['user_id'] = '';
        $_SESSION['user_role'] = '';

        session_destroy();
    }

    header('Location: index.php');
?>
