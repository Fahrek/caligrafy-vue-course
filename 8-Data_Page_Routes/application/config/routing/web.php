<?php
/**
 * web.php
 * Web Routes are defined in this file
 * @author Dory A.Azar
 * @copyright 2019
 * @version 1.0
 *
*/

use Caligrafy\Auth;
use Caligrafy\Route;
use \Exception as Exception;

try {
    
    // API ACCESS - add comments if you don't want to allow API access on routes
    Auth::activateAPI();
    
    
    // AUTHENTICATION - Remove comment if you have an authentication implemented
    //Auth::authentication('User', 'users');
    
    // PAGE Routes
    Route::get('/myapp', function() {
       return view('Client/app', array('app' => 'index')); 
    });
    
    
    // ROUTE DEFINITION: get, post, put and delete
	Route::get('/api/', 'ProjectController');   
    Route::post('/api/new', 'ProjectController@addProject');
    Route::delete('/api/{id}/delete', 'ProjectController@deleteProject');
    Route::put('/api/{id}/edit', 'ProjectController@editProject');
    Route::get('/api/{id}', 'ProjectController@readProject');
    
    
    
    // Auth Routes - Uncomment only if AUTHENTICATION activated above
    //Route::get('/home', 'AuthController@home');
    //Route::get('/login', 'AuthController');
    //Route::get('/logout', 'AuthController@logout');
    //Route::get('/register', 'AuthController@registerForm');
    //Route::post('/login', 'AuthController@login');
    //Route::post('/register', 'AuthController@register');

    
    // MUST NOT BE REMOVED - Routes need to be run after being defined 
    Route::run(); 
}
catch (Exception $e) {
    
    // Error handling 
    echo $e->getMessage();
}



