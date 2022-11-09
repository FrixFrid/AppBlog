<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\ArticleRepository;
use App\Models\CommentRepository;

class ArticleController extends Controller
{
    protected CommentRepository $commentRepository;

    public function __construct()
    {
        $this->model = new ArticleRepository();
        $this->commentRepository = new CommentRepository();
    }

    public function blog()
    {
        //Récupération des articles
        $articles = $this->model->findAll("createdAt DESC");

        //Affichege des articles dans le blog
        $pageTitle = "Blog";
        $this->render('articles/index', [
            'pageTitle' => $pageTitle,
            'articles' => $articles
        ]);
    }


    public function show()
    {
        $id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        //Récupération de l'article en question
        $articleId = $id;
        $article = $this->model->find($articleId);

        //Récupération des commentaires de l'article en question
        $comments = $this->commentRepository->findAllWithArticle($article->getId());
        //On affiche
        $this->render('articles/show', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function lastshow()
    {
        //Récupération des articles
        $this->model->findAll("createdAt DESC", 3);
    }

    public function showDash()
    {
        $this->model->findAll("createdAt DESC");
    }

    public function delete()
    {
        //On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id de l'article !");
        }

        $id = $_GET['id'];

        //Vérification que l'article existe bel et bien
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        //Réelle suppression de l'article
        $this->model->delete($id);

        //Redirection vers la page du blog
        $this->redirect('index.php?controller=user&task=dashboard');
    }

    public function insert()
    {
        //1. On vérifie que les données ont bien été envoyées en POST
        //D'abord, on récupère les informations à partir du POST
        //Ensuite, on vérifie qu'elles ne sont pas nulles
        // On commence par le titre
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

        $imgArticle = null;
        if (isset($_FILES['imgArticle']) && $_FILES['imgArticle']['error'] == 0) {
            if ($_FILES['imgArticle']['size'] <= 5000000) {
                $fileInfo = pathinfo($_FILES['imgArticle']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                if (in_array($extension, $allowedExtensions)) {
                    move_uploaded_file($_FILES['imgArticle']['tmp_name'],
                        '/Applications/MAMP/htdocs/AppBlog/public/img/uploads/' . basename($_FILES['imgArticle']['name']));
                }
            }
            $imgArticle = $_FILES['imgArticle'];
        }

        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$title || !$slug || !$author || !$extrait || !$content || !$imgArticle) {
            die("Votre formulaire a été mal rempli !");
        }

        //Insertion de l'article
        $id = $this->model->insert($title, $slug, $author, $extrait, $content, $imgArticle);
        //Redirection vers l'article en question :
        $this->redirect("index.php?controller=article&task=show&id=" . $id);
    }

    public function UpdateArticle(): void
    {
        $id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        $article = $this->model->find($id);
        $this->render('articles/updateArticle', ['article' => $article]);
    }

    public function update()
    {

        $id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        $article = $this->model->find($id);

        if (!empty($_POST['title'])) {
            $article->setTitle($_POST['title']);
        }

        $slug = null;
        if (!empty($_POST['slug'])) {
            $article->setSlug($_POST['slug']);
        }

        $author = null;
        if (!empty($_POST['author'])) {
            $article->setAuthor($_POST['author']);
        }

        $extrait = null;
        if (!empty($_POST['extrait'])) {
            $article->setExtrait($_POST['extrait']);
        }

        $content = null;
        if (!empty($_POST['content'])) {
            $article->setContent(htmlspecialchars($_POST['content']));
        }

        //mofification de l'article
        $this->model->update($article);

        //Redirection vers l'article en question :
        $pageTitle = $article->getTitle();
        $this->redirect('index.php?controller=article&task=updateArticle&id=' . $article->getId());
    }

}