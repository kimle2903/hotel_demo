<?php
if (!function_exists('web')) {
  function web()
  {
        Route::get('/', function(){
            return view('home');
        });
        Route::get('blog', function(){
            return view('test');
        })->name('blog');

        Route::get('travel-money', 'TestController@searchTravelMoney');
        Route::post('process-travel-money', 'TestController@processSearch')->name("process-search");
        Route::get('test', 'HotelController@test')->name('test');
  }
}
if (!function_exists('test')) {
  function test()
  {
       return 'test demo abc xyz';
  }
}