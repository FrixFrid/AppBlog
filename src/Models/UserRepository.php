<?php

namespace AppBlog\Models;

class UserRepository extends AbstractRepository
{
    protected $table = "users";

    public function findUser(int $id): User
    {
        $userArray = parent::find($id);
        return $this->hydrate($userArray);
    }

    private function hydrate(array $userArray): User
    {
        $user = new User();
        $user->setId($userArray['id']);
        $user->setUsername($userArray['username']);
        $user->setEmail($userArray['email']);
        $user->setMdp($userArray['mdp']);
        $user->setIsAdmin($userArray['is_admin']);
        return $user;
    }

    public function findAllUser(): array
    {
        $usersArray = parent::findAll();
        $users = [];
        foreach ($usersArray as $userArray) {
            $user = $this->hydrate($userArray);
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

    public function findUserLogin(string $email): User
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $query->execute(['email' => $email]);
        $userArray = $query->fetch();
        return $this->hydrate($userArray);
    }
}