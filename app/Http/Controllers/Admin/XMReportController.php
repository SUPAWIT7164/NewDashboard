<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class XMReportController extends Controller
{
    private $baseUrl;
    private $apiToken;

    public function __construct()
    {
        $this->baseUrl = config('services.xm.base_url', 'https://mypartners.xm.com/api');
        // Use hardcoded token for now
        $this->apiToken = 'cb3Sq0knGOc1Vq8yxNz1oeXoG8MonNGfAbinMBSJVV0=';
    }

    public function index()
    {
        return Inertia::render('Admin/XM/Index');
    }

    public function getTraderList(Request $request)
    {
        try {
            $startTime = $request->get('startTime', date('Y-m-d', strtotime('-30 days')));
            $endTime = $request->get('endTime', date('Y-m-d'));

            // Log the request for debugging
            Log::info('XM API Request - Trader List', [
                'startTime' => $startTime,
                'endTime' => $endTime,
                'token' => substr($this->apiToken, 0, 10) . '...' // Log partial token for verification
            ]);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->timeout(30)->get($this->baseUrl . '/trader-statistics/trader-list', [
                'startTime' => $startTime,
                'endTime' => $endTime,
            ]);

            // Log the response status and headers for debugging
            Log::info('XM API Response - Trader List', [
                'status' => $response->status(),
                'headers' => $response->headers(),
            ]);

            if (!$response->successful()) {
                Log::error('XM API Error: Failed to fetch trader list', [
                    'status' => $response->status(),
                    'response' => $response->json(),
                    'startTime' => $startTime,
                    'endTime' => $endTime
                ]);
                
                return response()->json([
                    'error' => 'Failed to fetch data from XM API',
                    'message' => $response->json()['message'] ?? 'Authentication failed. Please check API credentials.',
                    'status' => $response->status()
                ], $response->status());
            }

            $data = $response->json();
            
            // Transform and validate data
            $traders = collect($data)->map(function ($trader) {
                return [
                    'traderId' => $trader['traderId'] ?? null,
                    'country' => $trader['country'] ?? 'Unknown',
                    'accountType' => $trader['accountType'] ?? 'Unknown',
                    'campaign' => $trader['campaign'] ?? 'None',
                    'tradingPlatform' => $trader['tradingPlatform'] ?? 'Unknown',
                    'signUpDate' => $trader['signUpDate'] ?? null,
                    'valid' => $trader['valid'] ?? false,
                    'totalLots' => $trader['totalLots'] ?? 0,
                    'totalDeposits' => $trader['totalDeposits'] ?? 0,
                    'totalWithdrawals' => $trader['totalWithdrawals'] ?? 0,
                    'balance' => $trader['balance'] ?? 0,
                    'lastTradeDate' => $trader['lastTradeDate'] ?? null,
                    'status' => $trader['status'] ?? 'Unknown',
                    'kycStatus' => $trader['kycStatus'] ?? 'Unknown',
                    'email' => $trader['email'] ?? null,
                    'phone' => $trader['phone'] ?? null
                ];
            })->filter(function ($trader) {
                return !is_null($trader['traderId']);
            })->values();

            return response()->json($traders);
            
        } catch (\Exception $e) {
            Log::error('XM API Exception: ' . $e->getMessage(), [
                'exception' => $e,
                'startTime' => $request->get('startTime'),
                'endTime' => $request->get('endTime')
            ]);
            
            return response()->json([
                'error' => 'Failed to fetch data from XM API',
                'message' => 'An unexpected error occurred. Please try again later.',
                'debug_message' => $e->getMessage()
            ], 500);
        }
    }

    public function getTraderTransactions(Request $request)
    {
        try {
            $startTime = $request->get('startTime', date('Y-m-d', strtotime('-30 days')));
            $endTime = $request->get('endTime', date('Y-m-d'));
            $traderIds = $request->get('traderIds');

            $params = [
                'startTime' => $startTime,
                'endTime' => $endTime,
            ];

            if ($traderIds) {
                $params['traderIds'] = $traderIds;
            }

            // Log the request for debugging
            Log::info('XM API Request - Trader Transactions', [
                'params' => $params,
                'token' => substr($this->apiToken, 0, 10) . '...'
            ]);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->timeout(30)->get($this->baseUrl . '/trader-statistics/trades', $params);

            // Log the response status and headers for debugging
            Log::info('XM API Response - Trader Transactions', [
                'status' => $response->status(),
                'headers' => $response->headers(),
            ]);

            if (!$response->successful()) {
                Log::error('XM API Error: Failed to fetch trader transactions', [
                    'status' => $response->status(),
                    'response' => $response->json(),
                    'params' => $params
                ]);
                
                return response()->json([
                    'error' => 'Failed to fetch transaction data',
                    'message' => $response->json()['message'] ?? 'Authentication failed. Please check API credentials.',
                    'status' => $response->status()
                ], $response->status());
            }

            return response()->json($response->json());
            
        } catch (\Exception $e) {
            Log::error('XM API Exception: ' . $e->getMessage(), [
                'exception' => $e,
                'params' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'Failed to fetch transaction data',
                'message' => 'An unexpected error occurred. Please try again later.',
                'debug_message' => $e->getMessage()
            ], 500);
        }
    }

    public function getLotRebateStatistics(Request $request)
    {
        try {
            $startTime = $request->get('startTime', date('Y-m-d', strtotime('-30 days')));
            $endTime = $request->get('endTime', date('Y-m-d'));

            // Log the request for debugging
            Log::info('XM API Request - Lot Rebate', [
                'startTime' => $startTime,
                'endTime' => $endTime,
                'token' => substr($this->apiToken, 0, 10) . '...'
            ]);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->timeout(30)->get($this->baseUrl . '/trader-statistics/lot-rebate', [
                'startTime' => $startTime,
                'endTime' => $endTime,
            ]);

            // Log the response status and headers for debugging
            Log::info('XM API Response - Lot Rebate', [
                'status' => $response->status(),
                'headers' => $response->headers(),
            ]);

            if (!$response->successful()) {
                Log::error('XM API Error: Failed to fetch rebate statistics', [
                    'status' => $response->status(),
                    'response' => $response->json(),
                    'startTime' => $startTime,
                    'endTime' => $endTime
                ]);
                
                return response()->json([
                    'error' => 'Failed to fetch rebate data',
                    'message' => $response->json()['message'] ?? 'Authentication failed. Please check API credentials.',
                    'status' => $response->status()
                ], $response->status());
            }

            return response()->json($response->json());
            
        } catch (\Exception $e) {
            Log::error('XM API Exception: ' . $e->getMessage(), [
                'exception' => $e,
                'startTime' => $request->get('startTime'),
                'endTime' => $request->get('endTime')
            ]);
            
            return response()->json([
                'error' => 'Failed to fetch rebate data',
                'message' => 'An unexpected error occurred. Please try again later.',
                'debug_message' => $e->getMessage()
            ], 500);
        }
    }
} 