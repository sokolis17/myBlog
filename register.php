<?php
require_once 'includes/init.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // --- ТВОЙ КОД ЗДЕСЬ ---
    $data = $user->register($username, $email, $password);
    if ($data) {
        header("Location:login.php");
        exit;
    } else $error = "Ошибка регистрации (возможно, такой email уже занят)";
}

require_once 'includes/header.php';
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>📝 Регистрация</h4>
            </div>
            <div class="card-body">

                <?php if ($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <form method="post">
                    <div class="mb-3">
                        <label>Имя пользователя</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Пароль</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>