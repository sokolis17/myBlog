<?php

class Database {
    // 1. Свойства (Переменные внутри класса)
    // private значит "доступно только внутри этого файла" (чтобы никто снаружи не менял пароль)
    private $host = 'localhost';
    private $db_name = 'blog_db';
    private $username = 'postgres';
    private $password = 'YOUR_PASSWORD_HERE'; // Заглушка
    private $port = "5432";
    
    public $conn; // Сюда мы положим готовое подключение

    // 2. Метод (Функция внутри класса) для подключения
    public function getConnection() {
        $this->conn = null; // Сначала обнуляем, на всякий случай

        try {
            // Формируем DSN (как раньше)
            // $this->host означает "возьми переменную host из ЭТОГО ЖЕ класса"
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            
            // Создаем PDO
            $this->conn = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

        } catch(PDOException $e) {
            echo "Ошибка подключения: " . $e->getMessage();
        }

        return $this->conn; // Возвращаем готовый инструмент (телефонную трубку)
    }
}