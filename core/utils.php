<?php

function setting($setting_name) {
    global $site_settings;
    return !empty($site_settings->$setting_name) ? $site_settings->$setting_name : null;
}

function formatDate($date, $desired_format) {
    return date_format(date_create($date), $desired_format);
}

function url($path) {
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http://' : 'https://';
    return $protocol . $_SERVER['SERVER_NAME'] . SITE_PATH . '/' . $path;
}

function eventUrl($event_slug) {
    return url('event-detail.php?slug=' . $event_slug);
}

function pageUrl($page_slug) {
    return url('page.php?slug=' . $page_slug);
}

function slug($string, $separator='-') {
    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
    $special_cases = array('&' => 'and', "'" => '');
    $string = mb_strtolower(trim( $string ), 'UTF-8');
    $string = str_replace(array_keys($special_cases), array_values( $special_cases), $string);
    $string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
    $string = preg_replace("/[$separator]+/u", "$separator", $string);
    return $string;
}

function currentUrl() {
    return (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function currentPath() {
    return $_SERVER['REQUEST_URI'];
}

function isUserLoggedIn() {
    return !empty($_SESSION['login']) && !empty($_SESSION['user_id']) && !empty($_SESSION['user_role']) && $_SESSION['login'];
}

function isAdmin() {
    return isUserLoggedIn() && $_SESSION['user_role'] == 'ADMIN';
}