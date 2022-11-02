<?php

namespace App\Models;

class CommentRepository extends AbstractRepository
{
    protected $table = "comments";

    public function findAllWithArticle(int $articleId): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE articleId = :articleId");
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
            $comments[] = $comment;
        }

        return $comments;
    }

    public function insert(string $author, string $content, string $articleId): void
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET author = :author, content = :content, articleId = :articleId, createdAt = NOW()");
        $query->execute([
            'author' => $author,
            'content' => $content,
            'articleId' => $articleId
        ]);
    }

    public function find(int $id): Comment
    {
        $commentArray = parent::find($id);
        $comment = new Comment();
        $comment->setId($commentArray['id']);
        $comment->setAuthor($commentArray['author']);
        $comment->setContent($commentArray['content']);
        $comment->setCreatedAt($commentArray['createdAt']);
        $comment->setArticleId($commentArray['articleId']);

        return $comment;
    }

    public function update(Comment $comment): bool
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET :author, :content, :createdAt, :articleId WHERE :id");
        return $query->execute([
            $comment->getId(),
            $comment->getAuthor(),
            $comment->getContent(),
            $comment->getCreatedAt(),
            $comment->getArticleId()
        ]);
    }
}