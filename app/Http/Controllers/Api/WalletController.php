<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExnessClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WalletController extends Controller
{
    public function getAccounts(Request $request)
    {
        try {
            // Get authenticated user
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 401);
            }

            // Get all Exness clients for the user
            $clients = ExnessClient::where('user_id', $user->id)
                ->where('status', 'active')
                ->get();

            // Format accounts data
            $accounts = $clients->map(function ($client) {
                return [
                    'id' => $client->client_id,
                    'currency' => 'USD',
                    'balance' => $client->balance ?? 0,
                    'type' => $client->account_type
                ];
            });

            return response()->json([
                'success' => true,
                'data' => [
                    'accounts' => $accounts
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Error in WalletController@getAccounts: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Internal server error'
            ], 500);
        }
    }
} 