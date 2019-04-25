<?php

class UserRepository implements UserRepositoryInterface
{
    protected $users = [];

    public function addUser(\User $user)
    {
        $this->users[$user->getId()] = $user;
    }

    public function getAllUsers()
    {
        return $this->users;
    }

    public function findUserById($id)
    {
        $result = 'user not found';

        if (isset($this->users[$id])){
            $result = $this->users[$id];
        }

        return $result;
    }
}

