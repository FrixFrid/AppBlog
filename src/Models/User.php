<?php

namespace AppBlog\Models;

class User
{
    private int $id;
    private string $username;
    private string $email;
    private string $mdp;
    private bool $is_admin;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     */
    public function setMdp(string $mdp): void
    {
        $this->mdp = $mdp;
    }

    /**
     * @return bool
     */
    public function getIsAdmin(): bool
    {
        return $this->is_admin;
    }

    /**
     * @param bool $is_admin
     */
    public function setIsAdmin($is_admin): void
    {
        $this->is_admin = $is_admin;
    }
}