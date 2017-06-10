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

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix'  =>  'stores'],function(){
    Route::get('/'                  , ['as'   => 'stores.index'         ,'uses'    =>  'StoreController@index']);
    Route::get('/{id}'              , ['as'   => 'stores.show'          ,'uses'    =>  'StoreController@show']);
    Route::post('/'                 , ['as'   => 'stores.store'         ,'uses'    =>  'StoreController@store']);
    Route::put('/{id}'              , ['as'   => 'stores.update'        ,'uses'    =>  'StoreController@update']);
    Route::get('/{id}/articles'     , ['as'   => 'stores.articles.show' ,'uses'    =>  'StoreController@articlesStore']);
    Route::delete('/{id}'           , ['as'   => 'stores.delete'        ,'uses'    =>  'StoreController@delete']);
});

Route::group(['prefix'  =>  'store'],function(){
    Route::get('/{id}'              , ['as'   => 'stores.show'       ,'uses'    =>  'StoreController@showStore']);
});