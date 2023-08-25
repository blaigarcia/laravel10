<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/video', function () {
    return view('video');
})->name('video');


Route::get('/getVideo/{id}',  [
    'as' => 'getVideo',
    'uses' => 'App\Http\Controllers\videoplayer1@GetVideo'
]);



Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

   
});




// Socialite Register Routes
Route::get('/social/redirect/{provider}',  [
    'as' => 'social.redirect',
    'uses' => 'App\Http\Controllers\Auth\SocialController@getSocialRedirect'
]);

Route::get('/social/handle/{provider}', [
    'as' => 'social.handle',
    'uses' => 'App\Http\Controllers\Auth\SocialController@getSocialHandle'
]);

Route::get('/login/socialite', function () {
    return view('auth.social-login');
})->name('socialite');
// Socialite Register Routes />

// Magic Link Passwordless
Route::prefix('login')->group(function() {
    Route::get('magiclink', 'App\Http\Controllers\MagiclinkController@getEmail')->name('login.magiclink');
    Route::post('send/magiclink', 'App\Http\Controllers\MagiclinkController@sendEmail')->name('login.send.magiclink');

});