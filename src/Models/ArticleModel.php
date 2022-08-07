<?php
namespace App\Models;

class ArticleModel extends Model
{
    protected $table = "articles";

    public function insert(string $title, string $slug, string $author, string $extrait, string $content,string $imgArticle)
    {
        $query = $this->pdo->prepare('INSERT INTO articles SET title = :title, slug = :slug, author = :author, extrait = :extrait, content = :content, img = :imgArticle, created_at = NOW()');
        $query->execute(compact('title', 'slug', 'author', 'extrait', 'content', 'imgArticle'));
    }

    public function update(int $id, string $title, string $slug, string $author, string $extrait, string $content)
    {
        $query = $this->pdo->prepare('UPDATE articles SET title = :title, slug = :slug, author = :author, extrait = :extrait, content = :content WHERE id = :id');
        $query->execute(compact('id', 'title', 'slug', 'author', 'extrait', 'content'));
    }
}