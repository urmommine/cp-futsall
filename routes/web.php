<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\BookingForm;
use App\Livewire\BookingHistory;
use App\Livewire\EventList;
use App\Livewire\JadwalPicker;
use App\Livewire\LapanganList;
use App\Livewire\PaymentUpload;
use App\Models\EventLapangan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::get('/register', function () {
    // return view('welcome');
    return redirect()->route('register');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'user'])->group(callback: function () {
    Route::get('/event', EventList::class)->name(name: 'event.list');
    Route::get('/lapangan', LapanganList::class)->name(name: 'lapangan.list');
    Route::get('/jadwal/{lapanganId}', JadwalPicker::class)->name('jadwal.select');
    Route::get('/booking/{lapanganId}/{jadwalId}', action: BookingForm::class)->name('booking.create');
    Route::get('/payment/{bookingId}', action: PaymentUpload::class)->name('payment.upload');
    Route::get('/booking/history', BookingHistory::class)->name('booking.history');
});

require __DIR__ . '/auth.php';
