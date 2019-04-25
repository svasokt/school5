<?php

interface UserRepositoryInterface
{
    public function addUser(User $user);
    public function getAllUsers();
    public function findUserById($id);
}
