<?php
namespace App\Models;

class ArticleRepository extends AbstractRepository
{
    protected $table = "articles";

    public function insert(string $title, string $slug, string $author, string $extrait, string $content)
    {
        $query = $this->pdo->prepare('INSERT INTO articles SET title = :title, slug = :slug, author = :author, extrait = :extrait, content = :content, created_at = NOW()');
        $query->execute(compact('title', 'slug', 'author', 'extrait', 'content'));
    }

    public function update(int $id, string $title, string $slug, string $author, string $extrait, string $content)
    {
        $query = $this->pdo->prepare('UPDATE articles SET title = :title, slug = :slug, author = :author, extrait = :extrait, content = :content WHERE id = :id');
        $query->execute(compact('id', 'title', 'slug', 'author', 'extrait', 'content'));
    }

    public function find(int $id): Article
    {
        $articleArray = parent::find($id);
        var_dump($articleArray);
        $article = new Article();
        $article->setId($articleArray['id']);
        $article->setTitle($articleArray['title']);
        var_dump($article);
        return $article;
    }
}