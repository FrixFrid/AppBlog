<?php

namespace AppBlog\Controllers;

use AppBlog\Models\Article;
use AppBlog\Models\Comment;
use AppBlog\Models\ArticleRepository;
use AppBlog\Models\CommentRepository;

class CommentController extends Controller
{
    protected CommentRepository $commentRepository;

    public function __construct()
    {
        $this->model = new CommentRepository();
        $this->commentRepository = new CommentRepository();
    }

    public function insert()
    {
        $author = null;
        if (!empty($_POST['author'])) {
            $author = $_POST['author'];
        }

        $content = null;
        if (!empty($_POST['content'])) {
            $content = htmlspecialchars($_POST['content']);
        }

        $articleId = null;
        if (!empty($_POST['articleId']) && ctype_digit($_POST['articleId'])) {
            $articleId = $_POST['articleId'];
        }

        if (!$author || !$articleId || !$content) {
            die("Votre formulaire a été mal rempli !");
        }

        $is_validate = false;
        if (isset($is_validate)) {
            $is_validate = (isset($_POST['is_validate']) && $_POST['is_validate'] === '1');
            var_dump($is_validate);
            die();
        }


        try {
            $article = $this->model->findAllWithArticle($articleId);
        } catch (\Exception $e) {
            die("Error :" . $e->getMessage());
        }

        if (!$articleId) {
            die("Ho ! L'article $articleId n'existe pas !");
        }

        $this->model->insert($author, $content, $articleId, $is_validate);
        $this->redirect("/blog/article/" . $articleId);
    }

    public function delete()
    {
        if (empty($_GET['id']) && !ctype_digit($_GET['id'])) {
            die("Erreur !");
        }

        $id = $_GET['id'];
        $comment = $this->model->find($id);
        if (!$comment) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        $this->model->delete($id);
        $this->redirect("index.php?controller=user&task=dashboard");
    }

    public function validateComment()
    {
        if (empty($_GET['id']) && !ctype_digit($_GET['id'])) {
            die("Erreur !");
        }

        $id = $_GET['id'];
        $comment = $this->model->find($id);
        if (!$comment) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }
        $this->model->validateComment($comment);
        $this->redirect("/dashboard");
    }
}







