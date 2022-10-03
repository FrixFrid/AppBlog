<?php
namespace App\Models;

class UserRepository extends AbstractRepository
{
    protected $table = "users";

    public function insert(string $username, string $email, string $mdp): void
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET username = :username, email = :email, mdp = :mdp");
        $query->execute(compact('username', 'email', 'mdp'));
    }

    public function findUser(string $email, string $username, string $mdp)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $email]);
        $query->execute(['username' => $username]);
        $query->execute(['mdp' => $mdp]);
        $user = $query->fetch();
        return $user;
    }




}