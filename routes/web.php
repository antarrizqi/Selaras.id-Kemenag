<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MatchController;

// ROUTE PUBLIC

Route::get('/', fn() => view('landing-page'));

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

// ALUR USER

Route::middleware(['auth', 'role:user'])->group(function () {

    // CREATE PROFILE
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    // USER DASHBOARD LOGIC
    Route::get('/user', function () {

        $user = auth::user();

        if (!$user->profile) {
            return redirect('/profile/create');
        }

        $status = $user->profile->status;

        if ($status == 'pending') {
            return view('user.pending');
        }

        if ($status == 'rejected') {
            return view('user.rejected');
        }

        if ($status == 'approved') {
            return redirect('/match');
        }
    });

    // MATCH (DASHBOARD UTAMA USER)
    Route::get('/match', [MatchController::class, 'index'])
        ->middleware('profile.check');
});

// ADMIN ALUR

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/profiles', [AdminController::class, 'index'])->name('admin.profiles');
    Route::get('/admin/profile/{id}', [AdminController::class, 'show'])->name('admin.view');

    Route::post('/admin/profile/{id}/approve', [AdminController::class, 'approve'])->name('admin.approve');

    Route::post('/admin/profile/{id}/reject', [AdminController::class, 'reject'])->name('admin.reject');
});

// MEDIATOR BELUM KEPAKE 

// Route::middleware(['auth', 'role:mediator'])->group(function () {
//     Route::get('/mediator', fn() => view('dashboard.mediator'));
// });

// pas user di reject
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
