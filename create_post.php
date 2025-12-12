<?php
require_once 'includes/init.php';

// 🛡 ЗАЩИТА: Если юзер не вошел — выгоняем его!
if (!isset($_SESSION['user_id'])) {
    // Редирект на вход с сообщением
    header("Location: login.php");
    exit;
}

require_once 'includes/header.php';
?>

<div class="container mt-5">
    <h1>📝 Новый пост</h1>
    <p>Привет, <?php echo $_SESSION['username']; ?>! Пиши что хочешь.</p>
</div>

<?php require_once 'includes/footer.php'; ?>