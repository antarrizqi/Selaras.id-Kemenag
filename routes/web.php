<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('landing-page'));

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);


/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // ========================
    // PROFILE (CV USER)
    // ========================
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');


    // ========================
    // DASHBOARD ROLE
    // ========================

    Route::get('/admin', fn() => view('dashboard.admin'));

    Route::get('/mediator', fn() => view('dashboard.mediator'));

    // ========================
    // USER FLOW (SMART REDIRECT)
    // ========================

    Route::get('/user', function () {
        $user = Auth::user();

        if (!$user->profile) {
            return redirect('/profile/create');
        }

        return redirect('/match');
    });


    // ========================
    // MATCH (BUTUH PROFILE)
    // ========================

    Route::get('/match', fn() => "Halaman cari pasangan")->middleware('profile.check');

});