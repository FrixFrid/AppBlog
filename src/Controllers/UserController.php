<?php
 namespace App\Controllers;

 use App\Http;
 use App\Models\UserModel;
 use App\Renderer;

 class UserController extends Controller
 {
     protected UserModel $userModel;

     public function __construct()
     {
         $this->model = new UserModel();
         $this->userModel = new UserModel();
         if (session_status() === PHP_SESSION_NONE) {
             session_start();
         }
     }

     public function register()
     {
         $pageTitle = "register";
         Renderer::render('auth/register', compact('pageTitle', 'register'));
     }

     public function registerUser()
     {
         $id = null;

         $username = null;
         if (!empty($_POST['username'])) {
             // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
             $username = htmlspecialchars($_POST['username']);
         }

         $email = null;
         if (!empty($_POST['email'])) {
             // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
             $email = htmlspecialchars($_POST['email']);
         }

         $mdp = null;
         $password_confirm = null;
         if (!empty($_POST['mdp'])) {
             if ($_POST['mdp'] === $_POST['password_confirm']) {
             }
             $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
         }

         if (!$username || !$email || !$mdp) {
             die("Vous devez vous connecter avec un email et un mot de passe");
         }

         $isAdmin = false;
         if (isset($_POST['is_admin'])) {
            $isAdmin = true;
         }

         $this->userModel->insert($username, $email, $mdp, $isAdmin);
         Http::redirect("index.php?controller=user&task=login");
     }


     public function login()
     {
         $pageTitle = "login";
         Renderer::render('auth/login', compact('pageTitle'));
     }

     public function loginUser() {
         $user = $this->userModel->findUser($_POST['email']);
         if (password_verify($_POST['mdp'], $user['mdp'])) {
             if ($user['is_admin']) {
                $_SESSION['auth'] = $user['is_admin'];
                 Http::redirect("index.php?controller=home&task=dashboard");
             } else {
                 Http::redirect("index.php?controller=home&task=home");
             }
         } else {
             Http::redirect("index.php?controller=user&task=login");
         }
     }

     public function logout() {
         session_start();
         session_destroy();
        Http::redirect("index.php?controller=home&task=home");
     }

     public function isAdmin() {
         if (isset($_SESSION['auth']) && $_SESSION['auth'] === 1) {
             return true;
         } else {
             Http::redirect("index.php?controller=user&task=login");
         }
     }
 }
