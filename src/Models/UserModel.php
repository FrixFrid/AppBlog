<?php
namespace App\Models;

class UserModel extends Model
{
    protected $table = "users";

    public function insert(string $username, string $email, string $mdp): void
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET username = :username, email = :email, mdp = :mdp");
        $query->execute(compact('username', 'email', 'mdp'));
    }

    public function findUser(string $email)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $email ]);
        $user = $query->fetch();
        return $user;
    }




}