<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AttendanceController as AdminAttendanceController;

// Pemagang
use App\Http\Controllers\Pemagang\DashboardController as PemagangDashboardController;
use App\Http\Controllers\Pemagang\AttendanceController as PemagangAttendanceController;

// Shared
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('auth.login');
});

// Redirect dashboard berdasarkan role
Route::get('/dashboard', [RedirectController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard.index');

        /*
        |--------------------------------------------------------------------------
        | PESERTA
        |--------------------------------------------------------------------------
        */

        Route::get('/peserta/data', [ParticipantController::class, 'data'])
            ->name('peserta.data');

        Route::resource('peserta', ParticipantController::class)
            ->parameters(['peserta' => 'participant']); // 🔥 fix pesertum bug

        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */

        Route::get('/users/data', [UsersController::class, 'data'])
            ->name('users.data');

        Route::resource('users', UsersController::class);

        Route::put('/users/{user}/status', [UsersController::class, 'toggleStatus'])
            ->name('users.status');

        /*
        |--------------------------------------------------------------------------
        | QR CODE ABSENSI
        |--------------------------------------------------------------------------
        */

        Route::get('/attendance/qrcode', [AdminAttendanceController::class, 'showQrCode'])
            ->name('attendance.qrcode');

        /*
        |--------------------------------------------------------------------------
        | PROFILE
        |--------------------------------------------------------------------------
        */

        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');
    });

/*
|--------------------------------------------------------------------------
| PEMAGANG
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:pemagang'])
    ->prefix('pemagang')
    ->name('pemagang.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [PemagangDashboardController::class, 'index'])
            ->name('dashboard.index');

        // Absensi
        Route::get('/attendance', [PemagangAttendanceController::class, 'index'])
            ->name('attendance.index');

        Route::get('/attendance/record', [PemagangAttendanceController::class, 'record'])
            ->name('attendance.record');

        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');
    });

/*
|--------------------------------------------------------------------------
| AUTH (Laravel Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
