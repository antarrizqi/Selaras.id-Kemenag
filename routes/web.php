<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MatchController;

// --- PUBLIC ---
Route::get('/', fn() => view('landing-page'));

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


// --- USER FLOW ---
Route::middleware(['auth', 'role:user'])->group(function () {

    // CREATE PROFILE
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    // USER DASHBOARD FLOW
    Route::get('/user', function () {

        $user = auth::user();

        if (!$user->profile) {
            return redirect('/profile/create');
        }

        $status = $user->profile->status;

        // 🔥 AMBIL DATA REQUEST MASUK
        $requests = \App\Models\Taaruf::with('fromUser.profile')
            ->where('to_user_id', $user->id)
            ->where('status', 'pending')
            ->get();

        if ($status == 'pending') {
            return view('user.pending', compact('requests'));
        }

        if ($status == 'rejected') {
            return view('user.rejected', compact('requests'));
        }

        if ($status == 'approved') {
            return view('dashboard.user', compact('requests')); // 🔥 PENTING
        }
    });

    // MATCH
    Route::get('/match', [MatchController::class, 'index'])
        ->name('match.index')
        ->middleware('profile.check');

    // PROFILE DETAIL
    Route::get('/profile/{id}', [ProfileController::class, 'show'])
        ->name('profile.show');

    // EDIT PROFILE
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile/{id}', [ProfileController::class, 'update'])
        ->name('profile.update');
});


// --- ADMIN ---
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/profiles', [AdminController::class, 'index'])
        ->name('admin.profiles');

    Route::get('/admin/profile/{id}', [AdminController::class, 'show'])
        ->name('admin.view');

    Route::post('/admin/profile/{id}/approve', [AdminController::class, 'approve'])
        ->name('admin.approve');

    Route::post('/admin/profile/{id}/reject', [AdminController::class, 'reject'])
        ->name('admin.reject');
});


// taarup rut
use App\Http\Controllers\TaarufController;

Route::middleware(['auth', 'role:user'])->group(function () {

    Route::post('/taaruf/request', [TaarufController::class, 'request'])->name('taaruf.request');

    Route::post('/taaruf/{id}/accept', [TaarufController::class, 'accept'])->name('taaruf.accept');

    Route::post('/taaruf/{id}/reject', [TaarufController::class, 'reject'])->name('taaruf.reject');
});

// route mediator
Route::middleware(['auth', 'role:mediator'])->group(function () {
    Route::get('/mediator', function () {

        $data = \App\Models\Taaruf::with(['fromUser', 'toUser'])
            ->where('status', 'accepted')
            ->get();

        return view('dashboard.mediator', compact('data'));
    });
});



Route::get('/profile/create', [ProfileController::class, 'create'])
    ->name('profile.create');

Route::post('/profile', [ProfileController::class, 'store'])
    ->name('profile.store');

Route::get('/profile/{id}', [ProfileController::class, 'show'])
    ->name('profile.show');



// CREATE
Route::get('/profile/create', [ProfileController::class, 'create'])
    ->name('profile.create');

// STORE
Route::post('/profile', [ProfileController::class, 'store'])
    ->name('profile.store');

// SHOW
Route::get('/profile/{id}', [ProfileController::class, 'show'])
    ->name('profile.show');

// EDIT
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])
    ->name('profile.edit');

// UPDATE
Route::put('/profile/{id}', [ProfileController::class, 'update'])
    ->name('profile.update');

Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/match', [MatchController::class, 'index'])
        ->middleware('profile.check');

    Route::post('/taaruf/request', [TaarufController::class, 'request']);
});

Route::middleware(['auth', 'role:mediator'])->group(function () {

    Route::get('/mediator', function () {
        return view('dashboard.mediator');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);
});


Route::middleware(['auth','role:mediator'])->group(function () {
    Route::get('/mediator', function () {

        $data = \App\Models\Taaruf::with(['fromUser','toUser'])
            ->where('status', 'accepted')
            ->get();

        return view('dashboard.mediator', compact('data'));
    });
});