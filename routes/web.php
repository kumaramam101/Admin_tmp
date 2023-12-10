<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\otherController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ToolsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminController::class, 'login']);
Route::get('/login', [AdminController::class, 'login'])->name('/login');
Route::post('/login', [AdminController::class, 'dologin'])->name('/login');

Route::get('/error404', [otherController::class, 'error_404'])->name('/error404');

Route::group(['middleware'=>['protectedPage']],function () {
    Route::get('/dashboard', [HomeController::class, 'admin'])->name('/dashboard');
    Route::get('/user', [AdminController::class, 'users'])->name('/user');
    Route::get('/addUser', [AdminController::class, 'addUser'])->name('/addUser');
    Route::post('/addUser', [AdminController::class, 'addSaveUser'])->name('/addUser');
    Route::get('/profile', [AdminController::class, 'profile'])->name('/profile');
    Route::post('/profile', [AdminController::class, 'updateProfile'])->name('/profile');

    Route::get('/terms', [ContentController::class, 'terms'])->name('/terms');
    Route::get('/add-terms', [ContentController::class, 'addTerms'])->name('/add-terms');
    Route::post('/add-terms', [ContentController::class, 'addSaveTerms'])->name('/add-terms');

    Route::get('/tools', [ToolsController::class, 'Tools'])->name('/tools');
    Route::get('/add-tool', [ToolsController::class, 'addTool'])->name('/add-tool');
    Route::get('/tool-edit/{id}', [ToolsController::class, 'editTool'])->name('/tool/edit/{id}');
    Route::post('/add-tool', [ToolsController::class, 'addSaveTools'])->name('/add-tool');

    Route::get('/contact', [otherController::class, 'contact'])->name('/contact');

    Route::get('/logout', [AdminController::class, 'logout'])->name('/logout');

});


