<?php
header('Content-Type: application/json');
require_once 'config.php';

// Ensure the request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Only POST requests are allowed.']);
    exit;
}

// Get the raw POST data
$inputJSON = file_get_contents('php://input');
$inputData = json_decode($inputJSON, true);

if (!isset($inputData['prompt']) || trim($inputData['prompt']) === '') {
    echo json_encode(['error' => 'No prompt provided.']);
    exit;
}

// Prepare the Groq API request
$api_url = "https://api.groq.com/openai/v1/chat/completions";

$role = isset($inputData['role']) ? $inputData['role'] : "You are a professional medical assistant named Dr. Medi. Provide helpful, accurate medical information while reminding users to consult with their doctor for serious concerns. Keep your response concise.";

$request_data = [
    "model" => "llama-3.3-70b-versatile",
    "messages" => [
        ["role" => "system", "content" => $role],
        ["role" => "user", "content" => $inputData['prompt']]
    ],
    "temperature" => 0.7,
    "max_tokens" => 800
];

if (!defined('GROQ_API_KEY') || empty(GROQ_API_KEY)) {
    echo json_encode(['error' => 'Groq API Key is not configured on the server.']);
    exit;
}

$ch = curl_init($api_url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json", 
        "Authorization: Bearer " . GROQ_API_KEY
    ],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($request_data)
]);

$response = curl_exec($ch);

if(curl_errno($ch)){
    echo json_encode(['error' => ["message" => "Backend connection failed: " . curl_error($ch)]]);
} else {
    // Optionally log the HTTP code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // Forward the response exactly as Groq sent it
    echo $response;
}

curl_close($ch);
?>
