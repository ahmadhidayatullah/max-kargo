<?php

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

Route::get('/', 'PageController@index')->name('index');
Route::post('next', 'PageController@index2')->name('index2');
Route::post('finish', 'PageController@store')->name('store');
Route::get('search', 'PageController@search')->name('search');
Route::get('payment', 'PageController@payment')->name('payment');
Route::post('payment', 'PageController@confirmation')->name('confirmation');
Route::get('cost', 'PageController@cost')->name('cost');
Route::get('commodity', 'PageController@commodity')->name('commodity');
Route::post('get-commodity', 'PageController@get_commodities')->name('get_commodities');
Route::get('konfirmasi/{id}', 'PageController@batal')->name('konfirmasi_batal');
Route::get('print/{id}', 'PageController@print_order')->name('user.print');
Route::put('abort/{id}', 'PageController@abort')->name('abort');
Route::put('task/{id}', 'PageController@task')->name('user.update.task');
Route::get('get-task/{id}', 'PageController@get_task')->name('get.task');
Route::get('cek-cost/{origin_id}/{destination_id}/{commodity_id}/{kg}', 'PageController@cek_cost')->name('cek.cost');
Route::get('coba',function(){
  echo terbilang(1010101);
});

Route::prefix('prints')->group(function () {
    Route::get('invoice/{id}', 'PrintController@invoice')->name('prints.invoice');
});

Route::get('file/{folder}/{order_number}/{filename}', function ($folder, $order_number, $filename) {
    $path = storage_path('app/' . $folder . '/' . $order_number . '/' . $filename);
    return response()->file($path);
})->name('file');

Route::view('test', 'test', [
    'title' => 'Test'
]);

Route::prefix('app')->middleware(['auth'])->group(function () {

    Route::prefix('settings')->group(function () {
        Route::get('/', 'SettingController@index')->name('setting.index');
        Route::get('/{id}', 'SettingController@edit')->name('setting.edit');
        Route::put('/{id}', 'SettingController@update')->name('setting.update');
        // Route::put('/{id}', 'TaskController@update')->name('tasks.update');
        // Route::post('/{id}', 'TaskController@update_weight')->name('tasks.update_weight');
        // Route::delete('/{id}', 'TaskController@destroy')->name('tasks.destroy');
        // Route::get('/email/send', 'TaskController@email')->name('tasks.email');
    });

    Route::get('/', 'AppController@dashboard')->name('app.dashboard');

    Route::prefix('tasks')->group(function () {
        Route::get('/{status_name}', 'TaskController@index')->name('tasks.index');
        Route::put('/{id}', 'TaskController@update')->name('tasks.update');
        Route::post('/{id}', 'TaskController@update_weight')->name('tasks.update_weight');
        Route::delete('/{id}', 'TaskController@destroy')->name('tasks.destroy');
        Route::get('/email/send', 'TaskController@email')->name('tasks.email');
    });

    Route::prefix('confirmations')->group(function () {
        Route::get('/', 'ConfirmationController@index')->name('confirmations.index');
        Route::put('/{id}', 'ConfirmationController@update')->name('confirmations.update');
    });

    Route::resource('costs', 'CostController');
    Route::prefix('reports')->group(function(){
        Route::get('/', 'ReportController@index')->name('reports.index');
        Route::get('masuk', 'ReportController@masuk')->name('reports.masuk');
        Route::get('batal', 'ReportController@batal')->name('reports.batal');
        Route::post('search','ReportController@search')->name('reports.search');
        Route::get('print/{type}/{tanggal_mulai}/{tanggal_sampai}','ReportController@print_order')->name('reports.print');
    });
    Route::prefix('users')->group(function(){
        Route::get('/', 'UserController@index')->name('users.index');
        Route::post('/store/data', 'UserController@store')->name('users.store');
        Route::post('/{id}', 'UserController@update')->name('users.update');
        Route::get('/{id}', 'UserController@show')->name('users.show');
        Route::delete('/{id}', 'UserController@destroy')->name('users.destroy');
    });
    Route::prefix('master')->group(function(){
      Route::get('/origin', 'OriginController@index')->name('origins.index');
      Route::prefix('destination')->group(function(){
        Route::get('/', 'DestinationController@index')->name('destinations.index');
        Route::post('/store/data', 'DestinationController@store')->name('destinations.store');
        Route::get('/{id}', 'DestinationController@show')->name('destinations.show');
        Route::post('/{id}', 'DestinationController@update')->name('destinations.update');
        Route::delete('/{id}', 'DestinationController@destroy')->name('destinations.destroy');
      });
      Route::prefix('commodity-type')->group(function(){
        Route::get('/', 'CommodityTypeController@index')->name('comoditytype.index');
        Route::post('/store/data', 'CommodityTypeController@store')->name('comoditytype.store');
        Route::get('/{id}', 'CommodityTypeController@show')->name('comoditytype.show');
        Route::post('/{id}', 'CommodityTypeController@update')->name('comoditytype.update');
        Route::delete('/{id}', 'CommodityTypeController@destroy')->name('comoditytype.destroy');
      });
      Route::prefix('commodity')->group(function(){
        Route::get('/', 'CommodityController@index')->name('commodities.index');
        Route::post('/store/data', 'CommodityController@store')->name('commodities.store');
        Route::get('/types', 'CommodityController@get_commodity_types')->name('commodities.types');
        Route::get('/{id}', 'CommodityController@show')->name('commodities.show');
        Route::post('/{id}', 'CommodityController@update')->name('commodities.update');
        Route::delete('/{id}', 'CommodityController@destroy')->name('commodities.destroy');
      });
      Route::prefix('cost')->group(function(){
        Route::get('/', 'CostController@index2')->name('costs.index');
        Route::post('/store/data', 'CostController@store')->name('costs.store');
        Route::get('/{id}', 'CostController@show')->name('costs.show');
        Route::get('/get-type/{id}', 'CostController@get_types')->name('costs.get_types');
        Route::post('/{id}', 'CostController@update')->name('costs.update');
        Route::delete('/{id}', 'CostController@destroy')->name('costs.destroy');
      });

      Route::prefix('order')->group(function(){
        Route::get('/list', 'TaskController@list_order')->name('orders.list');
        Route::get('/print', 'TaskController@print_order')->name('orders.print');
      });
      Route::prefix('charge')->group(function(){
        Route::get('/', 'ChargeController@index')->name('charges.index');
        Route::get('/{id}', 'ChargeController@get_charge')->name('get.charge');
        Route::put('/{id}', 'ChargeController@update')->name('charges.update');
      });

    });
    Route::prefix('refunds')->group(function(){
        Route::get('/', 'RefundController@index')->name('refunds.index');
        Route::put('/{id}', 'RefundController@update')->name('refunds.update');
    });

});

Route::resource('origins', 'OriginController');
// Route::resource('destinations', 'DestinationController');

Route::prefix('datatables')->group(function () {
    Route::get('origins', 'DatatablesController@origins')->name('datatables.origins');
    Route::get('destinations', 'DatatablesController@destinations')->name('datatables.destinations');
    Route::get('costs', 'DatatablesController@costs')->name('datatables.costs');
    Route::get('tasks', 'DatatablesController@tasks')->name('datatables.tasks');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
