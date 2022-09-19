<?php
namespace App\Controllers;


use App\Models\ArticleRepository;
use App\Models\CommentRepository;
use App\Controllers\UserController;
use App\Renderer;

class HomeController extends Controller
{
    protected ArticleRepository $articleModel;
    protected UserController $userController;


    public function __construct() {
        $this->articleModel = new ArticleRepository();
        $this->userController = new UserController();
    }

    public function home(): void
    {
        $articles = $this->articleModel->findAll("created_at DESC", 3);
        //Renderer::render('home', compact('articles'));
        $this->render("home", ['articles'=> $articles]);
    }

    public function about(): void
    {
       Renderer::render('about', compact('pageTitle', 'about'));
    }

    public function contact(): void
    {
        Renderer::render('contact', compact('pageTitle', 'contact'));
    }

    public function login(): void
    {
        Renderer::render('login', compact('pageTitle', 'login'));
    }

    public function insert(): void
    {
        Renderer::render('articles/insert', compact('pageTitle', 'insert'));
    }

    public function dashboard(): void
    {
        // $this->isAdmin;
        Renderer::render('dashboard', compact('pageTitle', 'dashboard'));
    }
}