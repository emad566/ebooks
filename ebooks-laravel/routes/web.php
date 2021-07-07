<?php

use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
// use Auth;
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

Route::group([
        'namespace'=>'App\Http\Controllers',
    ], function () {;

        // For Documentation Visit Link:
    // https://laracasts.com/discuss/channels/laravel/localize-app-with-jetstream
    include('routesFrtifyJetstream.php');


    //================ Email Verify =================//
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');
    //================ /Email Verify =================//

    //================ webGuard Routes =================//
    Route::group(['prefix'=>'dashboard', 'middleware' => ['auth:sanctum', 'verified']], function () {
        Route::get('/', function () {
            return view('dashboard.index');
        })->name('dashboard');



        //================ MainUser =================//
        Route::post('/user/logout', 'MainUserController@logout')->name('mainUser.logout');
        Route::get('/user/profile', 'MainUserController@profile')->name('mainUser.profile');
        Route::put('/user/profile', 'MainUserController@update')->name('mainUser.update');
        Route::get('/user/changePass', 'MainUserController@changePass')->name('mainUser.changePass');
        Route::put('/user/updatePass', 'MainUserController@updatePass')->name('mainUser.updatePass');
        //================ /MainUser =================//

        Route::middleware(['can:SupperAdmin'])->group(function () {
            //================ permissions =================//
            Route::resource('permissions', 'permissionsController');
            Route::get('permissions/{permission_id?}/delete', 'permissionsController@destroy')->name('permissions.destroy');
            Route::post('permissions/delete', 'permissionsController@delete')->name('permissions.delete');
            //================ /permissions =================//

            //================ roles =================//
            Route::resource('roles', 'rolesController');
            Route::get('roles/{role_id?}/delete', 'rolesController@destroy')->name('roles.destroy');
            Route::post('roles/delete', 'rolesController@delete')->name('roles.delete');
            //================ /roles =================//
        });

        Route::middleware(['can:manageusers'])->group(function () {
            //================ manageusers =================//
            Route::resource('manageusers', 'manageusersController');
            Route::get('manageusers/{manageuser_id?}/delete', 'manageusersController@destroy')->name('manageusers.destroy');
            Route::post('manageusers/delete', 'manageusersController@delete')->name('manageusers.delete');
            Route::get('manageusersUpdateIsActive/{user}', 'manageusersController@updateIsActive')->name('manageusers.updateIsActive');

            Route::get('/manageusers/changePass/{user_id}', 'manageusersController@changePass')->name('manageusers.changePass');
            Route::put('/manageuser/updatePass', 'manageusersController@updatePass')->name('manageusers.updatePass');

            Route::get('/manageusersreports/pdf', 'manageusersController@displayReport')->name('manageusers.displayReport');
            //================ /manageusers =================//
        });

        //================ deps =================//
        Route::resource('deps', 'depsController');
        Route::get('deps/{manageuser_id?}/delete', 'depsController@destroy')->name('deps.destroy');
        Route::post('deps/delete', 'depsController@delete')->name('deps.delete');
        //================ /deps =================//

        //================ books =================//
        Route::resource('books', 'booksController');
        Route::get('books/{manageuser_id?}/delete', 'booksController@destroy')->name('books.destroy');
        Route::post('books/delete', 'booksController@delete')->name('books.delete');
        //================ /books =================//

    });
    //================ /webGuard Routes =================//

    //================ Fornt Site Routes =================//
    Route::get('/',  'HomeController@home')->name('site.home');
    Route::get('/tables',  'HomeController@tables')->name('site.tables');

    Route::get('/run',  function ()
    {
        $invoice = Invoice::find(5);
        return $invoice->returns;
    });

    //================ /Fornt Site Routes =================//

});
