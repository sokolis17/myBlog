<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой Блог</title>
    <!-- Подключаем Bootstrap (готовый дизайн) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Навигация (Меню) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">📢 SuperBlog</a>
    
    <div class="navbar-nav ms-auto">
        <a class="nav-link" href="index.php">Главная</a>
        
        <?php if(isset($_SESSION['user_id'])): ?>
            <!-- Если вошли: Показываем кнопку "Выйти" и "Админка" -->
            <a class="nav-link" href="#">👤 <?php echo $_SESSION['username']; ?></a>
            <a class="nav-link btn btn-danger text-white btn-sm" href="logout.php">Выход</a>
        <?php else: ?>
            <!-- Если НЕ вошли: Показываем "Вход" и "Регистрация" -->
            <a class="nav-link" href="login.php">Вход</a>
            <a class="nav-link" href="register.php">Регистрация</a>
        <?php endif; ?>
    </div>
  </div>
</nav>

<div class="container"> <!-- Начало основного контента -->