<?php
header('Content-Type: application/json');

require_once 'config.php';

// Provide the key to the local frontend securely so it never touches the HTML/Git tree
if (defined('GROQ_API_KEY')) {
    echo json_encode(['key' => GROQ_API_KEY]);
} else {
    echo json_encode(['error' => 'API Key not found']);
}
?>
