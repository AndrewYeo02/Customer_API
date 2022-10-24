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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix'=>'v1','namespace' => 'App\Http\Controllers\Api\V1'],function(){
    // api/v1/customers for the url
    Route::apiResource('customers',CustomerController::class);
    // api/v1/invoice for the url
    Route::apiResource('invoices',InvoiceController::class);

    Route::post('invoices/bulk',['uses'=> 'InvoiceController@bulkStore']);


});