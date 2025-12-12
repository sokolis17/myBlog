<?php
// 1. Подключаем "Мозг" (инициализацию)
require_once 'includes/init.php';

// 2. Подключаем "Шапку" (HTML)
require_once 'includes/header.php';
?>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Добро пожаловать в Блог!</h1>
        <p class="col-md-8 fs-4">Здесь мы пишем о коде, базах данных и жизни.</p>
        
        <?php if(!isset($_SESSION['user_id'])): ?>
            <a class="btn btn-primary btn-lg" href="register.php" role="button">Создать аккаунт</a>
        <?php else: ?>
            <a class="btn btn-success btn-lg" href="create_post.php" role="button">Написать пост</a>
        <?php endif; ?>
    </div>
</div>

<h2>Свежие записи</h2>
<p>Пока здесь пусто, но скоро появятся посты...</p>

<?php
// 3. Подключаем "Подвал"
require_once 'includes/footer.php';
?>