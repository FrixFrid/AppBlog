<?php

namespace AppBlog\Controllers;

use AppBlog\Models\ArticleRepository;
use AppBlog\Models\UserRepository;

class HomeController extends Controller
{
    protected ArticleRepository $article;
    protected UserRepository $userRepository;

    public function __construct()
    {
        $this->model = new ArticleRepository();
        $this->userRepository = new UserRepository();
    }

    public function home()
    {
        $pageTitle = "Accueil";
        $articles = $this->model->findAll("createdAt DESC", 3);
        $this->render('home', ['pageTitle' => $pageTitle,
            'articles' => $articles
        ]);
    }


    public function about()
    {
        $pageTitle = "A propos";
        $this->render('about', ['pageTitle' => $pageTitle]);
    }

    public function contact()
    {
        $pageTitle = "Contact";
        $this->render('contact', ['pageTitle' => $pageTitle]);
    }

    public function logout()
    {
        $pageTitle = "Logout";
        $this->render('logout', ['pageTitle' => $pageTitle]);
    }

    public function register()
    {
        $pageTitle = "register";
        $this->render('register', ['pageTitle' => $pageTitle]);
    }


    public function insert()
    {
        $pageTitle = 'Insert';
        $this->render('insert', ['pageTitle' => $pageTitle]);
    }

    public function page404()
    {
        $pageTitle = '404';
        $this->render('404', ['pageTitle' => $pageTitle]);
    }

}