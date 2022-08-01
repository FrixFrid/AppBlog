<?php
namespace App\Models;

class UserModel extends Model
{
    protected $table = "users";

    public function insert(string $username, string $email, string $mdp, bool $isAdmin): void
    {
        $isAdminInt = $isAdmin ? 1 : 0;
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET username = :username, email = :email, mdp = :mdp, is_admin = :isAdminInt");
        $query->execute(compact('username', 'email', 'mdp', 'isAdminInt'));
    }

    public function findUser(string $email)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $email ]);
        $user = $query->fetch();
        return $user;
    }




}