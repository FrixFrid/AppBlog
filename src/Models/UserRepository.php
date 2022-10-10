<?php
namespace App\Models;

class UserRepository extends AbstractRepository
{
    protected $table = "users";

    public function findUser(int $id): User
    {
        $userArray = parent::find($id);
        $user = new User();
        $user->setId($userArray['id']);
        $user->setUsername($userArray['username']);
        $user->setEmail($userArray['email']);
        $user->setMdp($userArray['mdp']);
        return $user;
    }

    public function insert(string $username, string $email, string $mdp): void
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET username = :username, email = :email, mdp = :mdp");
        $query->execute(compact('username', 'email', 'mdp'));
    }

    public function update(User $user): bool
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET :id, :username, :email, :mdp, WHERE :id");
        return $query->execute([$user->getId(),$user->getUsername(), $user->getEmail(), $user->getMdp()]);
    }

    public function findUserLogin(string $email)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $query->execute(['email' => $email]);
        return $query->fetch();
    }
}