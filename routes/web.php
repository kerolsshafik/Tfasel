<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth', \Laravel\Telescope\Http\Middleware\Authorize::class])
//     ->get('telescope', function () {
//         return view('telescope');
//     });



Route::get('locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('setLocale');



Route::middleware(['auth','status:writer'])->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('articles', ArticleController::class);

});


// Admin Routes
// Route::group(['middleware' => ['status:admin']], function () {
//     Route::resource('categories', CategoryController::class);
//     Route::resource('articles', ArticleController::class);

// });


// /telescope
Route::group(['middleware' => [ 'status:admin', \Laravel\Telescope\Http\Middleware\Authorize::class]], function () {
    Route::get('/telescope', function () {
        // Only authenticated users with the 'admin' role can access this route
        return view('telescope');
    });
});

// Writer Routes
// Route::group(['middleware' => ['status:writer']], function () {
//     Route::resource('articles', controller: ArticleController::class);
// });


require __DIR__.'/auth.php';
