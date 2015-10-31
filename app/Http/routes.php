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


Route::get('auth/github', function(){
                 return SocialAuth::authorize('github');

});
Route::get('auth/github/callback', function(){
	// Automatically log in existing users
    // or create a new user if necessary.
    SocialAuth::login('github',function($user, $details){
          dd($details->raw());
      });

    // Current user is now available via Auth facade
    $user = Auth::user();
    return Redirect::to('home');
});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function () {
    return view('loggedin');
});
