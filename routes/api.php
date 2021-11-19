<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController\HeadOffice\AddressOfficeController;
use App\Http\Controllers\APIController\HeadOffice\CategoryStuffController;

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

		// Get Profile Login
		Route::get('auth/me', [App\Http\Controllers\APIController\AuthController::class, 'me'])->name('profile');

		// Address Office
		Route::resource('address_office', AddressOfficeController::class);
		// Category Stuff
		Route::resource('category_stuff', CategoryStuffController::class);


	});

});




