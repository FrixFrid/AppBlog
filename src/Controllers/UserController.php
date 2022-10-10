<?php
 namespace App\Controllers;

 use App\Models\User;
 use App\Models\UserRepository;

 class UserController extends Controller
 {
     protected UserRepository $userModel;

     public function __construct()
     {
         $this->model = new UserRepository();
         if (session_status() === PHP_SESSION_NONE) {
             session_start();
         }
     }

     public function register()
     {
         $pageTitle = "register";
         $this->render('auth/register', compact('pageTitle', 'register'));
     }

     public function registerUser()
     {

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
             $password_confirm = ($mdp = (password_hash($_POST['mdp'], PASSWORD_BCRYPT)));
         }

         if (!$username || !$email || !$mdp) {
             die("Vous devez vous connecter avec un email et un mot de passe");
         }

         $this->model->insert($username, $email, $mdp);
         $this->redirect("index.php?controller=user&task=login");
     }

     public function login()
     {
         $this->render('auth/login');
     }

     public function loginUser() {
         $user = $this->model->findUserLogin($_POST['email']);
         if (password_verify($_POST['mdp'], $user['mdp'])) {
             if ($user['is_admin']) {
                $_SESSION['auth'] = $user['is_admin'];
                 $this->redirect("index.php?controller=home&task=dashboard");
             } else {
                 $this->redirect("index.php?controller=home&task=home");
             }
         } else {
             $this->redirect("index.php?controller=user&task=login");
         }
     }

     public function logout() {
         session_start();
         session_destroy();
        $this->redirect("index.php?controller=home&task=home");
     }

     public function isAdmin() {
         if (isset($_SESSION['auth']) && $_SESSION['auth'] === 1) {
             return true;
         } else {
             $this->redirect("index.php?controller=user&task=login");
         }
     }
 }
