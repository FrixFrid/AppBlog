<?php
namespace App\Models;

class CommentRepository extends AbstractRepository
{
    protected $table = "comments";

    public function findAllWithArticle(int $article_id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }

    public function insert(string $author, string $content, string $article_id): void
    {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }

    public function find(int $article_id): Comment
    {
        $commentArray = parent::find($article_id);
        $comment = new Comment();
        $comment->setArticleId($commentArray['article_id']);
        $comment->setAuthor($commentArray['author']);
        return $comment;
    }
}