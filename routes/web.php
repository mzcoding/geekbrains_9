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
use App\Http\Controllers\SocialController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;



Route::get('/', function () {
	return response()->json([
		'title' => 'Example',
		'description' => 'ExampleDescription'
	]);
});




//site
Route::get('/news', [NewsController::class, 'index'])
	->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])
	->where('news', '\d+')
    ->name('news.show');


Route::get('session', function() {
   session(['newSession' => 'newValue']);
   if(session()->has('newSession')) {

   	   session()->remove('newSession');
   }

   return "Сессии нет";
});

//backoffice
Route::group(['middleware' => 'auth'], function () {
	Route::get('/account', AccountController::class)
		->name('account');
	Route::get('/logout', function () {
		\Auth::logout();
		return redirect()->route('login');
	})->name('logout');

	//admin
	Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function() {
		Route::view('/', 'admin.index')->name('index');
		Route::resource('news', AdminNewsController::class);
		Route::resource('categories', AdminCategoryController::class);

		Route::get('/parse', ParserController::class);
	});
});

Route::group(['middleware' => 'guest'], function() {
	Route::get('/init/{driver?}', [SocialController::class, 'init'])
		->name('social.init');
	Route::get('/callback/{driver?}', [SocialController::class, 'callback'])
		->name('social.callback');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
