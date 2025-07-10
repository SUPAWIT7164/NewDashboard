<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExnessController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Api\WalletController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Debug route for API testing
    Route::get('/debug/session', function () {
        return response()->json([
            'authenticated' => Auth::check(),
            'user_id' => Auth::id(),
            'user_email' => Auth::user()?->email,
            'session_id' => session()->getId(),
            'has_exness_token' => session()->has('exness_token'),
            'has_credentials' => session()->has('exness_credentials'),
            'token_length' => session()->has('exness_token') ? strlen(session('exness_token')) : 0,
            'session_data' => [
                'exness_token' => session()->has('exness_token') ? 'exists' : 'missing',
                'exness_credentials' => session()->has('exness_credentials') ? 'exists' : 'missing',
                'api_domain' => session('api_domain', 'not_set'),
                'token_created_at' => session('token_created_at', 'not_set')
            ]
        ]);
    })->middleware(['auth:sanctum']);

    // Exness API routes for authenticated users
    Route::get('/exness/token', [ExnessController::class, 'getToken']);
    Route::get('/exness/clients', [ExnessController::class, 'getClients']);
    Route::get('/exness/wallets', [ExnessController::class, 'getWallets']);
    Route::get('/wallet/accounts', [ExnessController::class, 'getWalletAccounts']);
    Route::post('/exness/credentials', [ExnessController::class, 'saveCredentials']);
    Route::get('/clients', [ClientController::class, 'index']);

    // Wallet Routes
    Route::get('/wallet/accounts', [WalletController::class, 'getAccounts']);
});

// Client routes
Route::prefix('clients')->group(function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::post('/sync', [ClientController::class, 'sync']);
    Route::post('/sync-new', [ClientController::class, 'syncNewClients']);
    Route::get('/sync-stats', [ClientController::class, 'syncStats']);
    Route::get('/stats', [ClientController::class, 'stats']);
    Route::get('/debug', [ClientController::class, 'debugApi']);
    Route::get('/debug-db', [ClientController::class, 'debugDatabase']);
});