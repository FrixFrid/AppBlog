<?php
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'domain' => 'example.com',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict',
]);

session_start();

if (isset($_SESSION['ip_address']) && $_SESSION['ip_address'] !== $_SERVER['REMOTE_ADDR']) {
    // L'adresse IP a changé, probablement une attaque de session hijacking
    session_regenerate_id();
}

$_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];
