<?php
require_once 'hos/config.php';
$api_url = "https://api.groq.com/openai/v1/chat/completions";
$request_data = [
    "model" => "llama3-8b-8192",
    "messages" => [
        ["role" => "user", "content" => "test"]
    ],
    "temperature" => 0.7,
    "max_tokens" => 10
];
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
file_put_contents('debug_groq.txt', "HTTP: " . curl_getinfo($ch, CURLINFO_HTTP_CODE) . "\nResponse: " . $response . "\nCurl Error: " . curl_error($ch));
curl_close($ch);
?>
