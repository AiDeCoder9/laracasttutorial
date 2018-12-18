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


//passing data with routes

//Route::get('/', function () {
//    $task =[
//        'Design travel site',
//        'Design commerce site',
//        'Design bus site'
//    ];
//
//    $title='Designs';
//    return view('welcome',[
//            'data'=>$task,//data is a variable name it can be anything and $task is data passed to that variable
//            'title'=>$title
//        ]
//    );
//});

//it can be done as

Route::get('/',function(){
    return view('welcome')->with([
    'title' =>'Designs',
    'data' =>[
        'Design travel site',
        'Design commerce site',
        'Design bus site'
    ]
    ]);
});

Route::get('/home','PagesController@home');


Route::get('/projects','ProjectsController@index');
Route::get('/projects/create','ProjectsController@create');
Route::get('/projects/{project}','ProjectsController@show');
Route::get('/projects/{project}/edit','ProjectsController@edit');
Route::post('/projects','ProjectsController@store');
Route::patch('/projects/{project}','ProjectsController@update');
Route::delete('/projects/{project}','ProjectsController@destroy');
Route::resource('posts','PostController');


