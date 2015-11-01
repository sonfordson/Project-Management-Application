<?php

Route::get('repo', ['uses' => 'GithubController@index', 'as' => 'index']);

Route::get('/finder', ['uses' => 'GithubController@finder', 'as' => 'finder']);

Route::get('/edit', ['uses' => 'GithubController@edit', 'as' => 'edit_file']);

Route::post('/update', ['uses' => 'GithubController@update', 'as' => 'update_file']);

Route::get('/commits', ['uses' => 'GithubController@commits', 'as' => 'commits']);



Route::get('auth/github', function(){
                 return SocialAuth::authorize('github');

});
Route::get('auth/github/callback', function(){
	// Automatically log in existing users
    // or create a new user if necessary.
    SocialAuth::login('github',function($user, $details){
          
      });

    // Current user is now available via Auth facade
    $user = Auth::user();
    return Redirect::to('repo');
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
