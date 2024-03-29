<?php

namespace AppBlog\Models;

use AppBlog\Models\bdd\Database;

abstract class AbstractRepository
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function findAll(?string $order = "", int $limit = null): array
    {
        $sql = "SELECT * FROM {$this->table} ";
        if ($order) {
            $sql .= " ORDER BY " . $order;
        }
        if ($limit) {
            $sql .= " LIMIT " . $limit;
        }
        $results = $this->pdo->query($sql);

        return $results->fetchAll();
    }

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}



