<?php
namespace App\Controllers;


use App\Models\ArticleRepository;

class HomeController extends Controller
{
    protected ArticleRepository $articleModel;


    public function __construct() {
        $this->articleModel = new ArticleRepository();
    }

    public function home(): void
    {
        $articles = $this->articleModel->findAll("createdAt DESC", 3);
        //Renderer::render('home', compact('articles'));
        $this->render("home", ['articles'=> $articles]);
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

    public function dashboard(): void
    {
        // $this->isAdmin;
        $this->render('dashboard');
    }
}