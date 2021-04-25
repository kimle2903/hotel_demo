<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource("test", 'TestController');

$segment = Request::segment(1);
if(in_array($segment, Config::get('app.locales'))){
    app()->setLocale($segment);
}
if(config('app.locale') !== 'en'){
    Route::group(['prefix'=>$segment], function(){
       web();
    });
}else{
    web();
}


