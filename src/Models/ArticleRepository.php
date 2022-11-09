<?php

namespace App\Models;

class ArticleRepository extends AbstractRepository
{
    protected $table = "articles";

    public function insert(string $title, string $slug, string $author, string $extrait, string $content, $imgArticle): int
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET title = :title, slug = :slug, author = :author, extrait = :extrait, content = :content, imgArticle = :imgArticle, createdAt = NOW()");
        $query->execute([
            'title' => $title,
            'slug' => $slug,
            'author' => $author,
            'extrait' => $extrait,
            'content' => $content,
            'imgArticle' => $imgArticle
        ]);

        return $this->pdo->lastInsertId();
    }

    public function find(int $id): Article
    {
        $articleArray = parent::find($id);

        return $this->hydrate($articleArray);
    }

    public function findAll(?string $order = "", int $limit = null): array
    {
        $articlesArray = parent::findAll($order, $limit);
        $articles = [];
        foreach ($articlesArray as $articleArray) {
            $articles[] = $this->hydrate($articleArray);
        }

        return $articles;
    }

    public function update(Article $article): bool
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET title = :title, slug = :slug, author = :author, extrait = :extrait, content = :content, imgArticle = :imgArticle WHERE id = :id");
        return $query->execute([
            'title' => $article->getTitle(),
            'slug' => $article->getSlug(),
            'author' => $article->getAuthor(),
            'extrait' => $article->getExtrait(),
            'content' => $article->getContent(),
            'imgArticle' => $article->getImgArticle(),
            'id' => $article->getId()
        ]);
    }

    private function hydrate(array $articleArray): Article
    {
        $article = new Article();
        $article->setId($articleArray['id']);
        $article->setTitle($articleArray['title']);
        $article->setSlug($articleArray['slug']);
        $article->setAuthor($articleArray['author']);
        $article->setExtrait($articleArray['extrait']);
        $article->setContent($articleArray['content']);
        $article->setImgArticle($articleArray['imgArticle']);
        $article->setCreatedAt($articleArray['createdAt']);

        return $article;
    }
}