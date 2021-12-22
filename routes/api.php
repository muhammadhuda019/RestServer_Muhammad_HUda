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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('MyRental', 'RentalController@data');
Route::get('MyRental/{kode_mobil}', 'RentalController@data');
Route::post('MyRental', 'Rentalcontroller@insert_data_mobil');
Route::put('MyRental/update{kode_mobil}', 'Rentalcontroller@update_data_mobil');
Route::delete('MyRental/delete{kode_mobil}', 'Rentalcontroller@delete_data_mobil');

