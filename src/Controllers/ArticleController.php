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
        $articles = $this->model->findAll("createdAt DESC");
        $pageTitle = "Blog";
        $this->render('blog', [
            'pageTitle' => $pageTitle,
            'articles' => $articles
        ]);
    }

    public function show(int $id)
    {
        $article = $this->model->find($id);
        $comments = $this->commentRepository->findAllWithArticle($article->getId());
        $pageTitle = $article->getTitle();
        $this->render('showArticle', [
            'pageTitle' => $pageTitle,
            'article' => $article,
            'comments' => $comments
        ]);
    }

    public function delete($id)
    {
        $article = $this->model->find($id);
        if (!$article) {
            die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }
        if (file_exists('./img/uploads/' . $article->getImgArticle())) {
            unlink('./img/uploads/' . $article->getImgArticle());
        }
            var_dump($article->getImgArticle());
        $articleId = $id;
        $this->model->delete($id);
        $this->commentRepository->deleteByArticleId($articleId);
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
            if ($_FILES['imgArticle']['size'] <= 500000) {
                $fileInfo = pathinfo($_FILES['imgArticle']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['JPG', 'JPEG', 'PNG', 'GIF', 'jpg', 'jpeg', 'gif', 'png'];
                $uniqueName = uniqid('img', true);
                if (in_array($extension, $allowedExtensions)) {
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $mime_type = finfo_file($finfo, $_FILES['imgArticle']['tmp_name']);
                    finfo_close($finfo);

                    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    if (in_array($mime_type, $allowedMimeTypes)) {
                    move_uploaded_file($_FILES['imgArticle']['tmp_name'],
                        './img/uploads/' . basename($uniqueName) . '.' . $extension);
            $imgArticle = $uniqueName . '.' . $extension;
                    } else {
                        die('Erreur : ');
                    }
                }
            }
        }
        if (!$title || !$slug || !$author || !$extrait || !$content || !$imgArticle) {
            die("Erreur !");
        }
        $id = $this->model->insert($title, $slug, $author, $extrait, $content, $imgArticle);
        $this->redirect("/blog/article/" . $id);
    }

    public function update($id)
    {
        $article = $this->model->find($id);
        if (!empty($_POST['title'])) {
            htmlspecialchars($article->setTitle($_POST['title']));
        }
        if (!empty($_POST['slug'])) {
            htmlspecialchars($article->setSlug($_POST['slug']));
        }
        if (!empty($_POST['author'])) {
            htmlspecialchars($article->setAuthor($_POST['author']));
        }
        if (!empty($_POST['extrait'])) {
            htmlspecialchars($article->setExtrait($_POST['extrait']));
        }
        if (!empty($_POST['content'])) {
            htmlspecialchars($article->setContent(htmlspecialchars($_POST['content'])));
        }
        if (!empty($_POST['imgArticle'])) {
            $article->setImgArticle($_POST['imgArticle']);
        }
        $this->model->update($article);
        $this->redirect('/blog/article/' . $article->getId());
    }

    public function updateArticle($article)
    {
        $article = $this->model->find($article);
        $this->render('update', ['article' => $article]);
    }
}