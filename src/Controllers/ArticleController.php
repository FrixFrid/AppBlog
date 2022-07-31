<?php

namespace App\Controllers;


use App\Http;
use App\Models\ArticleModel;
use App\Models\CommentModel;
use App\Renderer;

class ArticleController extends Controller
{
    protected CommentModel $commentModel;
    protected ArticleModel $articleModel;


    public function __construct() {
        $this->model = new ArticleModel();
        $this->commentModel = new CommentModel();
        $this->articleModel = new ArticleModel();
    }

    public function blog()
    {
        /**
         * 2. Récupération des articles
         */
        $articles = $this->model->findAll("created_at DESC");

        /**
         * 3. Affichage
         */
        $pageTitle = "Blog";

        Renderer::render('articles/index', compact('pageTitle', 'articles'));
    }

    public function show()
    {
        /**
         * 1. Récupération du param "id" et vérification de celui-ci
         */
// On part du principe qu'on ne possède pas de param "id"
        $id = null;

// Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

// On peut désormais décider : erreur ou pas ?!
        if (!$id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        /**
         * 3. Récupération de l'article en question
         */
        $article_id = $id;
        $article = $this->model->find($article_id);

        /**
         * 4. Récupération des commentaires de l'article en question
         */
        $commentaires = $this->commentModel->findAllWithArticle($article_id);

        /**
         * 5. On affiche
         */
        $pageTitle = $article['title'];

        Renderer::render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id'));
    }

    public function lastshow()
    {
        /**
         * 2. Récupération des articles
         */
        $articles = $this->model->findAll("created_at DESC", 3);
    }


    public function delete()
    {
        /**
         * 1. On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];


        /**
         * 3. Vérification que l'article existe bel et bien
         */
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        /**
         * 4. Réelle suppression de l'article
         */
        $this->model->delete($id);

        /**
         * 5. Redirection vers la page d'accueil
         */
        Http::redirect('index.php?controller=article&task=blog');
    }

    public function insert()
    {
        /**
         * 1. On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */
        // On commence par le titre
        $title = null;
        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
        }

        $slug = null;
        if (!empty($_POST['slug'])) {
            $slug = $_POST['slug'];
        }

// On commence par l'author
        $author = null;
        if (!empty($_POST['author'])) {
            $author = $_POST['author'];
        }

        $extrait = null;
        var_dump($_POST);
        if (!empty($_POST['extrait'])) {
            $extrait = $_POST['extrait'];
        }

// Ensuite le contenu
        $content = null;
        if (!empty($_POST['content'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $content = htmlspecialchars($_POST['content']);
        }


// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$title || !$slug || !$author || !$extrait || !$content) {
            die("Votre formulaire a été mal rempli !");
        }


// 3. Insertion de l'article
        $this->articleModel->insert($title, $slug, $author, $extrait, $content);

// 4. Redirection vers l'article en question :
        Http::redirect("index.php?controller=article&task=blog");
    }

    public function UpdateArticle(): void
    {
        $id = null;

// Mais si il y'en a un et que c'est un nombre entier, alors c'est cool
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

// On peut désormais décider : erreur ou pas ?!
        if (!$id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        $article_id = $id;
        $article = $this->model->find($article_id);

        /**
         * 5. On affiche
         */
        $pageTitle = $article['title'];

        Renderer::render('articles/updateArticle', compact('pageTitle', 'article', 'article_id'));
    }

    public function update(){
        /**
         * 1. On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */

        $title = null;
        if (!empty($_POST['title'])) {
            $title = $_POST['title'];
        }

        $slug = null;
        if (!empty($_POST['slug'])) {
            $slug = $_POST['slug'];
        }

        $author = null;
        if (!empty($_POST['author'])) {
            $author = $_POST['author'];
        }

        $extrait = null;
        if (!empty($_POST['extrait'])) {
            $extrait = $_POST['extrait'];
        }

        $content = null;
        if (!empty($_POST['content'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $content = htmlspecialchars($_POST['content']);
        }


// Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
// Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article



        // mofification de l'article
        $this->articleModel->update($_GET['id'], $title, $slug, $author, $extrait, $content);


        // 4. Redirection vers l'article en question :
        Http::redirect('index.php?controller=article&task=blog');
    }

}