<?php

use AppBlog\Controllers\HomeController;
use AppBlog\Controllers\UserController;
use AppBlog\Controllers\ArticleController;
use AppBlog\Controllers\CommentController;

require_once('../vendor/autoload.php');

session_start();

$homeController = new HomeController();
$userController = new UserController();
$articleController = new ArticleController();
$commentController = new CommentController();

if ($_SERVER['REQUEST_URI'] === '/') {
    echo $homeController->home();
} elseif ($_SERVER['REQUEST_URI'] === '/contact') {
    echo $homeController->contact();
} elseif ($_SERVER['REQUEST_URI'] === '/about') {
    echo $homeController->about();
} elseif ($_SERVER['REQUEST_URI'] === '/dashboard') {
    echo $userController->dashboard();
} elseif ($_SERVER['REQUEST_URI'] === '/login') {
    echo $userController->login();
} elseif ($_SERVER['REQUEST_URI'] === '/logout') {
    $userController->logout();
} elseif ($_SERVER['REQUEST_URI'] === '/register') {
    echo $homeController->register();
} elseif ($_SERVER['REQUEST_URI'] === '/registerUser') {
    echo $userController->registerUser();
} elseif ($_SERVER['REQUEST_URI'] === '/blog') {
    echo $articleController->blog();
} elseif (preg_match('/^\/blog\/article\/(\d+)\/update$/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = (int)$matches[1];
    echo $articleController->updateArticle($id);
} elseif (preg_match('/^\/blog\/article\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = (int)$matches[1];
    $articleController->show($id);
} elseif ($_SERVER['REQUEST_URI'] === '/blog/article/insert') {
    $articleController->insert();
} elseif (preg_match('/^\/blog\/article\/(\d+)\/delete$/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = (int)$matches[1];
    $articleController->delete($id);
} elseif (preg_match('/^\/blog\/article\/(\d+)\/update$/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = (int)$matches[1];
    $articleController->update($id);
} elseif (preg_match('/^\/article\/(\d+)\/comment\/insert$/', $_SERVER['REQUEST_URI'], $matches)) {
    $articleId = (int)$matches[1];
    $commentController->insert($articleId);
} elseif (preg_match('/^\/article\/comment\/(\d+)\/delete$/', $_SERVER['REQUEST_URI'], $matches)) {
    $articleId = (int)$matches[1];
    $commentController->delete($articleId);
} elseif (preg_match('/^\/article\/comment\/(\d+)\/validate/', $_SERVER['REQUEST_URI'], $matches)) {
    $articleId = (int)$matches[1];
    $commentController->validateComment($articleId);
} else {
    echo $homeController->page404();
}


