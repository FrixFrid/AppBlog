<?php
namespace App\Controllers;


use App\Models\ArticleRepository;
use App\Models\UserRepository;

class HomeController extends Controller
{
    protected ArticleRepository $article;
    protected UserRepository $userRepository;


    public function __construct() {
        $this->model = new ArticleRepository();
        $this->userRepository = new UserRepository();
    }

    public function home(): void
    {
        $articles = $this->model->findAll("createdAt DESC", 3);
        $this->render("home", ['articles' => $articles]);
    }

    public function about(): void
    {
       $this->render("about");
    }

    public function contact(): void
    {
        $this->render("contact");
    }

    public function login(): void
    {
        $this->render('login');
;
    }

    public function insert(): void
    {
        $this->render('articles/insert');
    }
}