<?php

use App\Models\Announcement;

use App\Models\Bukti;
// Guest
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Controller User
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

// Controller Admin
use App\Http\Controllers\admin\AccountController as AdminAccountController;
use App\Http\Controllers\admin\OfficerController as AdminOfficerController;

// General
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\AnnouncementController as AdminAnnouncemenetController;
use App\Http\Controllers\admin\PelanggarController as AdminPelanggarController;
use App\Http\Controllers\admin\KriminalController as AdminKriminalController;
use App\Http\Controllers\admin\BuktiController as AdminBuktiController;
use App\Http\Controllers\admin\SaksiController as AdminSaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $announcements = Announcement::orderBy('created_at', 'DESC')->get();
    return view('welcome', [
        'announcements' => $announcements,
        'tersangka' => Bukti::orderBy('created_at', 'DESC')->get()
    ]);
})->name('landingpage');

Route::middleware('guest')->group(function(){
    Route::prefix('login')->name('login.')->group(function(){
        Route::get('/', [LoginController::class, 'index'])->name('index');
        Route::post('/verify', [LoginController::class, 'verify'])->name('verify');
    });
    Route::prefix('register')->name('register.')->group(function(){
        Route::get('/', [RegisterController::class, 'index'])->name('index');
        Route::post('/store', [RegisterController::class, 'store'])->name('store');
    });
});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('admin')->prefix('/admin')->name('admin.')->group(function(){
    Route::get('/home',[AdminDashboardController::class, 'index'])->name('home');
    Route::prefix('/account')->name('account.')->group(function(){
        Route::get('/', [AdminAccountController::class, 'index'])->name('index');
        Route::get('/create', [AdminAccountController::class, 'create'])->name('create');
        Route::post('/store', [AdminAccountController::class, 'store'])->name('store');
        Route::get('/user-print', [AdminAccountController::class, 'userPrint'])->name('user-print');
        Route::get('/admin-print', [AdminAccountController::class, 'adminPrint'])->name('admin-print');
        Route::prefix('/{id}')->group(function(){
            Route::get('/edit', [AdminAccountController::class, 'edit'])->name('edit');
            Route::put('/update', [AdminAccountController::class, 'update'])->name('update');
            Route::delete('/delete', [AdminAccountController::class, 'delete'])->name('delete');
        });
    });
    Route::prefix('/announcement')->name('announcement.')->group(function(){
        Route::get('/', [AdminAnnouncemenetController::class, 'index'])->name('index');
        Route::get('/create', [AdminAnnouncemenetController::class, 'create'])->name('create');
        Route::post('/store', [AdminAnnouncemenetController::class, 'store'])->name('store');
        Route::get('/print', [AdminAnnouncemenetController::class, 'print'])->name('print');
        Route::prefix('/{id}')->group(function(){
            Route::get('/edit', [AdminAnnouncemenetController::class, 'edit'])->name('edit');
            Route::put('/update', [AdminAnnouncemenetController::class, 'update'])->name('update');
            Route::delete('/delete', [AdminAnnouncemenetController::class, 'delete'])->name('delete');
        });
    });
    Route::prefix('/officer')->name('officer.')->group(function(){
        Route::get('/', [AdminOfficerController::class, 'index'])->name('index');
        Route::get('/create', [AdminOfficerController::class, 'create'])->name('create');
        Route::post('/store', [AdminOfficerController::class, 'store'])->name('store');
        Route::get('/print', [AdminOfficerController::class, 'print'])->name('print');
        Route::prefix('/{id}')->group(function(){
            Route::get('/edit', [AdminOfficerController::class, 'edit'])->name('edit');
            Route::put('/update', [AdminOfficerController::class, 'update'])->name('update');
            Route::delete('/delete', [AdminOfficerController::class, 'delete'])->name('delete');
        });
    });

    Route::prefix('/pelanggar')->name('pelanggar.')->group(function(){
        Route::get('/', [AdminPelanggarController::class, 'index'])->name('index');
        Route::get('/create', [AdminPelanggarController::class, 'create'])->name('create');
        Route::post('/store', [AdminPelanggarController::class, 'store'])->name('store');
        Route::prefix('/{pelanggar}')->group(function(){
            Route::get('/edit', [AdminPelanggarController::class, 'edit'])->name('edit');
            Route::put('/update', [AdminPelanggarController::class, 'update'])->name('update');
            Route::delete('/delete', [AdminPelanggarController::class, 'delete'])->name('delete');
        });
    });

    Route::prefix('/kriminal')->name('kriminal.')->group(function(){
        Route::get('/', [AdminKriminalController::class, 'index'])->name('index');
        Route::get('/create', [AdminKriminalController::class, 'create'])->name('create');
        Route::post('/store', [AdminKriminalController::class, 'store'])->name('store');
        Route::prefix('/{kriminal}')->group(function(){
            Route::get('/edit', [AdminKriminalController::class, 'edit'])->name('edit');
            Route::put('/update', [AdminKriminalController::class, 'update'])->name('update');
            Route::delete('/delete', [AdminKriminalController::class, 'delete'])->name('delete');
        });
    });

    Route::prefix('/saksi')->name('saksi.')->group(function(){
        Route::get('/', [AdminSaksiController::class, 'index'])->name('index');
        Route::get('/create', [AdminSaksiController::class, 'create'])->name('create');
        Route::post('/store', [AdminSaksiController::class, 'store'])->name('store');
        Route::prefix('/{saksi}')->group(function(){
            Route::get('/edit', [AdminSaksiController::class, 'edit'])->name('edit');
            Route::put('/update', [AdminSaksiController::class, 'update'])->name('update');
            Route::delete('/delete', [AdminSaksiController::class, 'delete'])->name('delete');
        });
    });

    Route::prefix('/bukti')->name('bukti.')->group(function(){
        Route::get('/', [AdminBuktiController::class, 'index'])->name('index');
        Route::get('/create', [AdminBuktiController::class, 'create'])->name('create');
        Route::post('/store', [AdminBuktiController::class, 'store'])->name('store');
        Route::prefix('/{bukti}')->group(function(){
            Route::get('/edit', [AdminBuktiController::class, 'edit'])->name('edit');
            Route::put('/update', [AdminBuktiController::class, 'update'])->name('update');
            Route::delete('/delete', [AdminBuktiController::class, 'delete'])->name('delete');
        });
    });
});
