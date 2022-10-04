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

    public function findUser(int $id): User
    {
        $userArray = parent::find($id);
        $user = new User();
        $user->setUsername(['username']);
        $user->setEmail(['email']);
        $user->setMdp(['mdp']);
        return $user;
    }

    public function update(User $user): bool
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET :username, :email, :mdp, WHERE :id");
        return $query->execute([$user->getUsername(), $user->getEmail(), $user->getMdp(), $user->getId()]);
    }
}