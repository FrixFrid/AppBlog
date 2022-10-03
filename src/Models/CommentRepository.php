<?php
namespace App\Models;

class CommentRepository extends AbstractRepository
{
    protected $table = "comments";

    public function findAllWithArticle(int $articleId): array
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE articleId = :articleId");
        $query->execute(['articleId' => $articleId]);
        $commentsArray = $query->fetchAll();
        var_dump($commentsArray);
        $comments = [];
        foreach ($commentsArray as $commentArray) {
            $comment = new Comment();
            $comment->setAuthor('author');
            $comment->setContent('content');
            $comment->setArticleId($articleId);
            $comments[]= $comment;
        }
        var_dump($comments);
        return $comments;
    }

    public function insert(string $author, string $content, string $articleId): void
    {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, articleId = :articleId, createdAt = NOW()');
        $query->execute(compact('author', 'content', 'articleId'));
    }

    public function find(int $articleId): Comment
    {
        $commentArray = parent::find($articleId);
        $comment = new Comment();
        $comment->setArticleId($commentArray['articleId']);
        $comment->setAuthor($commentArray['author']);
        return $comment;
    }
}