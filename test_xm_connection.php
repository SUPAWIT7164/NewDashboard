<?php

require __DIR__.'/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class XMApiTester {
    private $client;
    private $apiToken;
    private $baseUrl;

    public function __construct() {
        $this->apiToken = 'cb3Sq0knGOc1Vq8yxNz1oeXoG8MonNGfAbinMBSJVV0=';
        $this->baseUrl = 'https://mypartners.xm.com/api';
        $this->client = new Client([
            'verify' => false, // ปิด SSL verification สำหรับการทดสอบ
            'timeout' => 30,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public function testEndpoint($endpoint, $params = []) {
        echo "\n=== Testing endpoint: {$endpoint} ===\n";
        try {
            $startTime = microtime(true);
            $response = $this->client->get($this->baseUrl . $endpoint, [
                'query' => $params
            ]);
            $endTime = microtime(true);
            $duration = round(($endTime - $startTime) * 1000, 2);

            echo "Status Code: " . $response->getStatusCode() . "\n";
            echo "Response Time: {$duration}ms\n";
            echo "Headers:\n";
            foreach ($response->getHeaders() as $name => $values) {
                echo $name . ": " . implode(", ", $values) . "\n";
            }

            $body = json_decode($response->getBody(), true);
            echo "\nResponse Body Sample:\n";
            print_r(array_slice($body, 0, 2)); // แสดงเฉพาะ 2 รายการแรก

            return true;
        } catch (RequestException $e) {
            echo "Error occurred!\n";
            echo "Message: " . $e->getMessage() . "\n";
            
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                echo "Status Code: " . $response->getStatusCode() . "\n";
                echo "Response Body:\n" . $response->getBody() . "\n";
            }

            return false;
        }
    }

    public function runAllTests() {
        $startDate = '2025-06-10';
        $endDate = '2025-07-10';

        echo "\nStarting XM API Tests...";
        echo "\nTest Period: {$startDate} to {$endDate}";
        echo "\n================================\n";

        $endpoints = [
            [
                'name' => 'Trader List',
                'endpoint' => '/trader-statistics/trader-list',
                'params' => ['startTime' => $startDate, 'endTime' => $endDate]
            ],
            [
                'name' => 'Lot Rebate Statistics',
                'endpoint' => '/trader-statistics/lot-rebate',
                'params' => ['startTime' => $startDate, 'endTime' => $endDate]
            ],
            [
                'name' => 'Trader Transactions',
                'endpoint' => '/trader-statistics/trades',
                'params' => ['startTime' => $startDate, 'endTime' => $endDate]
            ]
        ];

        $results = [];
        foreach ($endpoints as $test) {
            echo "\nTesting {$test['name']}...";
            $success = $this->testEndpoint($test['endpoint'], $test['params']);
            $results[$test['name']] = $success ? 'PASS' : 'FAIL';
        }

        echo "\n\nTest Summary:";
        echo "\n=============\n";
        foreach ($results as $name => $result) {
            echo "{$name}: {$result}\n";
        }
    }
}

// รัน test
$tester = new XMApiTester();
$tester->runAllTests(); 