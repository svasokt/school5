<?php
/*
Для реализации публикации/подписки на поведение объекта, всякий раз, когда
объект «Subject» меняет свое состояние, прикрепленные объекты «Observers»
будут уведомлены. Паттерн используется, чтобы сократить количество связанных
напрямую объектов и вместо этого использует слабую связь (loose coupling).
 */


error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("Championship.php");
require_once("Teams.php");

        $newLocation = 'Barcelona';
        $championship = new Championship();
        $user = new Teams();
        $user2 = new Teams();
        $user3 = new Teams();


        $championship->addTeam($user);
        $championship->addTeam($user2);
        $championship->addTeam($user3);


        $championship->changedLocation($newLocation);
//        $championship->removeTeam($user2);
//        var_dump($championship->checkTeams())



?>