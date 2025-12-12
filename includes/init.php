<?php
// 1. Запускаем сессию (всегда первая строчка)
session_start();

// 2. Подключаем классы
// __DIR__ — это папка, где лежит этот файл. Мы выходим на уровень вверх (..) и заходим в classes
require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/User.php';

// 3. Создаем подключение к БД
$database = new Database();
$pdo = $database->getConnection();

// 4. Создаем объект User (он пригодится на всех страницах)
$user = new User($pdo);

// Функция для красивого вывода ошибок (по желанию, для отладки)
function dd($data) {
    echo '<pre>'; print_r($data); echo '</pre>'; die();
}