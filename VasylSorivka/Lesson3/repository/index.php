<?php

require_once 'User.php';
require_once 'UserRepositoryInterface.php';
require_once 'UserRepository.php';

$userRepository = new UserRepository();
$user1 = new User(1, 'user1', 'kiev');

$userRepository->addUser($user1);
echo '<pre>';
print_r($userRepository->getAllUsers());
echo '</pre>';

$user2 = new User(2, 'user2', 'paris');
$user3 = new User(3, 'user3', 'roma');

$userRepository->addUser($user2);
$userRepository->addUser($user3);
echo '<pre>';
print_r($userRepository->getAllUsers());
echo '</pre>';

echo '<pre>';
print_r($userRepository->findUserById(3));
echo '</pre>';


