<?php

namespace AppBlog\Models;

class   CommentRepository extends AbstractRepository
{
    protected $table = "comments";

    public function findAllWithArticle(int $articleId): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE articleId = :articleId AND is_validate = true");
        $query->execute(['articleId' => $articleId]);
        $commentsArray = $query->fetchAll();
        $comments = [];
        foreach ($commentsArray as $commentArray) {
            $comment = new Comment();
            $comment->setId($commentArray['id']);
            $comment->setAuthor($commentArray['author']);
            $comment->setContent($commentArray['content']);
            $comment->setEmail($commentArray['email']);
            $comment->setCreatedAt($commentArray['createdAt']);
            $comment->setIsValidate($commentArray['is_validate']);
            $comment->setArticleId($articleId);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function insert(string $author, string $content, string $email, int $articleId, bool $is_validate)
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET author = :author, content = :content, email = :email, articleId = :articleId, is_validate = :is_validate, createdAt = NOW()");
        $query->execute([
            'author' => $author,
            'content' => $content,
            'email' => $email,
            'articleId' => $articleId,
            'is_validate' => (int)$is_validate
        ]);
    }

    public function find(int $id): Comment
    {
        $commentArray = parent::find($id);
        if(empty($commentArray)) throw new \Exception("Comment not found with id : $id");
        $comment = new Comment();
        $comment->setId($commentArray['id']);
        $comment->setAuthor($commentArray['author']);
        $comment->setContent($commentArray['content']);
        $comment->setEmail($commentArray['email']);
        $comment->setCreatedAt($commentArray['createdAt']);
        $comment->setIsValidate($commentArray['is_validate']);
        $comment->setArticleId($commentArray['articleId']);
        return $comment;
    }

    public function updateComment($comment)
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET :author, :content, :createdAt, :email, :getIsValidate, :articleId WHERE :id");
        return $query->execute([
            $comment->getAuthor(),
            $comment->getContent(),
            $comment->getEmail(),
            $comment->getCreatedAt(),
            $comment->getIsValidate(),
            $comment->getArticleId()
        ]);
    }

    public function validateComment(int $id)
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET is_validate = true WHERE id = :id");
        return $query->execute([
            'id' => $id
        ]);
    }

    public function findNotValidated()
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE is_validate = false");
        $query->execute([]);
        $commentsArray = $query->fetchAll();
        $comments = [];
        foreach ($commentsArray as $commentArray) {
            $comment = new Comment();
            $comment->setId($commentArray['id']);
            $comment->setAuthor($commentArray['author']);
            $comment->setContent($commentArray['content']);
            $comment->setEmail($commentArray['email']);
            $comment->setCreatedAt($commentArray['createdAt']);
            $comment->setIsValidate($commentArray['is_validate']);
            $comment->setArticleId($commentArray['articleId']);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function deleteByArticleId($articleId) {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE articleId = :articleId");
        $query->bindValue(":articleId", $articleId);
        return $query->execute();
    }
}