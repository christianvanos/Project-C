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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home')
    ->middleware('is_admin')    
    ->name('admin');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('scrumboard/{project_id?}/{sprint_id?}', 'ScrumboardController@scrumboard_page')->middleware('project');
	Route::post('/scrumboard/itemmoved', 'ScrumboardController@userstory_item_moved');
	Route::post('/scrumboard/itemadded', 'ScrumboardController@userstory_item_added');
	Route::post('/scrumboard/backlogmoved', 'ScrumboardController@backlog_moved')->middleware('backlog');
});

Route::get('/laravel_google_chart', 'LaravelGoogleGraph@index');

Route::get('insert','AdduserprojectController@insertform');
Route::post('create','AdduserprojectController@insert'); 

Route::get('/userprojects', 'ProjectMembersController@index');
Route::get('/userprojects/create', 'ProjectMembersController@create');
Route::get('/userprojects/{project_member}','ProjectMembersController@show');
Route::get('/userprojects/{project_member}/edit','ProjectmembersController@edit');
Route::post('/userprojects', 'ProjectMembersController@store');
Route::patch('/userprojects/{project_member}', 'ProjectmembersController@update');
Route::delete('/userprojects/{project_member}', 'ProjectMembersController@destroy');

Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create'); 
Route::get('/projects/{project}','ProjectsController@show');
Route::get('/projects/{project}/edit','ProjectsController@edit');
Route::post('/projects', 'ProjectsController@store');
Route::patch('/projects/{project}', 'ProjectsController@update');
Route::delete('/projects/{project}', 'ProjectsController@destroy');


Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
		Route::get('userprojects1', ['as' => 'userprojects.userprojects', 'uses' => 'PageController@userprojects']);
		Route::get('charts', ['as' => 'userprojects.charts', 'uses' => 'PageController@charts']);
		Route::get('chart', ['as' => 'userprojects.google_pie_chart', 'uses' => 'LaravelGoogleGraph@index']);
});



Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});