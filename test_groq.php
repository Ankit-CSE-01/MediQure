<?php
require 'hos/config.php';
$api_url = "https://api.groq.com/openai/v1/chat/completions";
$request_data = [
    "model" => "llama3-70b-8192",
    "messages" => [
        ["role" => "system", "content" => "test"],
        ["role" => "user", "content" => "hello"]
    ]
];
$ch = curl_init($api_url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => ["Content-Type: application/json", "Authorization: Bearer " . GROQ_API_KEY],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($request_data)
]);
$response = curl_exec($ch);
if(curl_errno($ch)){
    echo "CURL ERROR: " . curl_error($ch) . "\n";
} else {
    echo "HTTP CODE: " . curl_getinfo($ch, CURLINFO_HTTP_CODE) . "\n";
    echo "RESPONSE: " . $response . "\n";
}
