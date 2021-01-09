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


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('register', 'AuthController@register');
    Route::post('me', 'AuthController@me');

});

Route::apiResource('/employee','api\EmployeesController');
Route::apiResource('/suppliers','api\SupplierController');
Route::apiResource('/category','api\CategoryController');
Route::apiResource('/products','api\ProductsController');
Route::apiResource('/expense','api\ExpenseController');
Route::post('/salary/paid/{id}','api\SalaryController@paid');

