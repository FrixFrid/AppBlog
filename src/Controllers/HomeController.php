<?php

namespace App\Controllers;

use App\Models\ArticleRepository;
use App\Models\UserRepository;

class HomeController extends Controller
{
    protected ArticleRepository $article;
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->model = new ArticleRepository();
        $this->userRepository = new UserRepository();
    }

    public function home(): void
    {
        $pageTitle = "Accueil";
        $articles = $this->model->findAll("createdAt DESC", 3);
        $this->render('home', ['pageTitle' => $pageTitle,
            'articles' => $articles
        ]);
    }


    public function about(): void
    {
        $pageTitle = "A propos";
        $this->render('about', ['pageTitle' => $pageTitle]);
    }

    public function contact(): void
    {
        $pageTitle = "Contact";
        $this->render('contact', ['pageTitle' => $pageTitle]);
    }

    public function login(): void
    {
        $pageTitle = "Connexion";
        $this->render('login', ['pageTitle' => $pageTitle]);
    }

    public function insert(): void
    {
        $this->render('articles/insert');
    }
}