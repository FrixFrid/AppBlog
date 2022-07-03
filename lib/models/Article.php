<?php
namespace Models;

class Article extends Model
{
    protected $table = "articles";

    public function insert(string $title, string $slug, string $author, string $extract, $content): void
    {
        $query = $this->pdo->prepare('INSERT INTO articles SET title = :title, slug = :slug, author = :author, extract = :extract, content = :content, created_at = NOW()');
        $query->execute(compact('title', 'slug', 'author', 'extract', 'content'));
    }
}