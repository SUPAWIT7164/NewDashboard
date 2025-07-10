<?php

require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$apiToken = 'cb3Sq0knGOc1Vq8yxNz1oeXoG8MonNGfAbinMBSJVV0=';
$baseUrl = 'https://mypartners.xm.com/api';

try {
    // Test trader list endpoint
    $response = $client->request('GET', $baseUrl . '/trader-statistics/trader-list', [
        'headers' => [
            'Authorization' => 'Bearer ' . $apiToken,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ],
        'query' => [
            'startTime' => '2025-06-10',
            'endTime' => '2025-07-10',
        ],
        'verify' => false // ในกรณีที่มีปัญหากับ SSL
    ]);

    echo "Response Status: " . $response->getStatusCode() . "\n";
    echo "Response Body:\n";
    echo json_encode(json_decode($response->getBody()->getContents()), JSON_PRETTY_PRINT);

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    
    if (method_exists($e, 'getResponse') && $e->getResponse()) {
        echo "\nResponse Status: " . $e->getResponse()->getStatusCode();
        echo "\nResponse Body: " . $e->getResponse()->getBody();
    }
} 