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

Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('welcome');

Route::post('/ajax_get_specifics_by_categories', 'App\Http\Controllers\WelcomeController@get_specifics_by_categories');
Route::post('/ajax_get_cities_by_countries', 'App\Http\Controllers\WelcomeController@get_cities_by_countries');
Route::post('/ajax_get_if_truck', 'App\Http\Controllers\WelcomeController@get_if_truck');
Route::post('/ajax_get_categories_by_types', 'App\Http\Controllers\WelcomeController@get_categories_by_types');
Route::post('/ajax_get_modells_by_makes', 'App\Http\Controllers\WelcomeController@get_modells_by_makes');
Route::post('/ajax_get_deals_with_filter', 'App\Http\Controllers\WelcomeController@get_deals_with_filter');
Route::post('/ajax_get_specific_fields', 'App\Http\Controllers\WelcomeController@get_specific_fields');

Auth::routes();

Route::get('home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('dashboard', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('pricing', 'App\Http\Controllers\ExamplePagesController@pricing')->name('page.pricing');
Route::get('lock', 'App\Http\Controllers\ExamplePagesController@lock')->name('page.lock');
Route::get('error', ['as' => 'page.error', 'uses' => 'App\Http\Controllers\ExamplePagesController@error']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('category', 'App\Http\Controllers\CategoryController', ['except' => ['show']]);
    Route::resource('tag', 'App\Http\Controllers\TagController', ['except' => ['show']]);
    Route::resource('item', 'App\Http\Controllers\ItemController', ['except' => ['show']]);
    Route::resource('role', 'App\Http\Controllers\RoleController', ['except' => ['show', 'destroy']]);
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::resource('make', 'App\Http\Controllers\MakeController', ['except' => ['show']]);
    Route::resource('truckmake', 'App\Http\Controllers\TruckmakeController', ['except' => ['show']]);
    Route::resource('modell', 'App\Http\Controllers\ModeldController', ['except' => ['show']]);
    Route::resource('specific', 'App\Http\Controllers\SpecificController', ['except' => ['show']]);
    Route::resource('deal', 'App\Http\Controllers\DealController', ['except' => ['show']]);
    Route::resource('type', 'App\Http\Controllers\TypeController', ['except' => ['show']]);
    Route::resource('auctioneer', 'App\Http\Controllers\AuctioneerController', ['except' => ['show']]);
  
    // Routes for Ajax Communications
    Route::post('deal/ajax_get_specific_properties', 'App\Http\Controllers\AjaxController@get_specific_properties');
    Route::post('deal/ajax_get_equipment_category', 'App\Http\Controllers\AjaxController@get_equipment_category');
    Route::post('deal/ajax_get_modell', 'App\Http\Controllers\AjaxController@get_modell');
    Route::post('deal/ajax_get_state_list', 'App\Http\Controllers\AjaxController@get_state_list');
    Route::post('deal/ajax_get_make_models', 'App\Http\Controllers\AjaxController@get_make_models');
    Route::post('deal/{id}/ajax_get_specific_properties', 'App\Http\Controllers\AjaxController@get_specific_properties');
    Route::post('deal/{id}/ajax_get_equipment_category', 'App\Http\Controllers\AjaxController@get_equipment_category');
    Route::post('deal/{id}/ajax_get_modell', 'App\Http\Controllers\AjaxController@get_modell');
    Route::post('deal/{id}/ajax_get_state_list', 'App\Http\Controllers\AjaxController@get_state_list');
    Route::post('deal/{id}/ajax_get_make_models', 'App\Http\Controllers\AjaxController@get_make_models');
    
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
        
    Route::get('rtl-support', ['as' => 'page.rtl-support', 'uses' => 'App\Http\Controllers\ExamplePagesController@rtlSupport']);
    Route::get('timeline', ['as' => 'page.timeline', 'uses' => 'App\Http\Controllers\ExamplePagesController@timeline']);
    Route::get('widgets', ['as' => 'page.widgets', 'uses' => 'App\Http\Controllers\ExamplePagesController@widgets']);
    Route::get('charts', ['as' => 'page.charts', 'uses' => 'App\Http\Controllers\ExamplePagesController@charts']);
    Route::get('calendar', ['as' => 'page.calendar', 'uses' => 'App\Http\Controllers\ExamplePagesController@calendar']);

    Route::get('buttons', ['as' => 'page.buttons', 'uses' => 'App\Http\Controllers\ComponentPagesController@buttons']);
    Route::get('grid-system', ['as' => 'page.grid', 'uses' => 'App\Http\Controllers\ComponentPagesController@grid']);
    Route::get('panels', ['as' => 'page.panels', 'uses' => 'App\Http\Controllers\ComponentPagesController@panels']);
    Route::get('sweet-alert', ['as' => 'page.sweet-alert', 'uses' => 'App\Http\Controllers\ComponentPagesController@sweetAlert']);
    Route::get('notifications', ['as' => 'page.notifications', 'uses' => 'App\Http\Controllers\ComponentPagesController@notifications']);
    Route::get('icons', ['as' => 'page.icons', 'uses' => 'App\Http\Controllers\ComponentPagesController@icons']);
    Route::get('typography', ['as' => 'page.typography', 'uses' => 'App\Http\Controllers\ComponentPagesController@typography']);
    
    Route::get('regular-tables', ['as' => 'page.regular_tables', 'uses' => 'App\Http\Controllers\TablePagesController@regularTables']);
    Route::get('extended-tables', ['as' => 'page.extended_tables', 'uses' => 'App\Http\Controllers\TablePagesController@extendedTables']);
    Route::get('datatable-tables', ['as' => 'page.datatable_tables', 'uses' => 'App\Http\Controllers\TablePagesController@datatableTables']);

    Route::get('regular-form', ['as' => 'page.regular_forms', 'uses' => 'App\Http\Controllers\FormPagesController@regularForms']);
    Route::get('extended-form', ['as' => 'page.extended_forms', 'uses' => 'App\Http\Controllers\FormPagesController@extendedForms']);
    Route::get('validation-form', ['as' => 'page.validation_forms', 'uses' => 'App\Http\Controllers\FormPagesController@validationForms']);
    Route::get('wizard-form', ['as' => 'page.wizard_forms', 'uses' => 'App\Http\Controllers\FormPagesController@wizardForms']);

    Route::get('google-maps', ['as' => 'page.google_maps', 'uses' => 'App\Http\Controllers\MapPagesController@googleMaps']);
    Route::get('fullscreen-maps', ['as' => 'page.fullscreen_maps', 'uses' => 'App\Http\Controllers\MapPagesController@fullscreenMaps']);
    Route::get('vector-maps', ['as' => 'page.vector_maps', 'uses' => 'App\Http\Controllers\MapPagesController@vectorMaps']);
  });

