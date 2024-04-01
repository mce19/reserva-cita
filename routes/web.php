<?php

use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Bookings\ScheduleAvailability;
use App\Bookings\SlotRangeGenerator;
use App\Models\Service;

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

Route::get('/', function () {

   $generator = (new SlotRangeGenerator(now()->startOfDay(), now()->addDay()->endOfDay()));

   dd($generator->generate(30));
});
  