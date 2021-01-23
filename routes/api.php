<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Bookable;
use App\Http\Controllers\Api\BookableController;
use App\Http\Controllers\Api\BookableReviewController;
use App\Http\Controllers\Api\BookableImageController;
use App\Http\Controllers\Api\BookableAvailabilityController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\BookingByReviewController;
use App\Http\Controllers\Api\BookablePriceController;
use App\Http\Controllers\Api\CheckoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//
//Route::get('bookables', function (Request $request) {
//    return Bookable::all();
//});
//
//Route::get('bookables/{id}', function (Request $request, $id) {
//    return Bookable::findOrFail($id);
//});

Route::apiResource('bookables', BookableController::class);
Route::get('bookables/{bookable}/availability', BookableAvailabilityController::class)
    ->name('bookables.availability.show');
Route::get('bookables/{bookable}/reviews', BookableReviewController::class)
    ->name('bookables.reviews.index');
Route::get('bookables/{bookable}/images', BookableImageController::class)
    ->name('bookables.images.index');
Route::get('bookables/{bookable}/price', BookablePriceController::class)
    ->name('bookables.price.show');

Route::get('/booking-by-review/{reviewKey}', BookingByReviewController::class)
    ->name('booking.by-review.show');

Route::apiResource('reviews', ReviewController::class)->only(['show', 'store']);

Route::post('checkout', CheckoutController::class)->name('checkout');

