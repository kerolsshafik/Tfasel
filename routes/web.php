<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Front\MainController;

Route::get('/', [MainController::class, 'home']);

// Route::middleware(['auth', \Laravel\Telescope\Http\Middleware\Authorize::class])
//     ->get('telescope', function () {
//         return view('telescope');
//     });


Route::get('/Tafasel', [MainController::class, 'home'])->name('Tafasel.home');
Route::get('Tafasel/news/{category}', [MainController::class, 'news'])->name('Tafasel.news');
Route::get('Tafasel/show_article/{article}', [MainController::class, 'show_article'])->name('Tafasel.show_article');

Route::get('Tafasel/showcontact', [MainController::class, 'showcontact'])->name('Tafasel.showcontact');
Route::post('Tafasel/showcontact', [MainController::class, 'submitForm'])->name('Tafasel.submit');

Route::get('/Tafasel/login', [MainController::class, 'login'])->name('Tafasel.login');



// Route::get('locale/{locale}', function ($locale) {
//     if (in_array($locale, ['en', 'ar'])) {
//         Session::put('locale', $locale);
//         App::setLocale($locale);
//     }
//     return redirect()->back();
// })->name('setLocale');


// ------------------------------- Admin && WRITER --------------------------------------------------------------------//
Route::middleware(['auth','status:writer|admin'])->group(function () {
    Route::get('/admin', [ProfileController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);

    Route::patch('/articles/{id}/toggle-publish', [ArticleController::class, 'togglePublish'])->name('articles.togglePublish');
    Route::patch('/articles/{id}/toggle-update', [ArticleController::class, 'toggleUpdate'])->name('articles.toggleUpdate');

    Route::get('/article/softdelete', [ArticleController::class, 'view_softdelete'])->name('articles.view_softdelete');
    Route::delete('/article/{id}/softdelete', [ArticleController::class, 'softdelete'])->name('articles.softdelete');
    Route::post('/article/{id}/restore', [ArticleController::class, 'restore'])->name('articles.restore');
    Route::get('/article/restoreall', [ArticleController::class, 'restoreall'])->name('articles.restoreall');

});
Route::post('/chat', [ArticleController::class, 'chat']);
// Route::group(['middleware' => [ 'auth','status:admin']], function () {

//     Route::get('/article/softdelete', [ArticleController::class, 'view_softdelete'])->name('articles.view_softdelete');
//     Route::delete('/article/{id}/softdelete', [ArticleController::class, 'softdelete'])->name('articles.softdelete');
//     Route::post('/article/{id}/restore', [ArticleController::class, 'restore'])->name('articles.restore');
//     Route::get('/article/restoreall', [ArticleController::class, 'restoreall'])->name('articles.restoreall');
// });


// /telescope
Route::group(['middleware' => [ 'auth']], function () {
    Route::get('/telescope', function () {
        // Only authenticated users with the 'admin' role can access this route
        return view('telescope');
    });
});



require __DIR__.'/auth.php';
