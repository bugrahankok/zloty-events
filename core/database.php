<?php

ob_start();
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/constants.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_error()) {
    die("Cannot connect to the database!");
}

$site_settings = mysqli_fetch_object(mysqli_query($conn, "SELECT * FROM general_settings WHERE id = '1'"));

require_once __DIR__ . '/utils.php';