<?php

namespace AppBlog\Controllers;

use AppBlog\Models\Article;
use AppBlog\Models\Comment;
use AppBlog\Models\ArticleRepository;
use AppBlog\Models\CommentRepository;

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
        $this->render('blog', [
            'pageTitle' => $pageTitle,
            'articles' => $articles
        ]);
    }

    public function show(int $id)
    {
        //Récupération de l'article en question
        $article = $this->model->find($id);

        //Récupération des commentaires de l'article en question
        $comments = $this->commentRepository->findAllWithArticle($article->getId());
        //On affiche
        $pageTitle = $article->getTitle();
        $this->render('showArticle', [
            'pageTitle' => $pageTitle,
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function delete($id)
    {
        //Vérification que l'article existe bel et bien
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        if (file_exists('./img/uploads/' . $article->getImgArticle())) {
            unlink('./img/uploads/' . $article->getImgArticle());
        }

            var_dump($article->getImgArticle());
        $articleId = $id;
        //Réelle suppression de l'article
        $this->model->delete($id);
        $this->commentRepository->deleteByArticleId($articleId);

        //Redirection vers la page du blog
        $this->redirect('/dashboard');
    }

    public function insert()
    {
        $title = null;
        if (!empty($_POST['title'])) {
            $title = htmlspecialchars($_POST['title']);
        }

        $slug = null;
        if (!empty($_POST['slug'])) {
            $slug = htmlspecialchars($_POST['slug']);
        }

        $author = null;
        if (!empty($_POST['author'])) {
            $author = htmlspecialchars($_POST['author']);
        }

        $extrait = null;
        if (!empty($_POST['extrait'])) {
            $extrait = htmlspecialchars($_POST['extrait']);
        }

        $content = null;
        if (!empty($_POST['content'])) {
            $content = htmlspecialchars($_POST['content']);
        }

        $imgArticle = null;
        if (isset($_FILES['imgArticle']) && $_FILES['imgArticle']['error'] == 0) {
            if ($_FILES['imgArticle']['size'] <= 5000000) {
                $fileInfo = pathinfo($_FILES['imgArticle']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['JPG', 'JPEG', 'PNG', 'GIF', 'jpg', 'jpeg', 'gif', 'png'];
                $uniqueName = uniqid('img', true);
                if (in_array($extension, $allowedExtensions)) {
                    move_uploaded_file($_FILES['imgArticle']['tmp_name'],
                        './img/uploads/' . basename($uniqueName) . '.' . $extension);
                }
            }
            $imgArticle = $uniqueName . '.' . $extension;
        }

        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$title || !$slug || !$author || !$extrait || !$content || !$imgArticle) {
            die("Votre formulaire a été mal rempli !");
        }

        //Insertion de l'article
        $id = $this->model->insert($title, $slug, $author, $extrait, $content, $imgArticle);
        //Redirection vers l'article en question :
        $this->redirect("/blog/article/" . $id);
    }

    public function update($id)
    {
        $article = $this->model->find($id);

        $title = null;
        if (!empty($_POST['title'])) {
            htmlspecialchars($article->setTitle($_POST['title']));
        }

        $slug = null;
        if (!empty($_POST['slug'])) {
            htmlspecialchars($article->setSlug($_POST['slug']));
        }

        $author = null;
        if (!empty($_POST['author'])) {
            htmlspecialchars($article->setAuthor($_POST['author']));
        }

        $extrait = null;
        if (!empty($_POST['extrait'])) {
            htmlspecialchars($article->setExtrait($_POST['extrait']));
        }

        $content = null;
        if (!empty($_POST['content'])) {
            htmlspecialchars($article->setContent(htmlspecialchars($_POST['content'])));
        }

        $imgArticle = null;
        if (!empty($_POST['imgArticle'])) {
            $article->setImgArticle($_POST['imgArticle']);
        }

        //mofification de l'article
        $this->model->update($article);
        //Redirection vers l'article en question :
        $this->redirect('/blog/article/' . $article->getId());
    }

    public function updateArticle($article)
    {
        $article = $this->model->find($article);
        $this->render('update', ['article' => $article]);
    }
}