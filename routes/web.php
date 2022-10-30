<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ PostController,CategoryController,HomeController,FrontendController};

// Route::middleware(['unauthenticated'])->group(function () {
    Route::get('/sumenep', [FrontendController::class, 'index'])->name('sumenep.index');
    Route::get('/category/{title}', [FrontendController::class, 'category'])->name('category');
// });
// Route::middleware(['unauthenticated'])->group(function () {
//     Route::prefix('blog')->group(function () {
//     });
// });
// Route::view('/sumenep-blog', 'pages.frontend.home.indexs');

Route::get('/login', function () {
    return view('login.index');
});

Route::middleware(['authenticated'])->group(function () {
    Route::middleware(['admin'])->group(function () {
    Route::resource('/dashboard', HomeController::class)->only(['index']);
    Route::resource('categories', CategoryController::class)->except('update','destroy','store');
    Route::resource('posts', PostController::class)->except('update','destroy','store');
});
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::resource('/', HomeController::class)->only(['index']);
});
