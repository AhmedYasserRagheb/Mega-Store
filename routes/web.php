<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CancellationController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MyProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeController;
use GuzzleHttp\Promise\CancellationException;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Catch_;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



// start user controller 
Route::controller(adminController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('redirect', 'redirect');
    Route::get('details/{id}', 'details');
    Route::get('addToCard/{id}', 'addToCard');
    Route::get('cash', 'user_card');
    Route::get('payment/{total_price}', 'stripe');
    Route::post('stripe/{total_price}', 'stripePost')->name('stripe.post');
    Route::get('userOrders', 'userOrders');
    Route::get('deliver/{id}', 'deliverd');
    Route::get('print_pdf/{id}', 'pdf');
    Route::get('search', 'search');

    Route::get('show_comment/{id}', 'comments');
   
    Route::get('all_products', 'all_products');

    
});

Route::prefix('UserCard')->group(function () {
    Route::get('/headerCard', [CardController::class, 'showCard']);
    Route::get('/remove/{id}', [CardController::class, 'destroy']);
});
//////////////////////////

Route::controller(CategoryController::class)->group(function () {
    Route::get('/Category', 'index');
    Route::post('/store', 'store');
    Route::get('/delete/{id}', 'destroy');
    Route::patch('/update', 'update');
    Route::get('/deleteAll', 'deleteAll');
});
// end categorycontroller route 

// start product controller 
Route::controller(ProductController::class)->group(function () {
    Route::get('/addProduct', 'index');
    Route::post('/storeProduct', 'store');
    Route::get('/showProducts', 'show');
    Route::get('/deletProduct/{id}', 'destroy');
    Route::patch('/update', 'update');
});
// end product controller 

// start cancellation controller
// Route::get('OrdersCancellation',[CancellationController::class, 'index']);
Route::controller(CancellationController::class)->group(function(){
    Route::get('OrdersCancellation', 'index');
    Route::get('cancel/{id}', 'cancel');
});
// end cancellation controller 

// start subscribe controller
Route::get('subscribe', [SubscribeController::class, 'subscribe']);
// end subscribe controller 

// Route::controller(CommentController::class)->group(function(){
//     Route::get('show_comment/{id}', 'comments');
// });