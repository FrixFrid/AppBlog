<?php

namespace AppBlog\Models;

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
        $user->setIsAdmin($userArray['is_admin']);
        return $user;
    }

    public function findAllUser()
    {
        $usersArray = parent::findAll();
        $users = [];
        foreach ($usersArray as $userArray) {
            $user = new User();
            $user->setId($userArray['id']);
            $user->setUsername($userArray['username']);
            $user->setEmail($userArray['email']);
            $user->setMdp($userArray['mdp']);
            $user->setIsAdmin($userArray['is_admin']);
            $users[] = $user;
        }
        return $users;
    }

    public function insert(string $username, string $email, string $mdp, bool $is_admin): void
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET username = :username, email = :email, mdp = :mdp, is_admin = :is_admin");
        $query->execute([
            'username' => $username,
            'email' => $email,
            'mdp' => $mdp,
            'is_admin' => (int)$is_admin
        ]);
    }

    public function updateUser(User $user): bool
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET :id, :username, :email, :mdp, WHERE :id");
        return $query->execute([
            $user->getId(),
            $user->getUsername(),
            $user->getEmail(),
            $user->getMdp(),
            $user->getIsAdmin()
        ]);
    }

    public function findUserLogin(string $email)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $query->execute(['email' => $email]);
        return $query->fetch();
    }
}