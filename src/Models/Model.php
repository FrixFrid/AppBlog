<?php
namespace App\Models;


use App\Database;

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }


    public function findAll(?string $order = "", int $limit = null ): array
    {
        $sql = "SELECT * FROM {$this->table} ";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }
        if ($limit) {
            $sql .= " LIMIT " . $limit;
        }
        $resultats = $this->pdo->query($sql);
        $article = $resultats->fetchAll();


        return $article;
    }


    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();

        return $item;
    }


    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}
