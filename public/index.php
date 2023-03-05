<?php

use AppBlog\Controllers\HomeController;
use AppBlog\Controllers\UserController;
use AppBlog\Controllers\ArticleController;
use AppBlog\Controllers\CommentController;

require_once('../vendor/autoload.php');
require_once('../config/config.php');

$homeController = new HomeController();
$userController = new UserController();
$articleController = new ArticleController();
$commentController = new CommentController();

if ($_SERVER['REQUEST_URI'] === '/') {
     $homeController->home();
} elseif ($_SERVER['REQUEST_URI'] === '/contact') {
     $homeController->contact();
} elseif ($_SERVER['REQUEST_URI'] === '/about') {
     $homeController->about();
} elseif ($_SERVER['REQUEST_URI'] === '/dashboard') {
     $userController->dashboard();
} elseif ($_SERVER['REQUEST_URI'] === '/login') {
     $userController->login();
} elseif ($_SERVER['REQUEST_URI'] === '/loginUser') {
     $userController->loginUser();
} elseif ($_SERVER['REQUEST_URI'] === '/logout') {
    $userController->logout();
} elseif ($_SERVER['REQUEST_URI'] === '/register') {
     $homeController->register();
} elseif ($_SERVER['REQUEST_URI'] === '/registerUser') {
     $userController->registerUser();
} elseif (preg_match('/^\/user\/(\d+)\/delete$/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = (int)$matches[1];
    $userController->delete($id);
} elseif ($_SERVER['REQUEST_URI'] === '/blog') {
     $articleController->blog();
} elseif (preg_match('/^\/blog\/article\/(\d+)\/update$/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = (int)$matches[1];
     $articleController->updateArticle($id);
} elseif (preg_match('/^\/blog\/article\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = (int)$matches[1];
    $articleController->show($id);
} elseif ($_SERVER['REQUEST_URI'] === '/blog/article/insert') {
    $articleController->insert();
} elseif (preg_match('/^\/blog\/article\/(\d+)\/delete$/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = (int)$matches[1];
    $articleController->delete($id);
} elseif (preg_match('/^\/blog\/article\/(\d+)\/updatePost$/', $_SERVER['REQUEST_URI'], $matches)) {
    $id = (int)$matches[1];
    $articleController->update($id);
} elseif (preg_match('/^\/article\/(\d+)\/comment\/insert$/', $_SERVER['REQUEST_URI'], $matches)) {
    $articleId = (int)$matches[1];
    $commentController->insert($articleId);
} elseif (preg_match('/^\/article\/(\d+)\/comment\/delete$/', $_SERVER['REQUEST_URI'], $matches)) {
    $articleId = (int)$matches[1];
    $commentController->delete($articleId);
} elseif (preg_match('/^\/article\/(\d+)\/comment\/validate$/', $_SERVER['REQUEST_URI'], $matches)) {
    $articleId = (int)$matches[1];
    $commentController->validateComment($articleId);
} else {
     $homeController->page404();
}


