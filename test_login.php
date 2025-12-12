<?php

session_start();

require_once __DIR__.'/classes/Database.php';
require_once __DIR__.'/classes/User.php';

$db = new Database;

$pdo = $db->getConnection();

$Igor = new User($pdo);

$userData = $Igor->login('morph@matrix.com', 'red_pill');


if ($userData) {
    // Вход успешен!
    $_SESSION['user'] = $userData;
    echo "✅ Привет, " . $_SESSION['user']['username'];
} else {
    // Вход провален
    echo "❌ Ошибка: Неверный логин или пароль";
}