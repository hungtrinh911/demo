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
Route::get('/','Fontend\IndexController@index');

Route::post('/','Fontend\IndexController@addContactUs');

Route::get('/guidereview','Fontend\GuidereviewController@index');


Route::get('/trainingcourse','Fontend\TrainingCourseController@index');
Route::get('/trainingcourse/{key}','Fontend\TrainingCourseController@category');
Route::get('/jobsearch','Fontend\JobSearchController@index');
Route::get('/travelblog','Fontend\TravelBlogController@index');
Route::get('/aboutus','Fontend\AboutUsController@index');
Route::get('/faqs','Fontend\FaqsController@index');

Route::post('/guidereview/search','Fontend\GuidereviewController@search');
Route::get('/guidereview/search','Fontend\GuidereviewController@search');
Route::post('/jobsearch/search','Fontend\JobSearchController@search');
Route::get('/jobsearch/search','Fontend\JobSearchController@search');
Route::get('/trainingcourse/search','Fontend\TrainingCourseController@search');
Route::post('/trainingcourse/search','Fontend\TrainingCourseController@search');

Route::get('/jobsearch/detail/{id}','Fontend\JobSearchController@jobsearchdetail');
Route::get('/travelblog/detail/{id}','Fontend\TravelBlogController@detail');
Route::get('/trainingcourse/detail/{id}','Fontend\TrainingCourseController@detail');
Route::get('/guidereview/detail/{id}','Fontend\GuidereviewController@detail');
Route::post('/guidereview/detail/{id}','Fontend\GuidereviewController@addComment');
Route::post('/guidereview/detail/vote/{id}','Fontend\GuidereviewController@vote');

//Route::get('/guidereview','Fontend\GuidereviewController@loadmore');
//Route::get('/','Fontend\IndexController@loadmore');
Route::get('guidereview/loadmore','Fontend\GuidereviewController@loadmore');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/welcome', 'HomeController@welcome')->name('welcome');



