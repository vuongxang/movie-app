<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('now-showing', [MovieController::class, 'nowShowing'])->name('now-showing');
Route::get('coming-soon', [MovieController::class, 'comingSoon'])->name('coming-soon');
Route::get('/movies/{id}', [MovieController::class, 'detail'])->name('movies.detail');
Route::get('/get-showtimes', [ShowtimeController::class, 'getShowtimes']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/showtimes/{showtime_id}/seats', [SeatController::class, 'seatSelection'])->name('showtime.seatSelection');
    Route::post('/payment', [PaymentController::class, 'showPayment'])->name('payment.show');
    Route::post('/payment/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::get('/booking/success/{booking}', [BookingController::class, 'showSuccess'])->name('booking.success');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('genres', GenreController::class);
    Route::resource('cinemas', CinemaController::class);
    Route::resource('halls', HallController::class);
    Route::resource('showtimes', ShowtimeController::class);
    Route::resource('movies', MovieController::class);
    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');

});

require __DIR__ . '/auth.php';
