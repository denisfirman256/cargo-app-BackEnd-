<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController\AddressOfficeController;
use App\Http\Controllers\APIController\CategoryStuffController;
use App\Http\Controllers\APIController\TransportationController;
use App\Http\Controllers\APIController\CourierController;
use App\Http\Controllers\APIController\UserController;

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

Route::prefix('v1')->group(function() {

	// Auth Login
	Route::post('login', [App\Http\Controllers\APIController\AuthController::class, 'login'])->name('login');

	//Protecting Routes
	Route::group(['middleware' => ['auth:sanctum']], function () {

		// Auth Logout
		Route::get('logout', [App\Http\Controllers\APIController\AuthController::class, 'logout'])->name('logout');

		// List User
		Route::resource('users', UserController::class);

		// Get Profile Login
		Route::get('auth/me', [App\Http\Controllers\APIController\AuthController::class, 'me'])->name('profile');
		// Edit Profile
		Route::post('auth/edit/me', [App\Http\Controllers\APIController\AuthController::class, 'editProfile'])->name('edit.profile');
		// Edit Photo Profile
		Route::post('auth/edit/photo_me', [App\Http\Controllers\APIController\AuthController::class, 'editPhotoProfile'])->name('edit.photo_profile');
		// Edit Password
		Route::post('auth/edit/password_me', [App\Http\Controllers\APIController\AuthController::class, 'editPassword'])->name('edit.password_profile');

		// Address Office
		Route::resource('address_office', AddressOfficeController::class);
		// Category Stuff
		Route::resource('category_stuff', CategoryStuffController::class);
		// Transportations
		Route::resource('transportation', TransportationController::class);
		// Courier
		Route::resource('courier', CourierController::class);


	});

});




