<?php
namespace App\Models;

class ArticleRepository extends AbstractRepository
{
    protected $table = "articles";

    public function insert(string $title, string $slug, string $author, string $extrait, string $content)
    {
        $query = $this->pdo->prepare('INSERT INTO articles SET title = :title, slug = :slug, author = :author, extrait = :extrait, content = :content, createdAt = NOW()');
        $query->execute(compact('title', 'slug', 'author', 'extrait', 'content'));
    }

    public function find(int $id): Article
    {
        $articleArray = parent::find($id);
        $article = new Article();
        $article->setId($articleArray['id']);
        $article->setTitle($articleArray['title']);
        $article->setSlug($articleArray['slug']);
        $article->setAuthor($articleArray['author']);
        $article->setExtrait($articleArray['extrait']);
        $article->setContent($articleArray['content']);
        $article->setCreatedAt($articleArray['createdAt']);

        return $article;
    }

    public function update(Article $article): bool
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET title, slug, author, extrait, content WHERE id");
        return $query->execute([$article->getId(), $article->getTitle(), $article->getSlug(), $article->getAuthor(), $article->getExtrait(), $article->getContent()]);
    }
}