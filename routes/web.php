<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\TaarufController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('landing-page'));

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:user'])->group(function () {

    // PROFILE
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');


    // DASHBOARD USER
    Route::get('/user', function () {

        $user = Auth::user();

        if (!$user->profile) {
            return redirect()->route('profile.create');
        }

        if ($user->profile->status == 'pending') {
            return view('user.pending');
        }

        if ($user->profile->status == 'rejected') {
            return view('user.rejected');
        }

        $incoming = \App\Models\Taaruf::with('fromUser.profile')
            ->where('to_user_id', $user->id)
            ->where('status', 'pending')
            ->get();

        $sent = \App\Models\Taaruf::with('toUser.profile')
            ->where('from_user_id', $user->id)
            ->get();

        return view('dashboard.user', compact('incoming', 'sent'));
    });


    // MATCH
    Route::get('/match', [MatchController::class, 'index'])
        ->middleware('profile.check');


    // TAARUF
    Route::post('/taaruf/request', [TaarufController::class, 'request'])->name('taaruf.request');
    Route::post('/taaruf/accept/{id}', [TaarufController::class, 'accept'])->name('taaruf.accept');
    Route::post('/taaruf/reject/{id}', [TaarufController::class, 'reject'])->name('taaruf.reject');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/profile/{id}', [AdminController::class, 'show'])
        ->name('admin.view');

    Route::post('/admin/profile/{id}/approve', [AdminController::class, 'approve'])
        ->name('admin.approve');

    Route::post('/admin/profile/{id}/reject', [AdminController::class, 'reject'])
        ->name('admin.reject');

    Route::post('/admin/make-mediator/{id}', [AdminController::class, 'makeMediator'])
        ->name('admin.makeMediator');

    Route::post('/admin/create-mediator', [AdminController::class, 'createMediator'])
        ->name('admin.createMediator');

    Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])
        ->name('admin.deleteUser');
});


/*
|--------------------------------------------------------------------------
| MEDIATOR
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:mediator'])->group(function () {

    Route::get('/mediator', function () {

        $data = \App\Models\Taaruf::with(['fromUser.profile', 'toUser.profile'])
            ->where('status', 'mediator')
            ->get();

        return view('dashboard.mediator', compact('data'));
    });

    // ⚠️ FIX: beda route biar gak tabrakan
    Route::get('/mediator/profile/{id}', [ProfileController::class, 'show'])
        ->name('mediator.profile.show');
});


/*
|--------------------------------------------------------------------------
| GLOBAL (AMAN)
|--------------------------------------------------------------------------
*/

// Taaruf process
Route::post('/taaruf/process/{id}', [TaarufController::class, 'process'])
    ->name('taaruf.process');

Route::delete('/taaruf/{id}', [TaarufController::class, 'destroy'])
    ->name('taaruf.delete');

// Incoming list (pakai auth biar aman)
Route::middleware('auth')->get('/taaruf/incoming', [TaarufController::class, 'incomingList'])
    ->name('taaruf.incoming');
