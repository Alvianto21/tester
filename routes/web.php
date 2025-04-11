<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardUsersController;

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
//rute akses halaman
Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/about', [AboutController::class,'index']);

Route::get('/posts', [PostController::class,'index']);

Route::get('/categories', [CategoryController::class,'index']); 

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

//rute data
Route::get('post/{post:slug}', [PostController::class,'show']);

Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::get('/dashboard/category/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

// Add this route to handle user profile by username
Route::get('/dashboard/users/{user:username}', [DashboardUsersController::class, 'show'])->middleware('auth');

Route::get('/dashboard/admins', [DashboardUsersController::class, 'userAdmin'])->name('dashboard.admin.users')->middleware('admin');

Route::get('/dashboard/admins/{user:username}/edit', [DashboardUsersController::class, 'adminuseredit'])->middleware('admin');

Route::put('/dashboard/admins/{user:username}', [DashboardUsersController::class, 'Adminuserupdate'])->middleware('admin');

//rute resource
Route::resource('dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::resource('dashboard/users', DashboardUsersController::class)->middleware('auth')->except('create', 'store', 'index');