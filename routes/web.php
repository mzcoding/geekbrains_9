<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;



Route::get('/', function () {
	return response()->json([
		'title' => 'Example',
		'description' => 'ExampleDescription'
	]);
});

//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	Route::view('/', 'admin.index');
	Route::resource('news', AdminNewsController::class);
	Route::resource('categories', AdminCategoryController::class);
});

//site
Route::get('/news', [NewsController::class, 'index'])
	->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])
	->where('news', '\d+')
    ->name('news.show');


Route::get('collections', function() {
	$collection = collect([
		1,2,3,45,67,8,9,56,65,768,65
	]);

	dd($collection->chunk());
});