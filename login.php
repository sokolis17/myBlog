<?php
// Подключаем "мозг" (тут уже есть $user, $pdo и session_start)
require_once 'includes/init.php';

$error = ''; // Переменная для ошибок

// Если форму отправили
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    // --- ТВОЙ КОД ЗДЕСЬ ---
    $data = $user->login($email,$password);
    if($data){
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        header("Location: index.php"); 
    }else $error = "Ошибка авторизации";


    // 1. Попробуй войти через $user->login()
    // 2. Если успех — запиши данные в сессию и сделай редирект:
    //    header("Location: index.php"); 
    //    exit;
    // 3. Если ошибка — запиши текст в $error
    
}

// Подключаем дизайн
require_once 'includes/header.php';
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>🔑 Вход в систему</h4>
            </div>
            <div class="card-body">
                
                <!-- Вывод ошибки, если она есть -->
                <?php if($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="post">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Пароль</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Войти</button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>