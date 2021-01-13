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
});
Route::middleware('JWT')->group(function(){
    Route::post('/auth/me', 'AuthController@me');
    Route::apiResource('/employee','api\EmployeesController');
    Route::apiResource('/suppliers','api\SupplierController');
    Route::apiResource('/category','api\CategoryController');
    Route::apiResource('/products','api\ProductsController');
    Route::apiResource('/expense','api\ExpenseController');
    Route::post('/salary/paid/{id}','api\SalaryController@paid');
    Route::get('/salary/year','api\SalaryController@list_year');
    Route::get('/salary/month/{id}','api\SalaryController@month_list');
    Route::get('/salary/list/{id}','api\SalaryController@salary_list');
    Route::get('/salary/total/{id}','api\SalaryController@total_paid');
    Route::apiResource('/employee','api\EmployeesController');
    Route::get('/salary/edit/{id}','api\SalaryController@edit');
    Route::patch('/salary/update/{id}','api\SalaryController@update');
    Route::apiResource('/stock','api\StockController');
    Route::apiResource('/customer','api\CustomerController');

});



