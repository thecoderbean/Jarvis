<?php
require_once __DIR__ . '/../models/Contact.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new Contact();
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $subject = trim($_POST['subject'] ?? '');
            $message = trim($_POST['message'] ?? '');

            // Server-side validation (in addition to JS)
            if (empty($name) || empty($email) || empty($subject) || empty($message)) {
                echo json_encode(['success' => false, 'message' => 'All fields are required.']);
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
                return;
            }

            if ($this->contactModel->save($name, $email, $subject, $message)) {
                echo json_encode(['success' => true, 'message' => 'Message sent successfully!']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to send message.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }
}
?>