<?php

namespace AppBlog\Controllers;

use AppBlog\Models\ArticleRepository;
use AppBlog\Models\CommentRepository;
use AppBlog\Models\Comment;
use AppBlog\Models\User;
use AppBlog\Models\UserRepository;

class UserController extends Controller
{
    private ArticleRepository $articleRepository;
    private CommentRepository $commentRepository;

    public function __construct()
    {
        $this->model = new UserRepository();
        $this->articleRepository = new ArticleRepository();
        $this->commentRepository = new CommentRepository();
    }

    public function registerUser()
    {
        $username = null;
        if (!empty($_POST['username'])) {
            $username = htmlspecialchars($_POST['username']);
        }

        $email = null;
        if (!empty($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
        }

        $mdp = null;
        $password_confirm = null;
        if (!empty($_POST['mdp'])) {
            if ($_POST['mdp'] === $_POST['password_confirm']) {
                $password_confirm = $mdp = (password_hash($_POST['mdp'], PASSWORD_BCRYPT));
            }
        }

        $is_admin = false;
        if (isset($_POST['is_admin'])) {
            $is_admin = true;
        }

        if (!$username || !$email || !$mdp) {
            die("Vous devez vous connecter avec un email et un mot de passe");
        }
        $this->model->insert($username, $email, $mdp, $is_admin);
        $this->redirect("/login");
    }

    public function login()
    {
        if (isset($_POST['email'])) {
            $user = $this->model->findUserLogin($_POST['email']);
            if (password_verify($_POST['mdp'], $user['mdp'])) {
                if ($user['is_admin']) {
                    $_SESSION['auth'] = $user['is_admin'];
                    $this->redirect("/dashboard");
                } else {
                    $this->redirect("/");
                }
            } else {
              $this->redirect("/login");
            }
        }
       $this->render('/login');
    }

    public function logout()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
        session_destroy();
        }
        $this->redirect("/");
    }

    public function isAdmin($user)
    {
        if (isset($_SESSION['auth']) && $user['is_admin'] === 1) {
            return true;
        } else {
            $this->redirect("/login");
        }
    }

    public function dashboard()
    {
        $articles = $this->articleRepository->findAll("createdAt");
        $comments = $this->commentRepository->findNotValidated();
        $this->render('dashboard', [
            'articles' => $articles,
            'comments' => $comments //variable comments attendu
        ]);
    }
}
