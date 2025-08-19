<?php
require_once __DIR__ . '/../config/database.php';

class Contact {
    private $pdo;

    public function __construct() {
        $this->pdo = getDbConnection();
    }

    public function save($name, $email, $subject, $message) {
        $stmt = $this->pdo->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $subject, $message]);
    }
}
?>