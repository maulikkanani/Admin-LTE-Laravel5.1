<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
*/

Route::get('/', function(){
	return view('layout/dashbord');         
});
Route::get('dashbord', function(){
	return view('layout/dashbord');         
});
Route::get('employees', function(){
	return view('layout/employee');         
});
Route::get('gallery', function(){
	return view('layout/gallery');       
});

Route::post('apply/multiple_upload', function(){
    $files = Input::file('images');
    foreach($files as $file) {
        $destinationPath = public_path() .'/uploads/';
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
    }
    return Redirect::to('gallery')->with('success', 'Upload successfully');
});

// News Section 
Route::get('news', "news\NewsController@getNews");   // display
Route::get('news/{name}', "news\NewsController@getNews"); //edit
Route::get('delnews/{name}', "news\NewsController@delNews"); //delete
Route::post('editnews', 'news\NewsController@editNews'); //update
Route::post('addnews', "news\NewsController@addNews"); //add

// User Section
Route::get('emp', "employee\EmployeeController@getEmp");   // display
Route::get('emp/{id}', "employee\EmployeeController@getEmp"); //edit
Route::get('delemp/{id}', "employee\EmployeeController@delEmp"); //delete
Route::post('editemp', 'employee\EmployeeController@editEmp'); //update
Route::post('addemp', "employee\EmployeeController@addEmp"); //add
Route::post('book', "BookController@index"); //add

//Login and Registration Section
Route::get('adminlogin', "Auth\AuthController@getLogin");
Route::post('adminlogin', 'Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');