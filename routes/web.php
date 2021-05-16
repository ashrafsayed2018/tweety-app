<?php
//    DB::listen(function ($query) {
//    var_dump($query->sql); $query->bindings;
// });
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('tweets', 'TweetController@index')->name('home');
    Route::post('tweets', 'TweetController@store');
    Route::Post('/profiles/{user:username}/follow', 'FollowController@store')->name('follow');
    Route::get('/profiles/{user:username}/edit', 'ProfileController@edit');
    Route::patch('/profiles/{user:username}', 'ProfileController@update');
    Route::get('explore','ExploreController')->name('explore');
    Route::POST('/tweets/{tweet}/likes','TweetLikeController@store');
    Route::DELETE('/tweets/{tweet}/likes','TweetLikeController@destroy');
    Route::get('notifications','UserNotificationController@show')->name('notifications.show');

});

Route::get('/profiles/{user:username}', 'ProfileController@show')->name('profile');
