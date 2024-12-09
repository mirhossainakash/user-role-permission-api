<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;


// Public Routes
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {

    // User Management
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // Role and Permission Management with Permission Middleware
    Route::middleware(['auth:api', 'permission:edit_users'])->group(function () {

        // Role Management
        Route::post('/roles', [RoleController::class, 'store']);
        Route::post('/users/{id}/roles', [RoleController::class, 'assignRoleToUser']);
        
        // Permission Management
        Route::post('/permissions', [PermissionController::class, 'store']);
        Route::post('/roles/{id}/permissions', [PermissionController::class, 'assignPermissionToRole']);
    
    });
     

});



