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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');


Route::get('/dashboard', 'HomeController@index')->name('home')
    ->middleware('is_admin')    
	->name('admin');
	
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	// made: Christian
	// Scrumboard
	Route::get('scrumboard/{project_id?}/{sprint_id?}', 'ScrumboardController@scrumboard_page')->middleware('project');
	
	Route::post('scrumboard/backlogmoved', 'ScrumboardController@backlog_moved')->middleware('backlog');
	Route::post('/scrumboard/backlogadded', 'ScrumboardController@backlog_added');
	Route::post('/scrumboard/backlogedited', 'ScrumboardController@backlog_edited');
	Route::post('/scrumboard/itemmoved', 'ScrumboardController@userstory_item_moved');
	Route::post('/scrumboard/itemadded', 'ScrumboardController@userstory_item_added');
	Route::post('/scrumboard/itemedited', 'ScrumboardController@userstory_item_edited');

	//Userstories
	Route::get('/userstories/{project_id}', 'UserstoriesController@userstories_page')->middleware('project');
	Route::post('/userstories/edited', 'UserstoriesController@edited');
	Route::post('/userstories/deleted', 'UserstoriesController@deleted');
	Route::post('/userstories/added', 'UserstoriesController@added');
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
Route::get('/projects/{project}/sprint', 'ProjectsController@sprint');
Route::get('/projects/{sprint}/daily_scrums', 'ProjectsController@nav_daily_scrums');
Route::get('/projects/{project}/dScrums', 'ProjectsController@daily_scrums');
Route::post('/projects/{project}/dScrums', 'ProjectsController@create_daily_scrum');
Route::get('/projects/sprint', 'Projectscontroller@sprint');

Route::get('/projects/create', 'ProjectsController@create'); 
Route::get('/projects/{project}','ProjectsController@show');
Route::get('/projects/{project}/edit','ProjectsController@edit');
Route::post('/projects', 'ProjectsController@store');
Route::patch('/projects/{project}', 'ProjectsController@update');
Route::delete('/projects/{project}', 'ProjectsController@destroy');
Route::get('/usersprojects', 'UserProjectsController@index');
Route::get('/user_admin', 'UserController@admin');
Route::get('/admin_edit', 'UserController@editUserAdmin');
Route::get('/admin_delete','UserController@deleteUserAdmin');
Route::get('/retrospectives', 'RetrospectiveController@index');
Route::get('/retrospective/create/{id}', 'RetrospectiveController@create');
Route::post('/retrospective/store','RetrospectiveController@store');
Route::get('/retrospective/delete/{id}', 'RetrospectiveController@delete');
Route::get('/retrospective/edit/{id}', 'RetrospectiveController@edit');
Route::post('/retrospective/update','RetrospectiveController@update');
Route::get('files/{file_name}', function($file_name = null)
{
    $path = storage_path().'/'.'app/'.$file_name;
    if (file_exists($path)) {
        return Response::download($path);
    }
});
Route::post('/sprint/new', 'ScrumBoardController@newSprint');


Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
		Route::get('scruminfo', ['as' => 'userproject.scruminfo', 'uses' => 'PageController@scruminfo']);
		Route::get('userprojects1', ['as' => 'userprojects.userprojects', 'uses' => 'PageController@userprojects']);
		Route::get('burndown/{project_id}/{sprint_number}', ['as' => 'userprojects.charts', 'uses' => 'burndownController@index']);
		Route::get('charts', ['as' => 'userprojects.google_pie_chart', 'uses' => 'LaravelGoogleGraph@index']);
		Route::get('charts2', ['as' => 'userprojects.google_pie_chart2', 'uses' => 'LaravelGoogleGraph2@index']);
});



Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});