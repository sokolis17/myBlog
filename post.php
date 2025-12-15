<?php

require_once __DIR__.'/includes/init.php';

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        die("❌ Ошибка: Некорректный ID поста.");
}
$sql = "SELECT posts.*,users.username,categories.name FROM posts JOIN users ON posts.user_id = users.id JOIN categories ON posts.category_id = categories.id
WHERE posts.id = :id AND is_published = true";
$stmt = $pdo->prepare($sql);

$post_id = $_GET['id'];

try{
$stmt->execute([':id' => $post_id]);
}catch(PDOException $e){
    echo "Ошибка: ".$e->getMessage();
}
$post = $stmt->fetch(); 



if (!$post) {
    die("❌ Ошибка 404: Пост не найден.");
}
require_once 'includes/header.php';
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <!-- Кнопка Назад -->
            <a href="index.php" class="btn btn-outline-secondary mb-3">← На главную</a>

            <div class="card shadow-sm">
                <!-- Картинка-заглушка (по желанию, можно убрать) -->
                <!-- <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="..."> -->

                <div class="card-body">
                    
                    <!-- Категория и Дата -->
                    <div class="d-flex justify-content-between text-muted mb-3">
                        <span class="badge bg-secondary"><?php echo htmlspecialchars($post['name']); ?></span>
                        <span><?php echo date("d.m.Y H:i", strtotime($post['created_at'])); ?></span>
                    </div>

                    <!-- Заголовок -->
                    <h1 class="card-title mb-4"><?php echo htmlspecialchars($post['title']); ?></h1>
                    
                    <!-- Текст поста -->
                    <!-- nl2br превращает переносы строк (Enter) в теги <br>, чтобы текст не слипался -->
                    <div class="card-text fs-5" style="line-height: 1.8;">
                        <?php echo nl2br(htmlspecialchars($post['content'])); ?>
                    </div>

                </div>

                <div class="card-footer bg-light">
                    Автор: <strong><?php echo htmlspecialchars($post['username']); ?></strong>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>


