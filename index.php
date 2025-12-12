<?php

require_once __DIR__.'/classes/Database.php';
require_once __DIR__.'/classes/User.php';

$db = new Database;

$pdo = $db->getConnection();

$User1 = new User($pdo);


$log = $User1->login('morph@matrix.com','red_pill');
echo $log;
