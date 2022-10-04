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
        $comments = [];
        foreach ($commentsArray as $commentArray) {
            $comment = new Comment();
            $comment->setId($commentArray['id']);
            $comment->setAuthor($commentArray['author']);
            $comment->setContent($commentArray['content']);
            $comment->setCreatedAt($commentArray['createdAt']);
            $comment->setArticleId($articleId);
            $comments[]= $comment;
        }
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
        $comment->setCreatedAt($commentArray['createdAt']);
        return $comment;
    }

    public function update(Comment $comment): bool
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET :author, :content, :articleId, :createdAt WHERE :id");
        return $query->execute([$comment->getAuthor(), $comment->getContent(), $comment->getArticleId(), $comment->getCreatedAt(), $comment->getId()]);
    }
}