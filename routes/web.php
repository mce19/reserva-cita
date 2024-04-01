<?php

use App\Models\Service;
use App\Models\Employee;
use Illuminate\Support\Carbon;
use App\Bookings\SlotRangeGenerator;
use Illuminate\Support\Facades\Route;
use App\Bookings\ScheduleAvailability;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\BookingEmployeeController;
use App\Http\Controllers\AppointmentDestroyController;

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
Carbon::setTestNow(now()->addDay()->setTimeFromTimeString('09:00:00'));

Route::get('/', BookingController::class)->name('bookings');
Route::get('/bookings/{employee:slug}', BookingEmployeeController::class)->name('bookings.employee');
Route::get('/checkout/{employee:slug}/{service:slug}', CheckoutController::class)->name('checkout');

Route::get('/slots/{employee:slug}/{service:slug}', SlotController::class)->name('slots');

Route::post('/appointments', AppointmentController::class)->name('appointments');
Route::delete('/appointments/{appointment}', AppointmentDestroyController::class)->name('appointments.destroy');

Route::get('/confirmation/{appointment:uuid}', ConfirmationController::class)->name('confirmation');



