<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register-user', [UserController::class, 'register_user']);
Route::post('/login', [UserController::class, 'login_user']); 
Route::post('/add-contact', [ContactsController::class, 'add_contact']);
Route::put('/update-contact/{id}', [ContactsController::class, 'update_contact']);
Route::put('/delete-contact/{id}', [ContactsController::class, 'delete_contact']);
Route::get('/get-contacts', [ContactsController::class, 'get_contacts']);
Route::get('/contacts-search/{name}', [ContactsController::class, 'contacts_search']);