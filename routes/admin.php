<?php

use App\Http\Middleware\HasAccessAdmin;
use App\Http\Middleware\Admin\HandleInertiaAdminRequests;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\XMReportController;

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => config('admin.prefix'),
    'middleware' => ['auth', HasAccessAdmin::class, HandleInertiaAdminRequests::class],
    'as' => 'admin.',
], function () {
    Route::get('/', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');    
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('menu', 'MenuController')->except([
        'show',
    ]);
    Route::resource('menu.item', 'MenuItemController')->except([
        'show',
    ]);
    Route::group([
        'prefix' => 'category',
        'as' => 'category.',
    ], function () {
        Route::resource('type', 'CategoryTypeController')->except([
            'show',
        ]);
        Route::resource('type.item', 'CategoryController');
    });
    Route::resource('media', 'MediaController');
    Route::get('edit-account-info', 'UserController@accountInfo')->name('account.info');
    Route::post('edit-account-info', 'UserController@accountInfoStore')->name('account.info.store');
    Route::post('change-password', 'UserController@changePasswordStore')->name('account.password.store');
    
    // Report1 Routes
    Route::group([
        'prefix' => 'reports1',
        'as' => 'reports1.',
    ], function () {
        Route::get('clients1', 'Report1Controller@clients1')->name('clients1');
        Route::get('client-account1', 'Report1Controller@clientAccount1')->name('client-account1');
        Route::get('client-transaction1', 'Report1Controller@clientTransaction1')->name('client-transaction1');
        Route::get('transactions-pending1', 'Report1Controller@transactionsPending1')->name('transactions-pending1');
        Route::get('reward-history1', 'Report1Controller@rewardHistory1')->name('reward-history1');
        Route::get('test-connection', 'Report1Controller@testConnection')->name('test-connection');
    });
    
    // Report2 Routes
    Route::group([
        'prefix' => 'reports2',
        'as' => 'reports2.',
    ], function () {
        Route::get('clients2', 'Report2Controller@clients2')->name('clients2');
        Route::get('client-account2', 'Report2Controller@clientAccount2')->name('client-account2');
        Route::get('client-transaction2', 'Report2Controller@clientTransaction2')->name('client-transaction2');
        Route::get('transactions-pending2', 'Report2Controller@transactionsPending2')->name('transactions-pending2');
        Route::get('reward-history2', 'Report2Controller@rewardHistory2')->name('reward-history2');
        Route::get('test-connection2', 'Report2Controller@testConnection2')->name('test-connection2');
    });

    // XM Report Routes
    Route::prefix('xm')->group(function () {
        Route::get('/', [XMReportController::class, 'index'])->name('admin.xm.index');
        Route::get('/traders', [XMReportController::class, 'getTraderList'])->name('admin.xm.traders');
        Route::get('/transactions', [XMReportController::class, 'getTraderTransactions'])->name('admin.xm.transactions');
        Route::get('/rebate', [XMReportController::class, 'getLotRebateStatistics'])->name('admin.xm.rebate');
    });
});
