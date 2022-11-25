<?php

use Illuminate\Support\Facades\Route;
use Rexoit\Tracker\Tracker;
use App\Models\User;
use App\Models\Wallet;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/track', function() {
    $oGreetr = new Tracker();
    return $oGreetr->geoLocate();
});

Route::get('/update', function() {
    $wallet_datas = Wallet::all();
 
    foreach ($wallet_datas as $wallet_data) {
        $cash=$wallet_data->cash_amount;
        $salary=$wallet_data->salary_amount;
        $updated=$cash+$salary;
        $wallet_data->cash_amount=$updated;
        $wallet_data->update();
        
    }
});
