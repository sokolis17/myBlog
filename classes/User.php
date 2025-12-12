<?php

class User
{
    private $conn; // Сюда положим $pdo
    private $table_name = "users"; // Имя таблицы

    // Конструктор запускается автоматически при new User(...)
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Метод регистрации
    public function register($username, $email, $password)
    {
        // 1. Напиши SQL запрос (INSERT ...)
        $query = "INSERT INTO " . $this->table_name . "(username,email,password_hash) VALUES (:username,:email,:password_hash)"; // Допиши сам

        // 2. Подготовь ($stmt = $this->conn->prepare...)
        $stmt = $this->conn->prepare($query);
        // 3. Захешируй пароль
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        // 4. Выполни (execute)
        try {
            $stmt->execute([':username' => $username, ':email' => $email, ':password_hash' => $password_hash]);
            return true;
        } catch (Exception $e) {
            echo 'Ошибка:' . $e->getMessage();
            return false;
        }
        // Если ошибка — верни false

        // Попробуй реализовать это!
        // Используй $this->conn вместо $pdo
    }
    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        try {
            $stmt->execute([':email' => $email]);
            $row = $stmt->fetch();
            if (!$row) {
                throw new Exception('Почта не найдена');
            }   
            if (!password_verify($password, $row['password_hash'])) {
                throw new Exception('Пароли не совпадают');
            } else {
                return $row;
            }
        } catch(Exception $e){
            return false;
        }
    }
}
