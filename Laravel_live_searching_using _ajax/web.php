<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use GuzzleHttp\Promise\Create;
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
    // return view('welcome');
    return redirect('dashboard/posts');
});

// START: Authentication routes -------------------------------------------
// Route::get('register', [AuthController::class, 'registerView'])->name('auth.register');
Route::view('register', 'auth.register');
Route::post('register', [AuthController::class, 'register']);
Route::view('login', 'auth.login')->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);
// END: Authentication routes----------------------------------------------

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    
    Route::get('search', [DashboardController::class, 'search']);
    

    Route::resource('dashboard/posts', PostController::class);
    Route::resource('dashboard/categories', CategoryController::class);
    Route::get('dashboard/categories/{id}/posts', [PostController::class, 'postsByCategory']);
    Route::get('dashboard/tags/{id}/posts', [PostController::class, 'postsByTag']);

    Route::resource('dashboard/drafts', DraftController::class);
    Route::get('dashboard/categories/{id}/drafts', [DraftController::class, 'draftsByCategory']);
    Route::get('dashboard/tags/{id}/drafts', [DraftController::class, 'draftsByTag']);

    // user route 
    Route::resource('dashboard/users', UserController::class);
    Route::post('dashboard/', [UserController::class, 'search'])->name('users.search');

    // Route::post('dashboard/users/search_value/', [UserController::class, 'search'])->name('search');

    
    
   
});



