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
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $content = htmlspecialchars($_POST['content']);
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
            die("Ho ! L'article $articleId n'existe pas boloss !");
        }

        $this->model->insert($author, $content, $articleId);
        $this->redirect("index.php?controller=article&task=show&id=" . $articleId);
    }

    public function delete()
    {
        if (empty($_GET['id']) && !ctype_digit($_GET['id'])) {
            die("Ho ! Fallait préciser le paramètre id en GET !");
        }

        $id = $_GET['id'];
        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        $this->model->delete($id);
        $this->redirect("index.php?controller=article&task=show&id=" . $commentaire->getArticleId());
    }

}





