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

Route::get('/moo', function() {return view('moo');});

Route::get('/projects', function() {
	$projects = \App\Project::all();
	return view('projectsview', ['projects' => $projects]);
});

Route::get('/submit', function () {
    return view('submit');
});


use Illuminate\Http\Request;

Route::post('/submit', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'url' => 'active_url|required|max:255',
        'description' => 'required|max:255',
	'image' => 'max:255',
    ]);
    if ($validator->fails()) {
        return back()
            ->withInput()
            ->withErrors($validator);
    }
    $link = new \App\Project;
    $link->title = $request->title;
    $link->url = $request->url;
    $link->description = $request->description;
	$link->image = $request->image;
    $link->save();
    return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
