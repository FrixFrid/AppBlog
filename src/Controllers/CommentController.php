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
            $author = htmlspecialchars($_POST['author']);
        }

        $content = null;
        if (!empty($_POST['content'])) {
            $content = htmlspecialchars($_POST['content']);
        }

        $email = null;
        if (!empty($_POST['email'])) {
            $email = htmlspecialchars(($_POST['email']));
        }

        $articleId = null;
        if (!empty($_POST['articleId']) && ctype_digit($_POST['articleId'])) {
            $articleId = intval($_POST['articleId']);
        }


        if (!$author || !$content || !$email || !$articleId) {
            die("Votre formulaire a été mal rempli !");
        }

        $is_validate = false;
        if (!isset($is_validate)) {
            $is_validate = (isset($_POST['is_validate']) && $_POST['is_validate'] === '1');
        }

        try {
            $this->model->findAllWithArticle($articleId);
        } catch (\Exception $e) {
            die("Error :" . $e->getMessage());
        }

        $this->model->insert($author, $content, $email, $articleId, $is_validate);
        $this->redirect("/blog/article/" . $articleId);
    }

    public function delete($id)
    {
        $comment = $this->model->findNotValidated();
        if (!$comment) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }

        $this->model->delete($id);
        $this->redirect("/dashboard");
    }

    public function validateComment($id)
    {
        $comment = $this->model->findNotValidated();
        if (!$comment) {
            die("Aucun commentaire n'a l'identifiant $id !");
        }
        $this->model->validateComment($id);
        $this->redirect("/dashboard");
    }
}







