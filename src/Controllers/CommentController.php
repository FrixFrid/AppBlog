<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\ArticleRepository;
use App\Models\CommentRepository;

class CommentController extends Controller
{
    protected CommentRepository $commentRepository;

    public function __construct()
    {
        $this->model = new CommentRepository();
        $this->articleRepository = new ArticleRepository();
    }

    public function insert()
    {
        $this->model->insert = new ArticleRepository();

        $author = null;
        if (!empty($_POST['author'])) {
            $author = $_POST['author'];
        }

        $content = null;
        if (!empty($_POST['content'])) {
            $content = htmlspecialchars($_POST['content']);
        }

        $is_validate = false;
        if (isset($_POST['is_validate'])) {
            $is_validate = true;
        }

        $articleId = null;
        if (!empty($_POST['articleId']) && ctype_digit($_POST['articleId'])) {
            $articleId = $_POST['articleId'];
        }

        if (!$author || !$articleId || !$content) {
            die("Votre formulaire a été mal rempli !");
        }

        $article = $this->model->find($articleId);

        if (!$article) {
            die("Ho ! L'article $articleId n'existe pas !");
        }

        $this->model->insert($author, $content, $is_validate, $articleId);
        $this->redirect("index.php?controller=article&task=show&id=" . $articleId);
    }

    public function validate() {
        $comments = $this->model->findAll("createdAt");
        $this->render('dashboard', ['commentsPending' => $comments]);
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
        $this->redirect("index.php?controller=user&task=show&id=" . $comment->getArticleId());
    }
}





