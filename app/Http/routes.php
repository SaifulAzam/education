<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function(){
	return view('front.home');
});

/*App::missing(function($exception){
	return view('index');
});*/


Route::get('/a', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(['prefix' => 'api/v1', 'namespace'=>'Api'], function()
{
	//lessons
	Route::post('lessons/{id}', 'LessonsController@postComment');
	Route::resource('lessons', 'LessonsController', ['only' => ['index', 'show', 'store', 'destroy', 'update']]);

	//tags
	Route::get('lessons/{id}/tags', 'TagsController@index');
	Route::resource('tags', 'TagsController', ['only' => ['index', 'show']]);

	//articles
	Route::post('articles/{id}', 'ArticlesController@postComment');
	Route::resource('articles', 'ArticlesController', ['only' => ['index', 'show']]);

	//comments
	Route::resource('comments', 'CommentsController', ['only' => ['index', 'store', 'destroy']]);

	//coupons
	Route::post('coupons/{id}', 'CouponsController@postComment');
	//Route::put('coupons', 'CouponsController@store');
	Route::resource('coupons', 'CouponsController', ['only' => ['index', 'store', 'show', 'destroy', 'update']]);

	//schools
	Route::post('schools/{id}', 'SchoolsController@postComment');
	Route::resource('schools', 'SchoolsController', ['only' => ['index', 'show']]);

	//student_profile
	Route::resource('students', 'StudentsController', ['only' => ['show', 'store', 'update']]);

	//tutors
	//Route::put('tutors', 'TutorsController@store');
	Route::post('tutors/{id}', 'TutorsController@postComment');
	Route::resource('tutors', 'TutorsController', ['only' => ['index', 'store', 'show', 'destroy', 'update']]);
});

/*
Route::group(['namespace'=>'Frontend'], function()
{
	//Home Page Controller
	//Route::get('/', 'HomeController@index');
	//Route::get('home', 'HomeController@index');
	Route::get('/welcome', 'WelcomeController@index');
	//Lessons Page Controller
	Route::post('lessons/{id}', 'LessonsController@storeComment');
	Route::get('lessons/tags/{tag}', 'LessonsController@filterByTag');
	Route::resource('lessons', 'LessonsController', ['only' => ['index', 'show']]);
	//Schools Page Controller
	Route::post('schools/{id}', 'SchoolsController@storeComment');
	Route::get('schools/sort/{condition}', 'SchoolsController@sortBy');
	Route::get('schools/filter/{time}', 'SchoolsController@filterByTime');
	Route::get('schools/tags/{tag}', 'SchoolsController@filterByTag');
	Route::get('schools/filters/{location}', 'SchoolsController@filterByLocation');
	Route::resource('schools', 'SchoolsController', ['only' => ['index', 'show']]);
	//Tutors Page Controller


	Route::get('tutors/tags/{tag}', 'TutorsController@filterByTag');
	Route::post('tutors/{id}', 'TutorsController@storeComment');
	Route::get('tutors/{id}/profile', 'TutorsController@getProfile');
	Route::get('tutors/{id}/students', 'TutorsController@getStudents');
	Route::get('tutors/{id}/lessons', 'TutorsController@getLessons');
	Route::get('tutors/{id}/comments', 'TutorsController@getComments');
	Route::get('tutors/{id}/settings', 'TutorsController@getSettings');
	Route::patch('tutors/{id}/editSocial', 'TutorsController@editSocial');
	Route::patch('tutors/{id}/editTag', 'TutorsController@editTag');
	Route::post('tutors/{id}/editJob', 'TutorsController@editJob');
	Route::post('tutors/{id}/editEducation', 'TutorsController@editEducation');
	Route::post('tutors/{id}/deleteJob/{id2}', 'TutorsController@deleteJob');
	Route::post('tutors/{id}/deleteEducation/{id2}', 'TutorsController@deleteEducation');
	Route::post('tutors/{id}/lessons', 'TutorsController@postLesson');
	Route::post('tutors/{id}/deleteLesson/{id2}', 'TutorsController@deleteLesson');
	Route::post('tutors/{id}/editPhoto', 'TutorsController@editPicture');
	Route::resource('tutors', 'TutorsController', ['only' => ['index', 'show', 'store', 'create']]);
	//Students Info Complete
	Route::resource('students', 'StudentsController', ['only' => ['create', 'store']]);
	//Coupons
	Route::resource('coupons', 'CouponsController', ['only' => ['index', 'show']]);
	//Articles
	Route::post('articles/{id}', 'ArticlesController@storeComment');
	Route::get('articles/tags/{tag}', 'ArticlesController@filterByTag');
	Route::resource('articles', 'ArticlesController', ['only' => ['index', 'show']]);
	//Community
	Route::resource('community', 'CommunityController');
});

Route::group(['prefix' => 'backend', 'middleware' => 'auth', 'namespace'=>'Backend'], function()
{
	//Dashboard
	Route::get('dashboard', 'DashboardController@index');
	//Schools
	Route::get('schools/{id}/delete', 'SchoolsController@getDelete');
	Route::resource('schools', 'SchoolsController');
	//Coupons
	Route::get('coupons/{id}/delete', 'CouponsController@getDelete');
	Route::resource('coupons', 'CouponsController');
	//Articles
	Route::get('articles/{id}/delete', 'ArticlesController@getDelete');
	Route::resource('articles', 'ArticlesController');
	//Tutors
	Route::get('tutors/{id}/delete', 'TutorsController@getDelete');
	Route::resource('tutors', 'TutorsController');
	//Students
	Route::get('students/{id}/delete', 'StudentsController@getDelete');
	Route::resource('students', 'StudentsController');
	//Users
	Route::get('users/{id}/delete', 'UsersController@getDelete');
	Route::resource('users', 'UsersController');
	//Roles
	Route::get('roles/{id}/delete', 'RolesController@getDelete');
	Route::resource('roles', 'RolesController');

});
*/



