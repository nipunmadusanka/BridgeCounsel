<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeControler;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeControler::class, 'index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// routes/web.php

Route::get('/encryption-key', function () {
    return response()->json([
        'key' => base64_encode(config('app.key'))
    ]);
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/postblog', [ProfileController::class, 'postBlog'])->name('post-blog');
    Route::post('/addpost', [ProfileController::class, 'addPost'])->name('add-post');
    // Route::get('/chat', [ProfileController::class, 'chat'])->name('chat');
    Route::get('/viewmychat/{id}', [HomeControler::class, 'viewMyChat'])->name('viewmyChat');
    Route::post('/postchat', [HomeControler::class, 'postChat'])->name('postchat');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/blog', [HomeControler::class, 'blogPage'])->name('blog-page');
Route::get('/viewblog/{id}', [HomeControler::class, 'viewBlog'])->name('view-blog');
Route::get('/about', [HomeControler::class, 'aboutPage'])->name('about-page');



require __DIR__ . '/auth.php';
