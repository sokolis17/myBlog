<?php
// 1. Подключаем настройки (там есть session_start)
require_once 'includes/init.php';

// 2. Очищаем массив сессии
$_SESSION = [];

// 3. Уничтожаем сессию на сервере
session_destroy();

// 4. Перекидываем на главную
header("Location: index.php");
exit;