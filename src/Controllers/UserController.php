<?php

namespace AppBlog\Controllers;

use AppBlog\Models\ArticleRepository;
use AppBlog\Models\CommentRepository;
use AppBlog\Models\User;
use AppBlog\Models\UserRepository;

class UserController extends Controller
{
    private ArticleRepository $articleRepository;
    private CommentRepository $commentRepository;
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->model = new UserRepository();
        $this->articleRepository = new ArticleRepository();
        $this->commentRepository = new CommentRepository();
        $this->userRepository = new UserRepository();
    }

    public function registerUser()
    {
        //initialise la variable $username à null
        $username = null;
        //verifie si la clé 'username' existe dans la variable $_POST et n'est pas vide
        if (!empty($_POST['username'])) {
            //Si la clé 'username' existe et n'est pas vide, la fonction htmlspacialchars est utilisée pour nettoyer les caractères spéciaux et les tags HTML
            // éventuels qui pourraient être inclus dans la valeur de la clé 'username'. La valeur nettoyée est ensuite stockée dans la variable $username.
            $username = htmlspecialchars($_POST['username']);
        }
        $email = null;
        if (!empty($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
        }
        $mdp = null;
        if (!empty($_POST['mdp'])) {
            if ($_POST['mdp'] === $_POST['password_confirm']) {
                $password_confirm = $mdp = (password_hash($_POST['mdp'], PASSWORD_BCRYPT));
            }
        }
        $is_admin = 0;
        if (isset($_POST['is_admin'])) {
            $is_admin = 1;
        }
        if (!$username || !$email || !$mdp) {
            die("Vous devez vous connecter avec un email et un mot de passe");
        }
        $this->model->insert($username, $email, $mdp, $is_admin);
        $this->redirect("/login");
    }

    public function delete($id)
    {
        $user = $this->model->find($id);
        if (!$user) {
            die("L'utilisateur n'existe pas, vous ne pouvez donc pas le supprimer !");
        }
        $this->model->delete($id);
        $this->redirect('/dashboard');
    }

    public function login()
    {
        $pageTitle = "Login";
        $this->render('login', [
            'pageTitle' => $pageTitle,
        ]);
    }

    public function loginUser()
    {
        if (isset($_POST['email'])) {
            $user = $this->model->findUserLogin($_POST['email']);
            if (!password_verify($_POST['mdp'], ($user->getMdp()))) {
                $this->redirect("/login");
            } else {
                $_SESSION['user'] = $user;
                if ($user->getIsAdmin()) {
                    $this->redirect("/dashboard");
                } else {
                    $this->redirect("/");
                }
            }
        }
    }

    public function logout()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
        $this->redirect("/");
    }

    public function dashboard()
    {
        $pageTitle = "Dashboard";
        $users = $this->userRepository->findAllUser();
        $articles = $this->articleRepository->findAll("createdAt");
        $comments = $this->commentRepository->findNotValidated();
        $this->render('dashboard', [
            'pageTitle' => $pageTitle,
            'users' => $users,
            'articles' => $articles,
            'comments' => $comments
        ]);
    }
}
