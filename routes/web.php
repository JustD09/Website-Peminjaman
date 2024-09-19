<?php

use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PegawaiPengajuanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PetugasPengajuanController;
use App\Http\Controllers\UserController;
use App\Models\Berkas;
use App\Models\Pengajuan;
use App\Models\User;


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

Route::get('/', function () {
    return view('auth.login');
});

// Rute untuk sistem Login dan Register
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Autentikasi setelah login
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('admin_dashboard', function () {
        $pengajuan = Pengajuan::count();
        $berkas = Berkas::count();
        $totalUser = User::count();
        // $reports2 = Laporan::count();
        // , compact('allLaporan', 'reports', 'reports2', 'totalUser')
        return view('admin_dashboard', compact('pengajuan', 'berkas','totalUser'));
    })->name('admin_dashboard');
});

Route::group(['prefix' => 'petugas', 'middleware' => ['auth'], 'as' => 'petugas.'], function () {
    Route::get('petugas_dashboard', function () {
        $pengajuan = Pengajuan::count();
        $berkas = Berkas::count();
        $totalUser = User::count();
        return view('petugas_dashboard' , compact('pengajuan', 'berkas','totalUser'));
    })->name('petugas_dashboard');
});

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth'], 'as' => 'pegawai.'], function () {
    Route::get('pegawai_dashboard', function () {
        $pengajuan = Pengajuan::count();
        $berkas = Berkas::count();
        $totalUser = User::count();
        return view('pegawai_dashboard' , compact('pengajuan', 'berkas','totalUser'));
    })->name('pegawai_dashboard');
});

    // CRUD Pegawai
Route::controller(PegawaiController::class)->prefix('pegawai')->group(function () {
    Route::get('', 'index')->name('pegawai');
    Route::get('create', 'create')->name('pegawai.create');
    Route::post('store', 'store')->name('pegawai.store');
    Route::get('show/{id}', 'show')->name('pegawai.show');
    Route::get('edit/{id}', 'edit')->name('pegawai.edit');
    Route::put('edit/{id}', 'update')->name('pegawai.update');
    Route::delete('destroy/{id}', 'destroy')->name('pegawai.destroy');
});

Route::controller(PengajuanController::class)->prefix('pengajuan')->group(function () {
    Route::get('', 'index')->name('pengajuan');
    Route::get('create', 'create')->name('pengajuan.create');
    Route::post('store', 'store')->name('pengajuan.store');
    Route::get('show/{id}', 'show')->name('pengajuan.show');
    Route::get('edit/{id}', 'edit')->name('pengajuan.edit');
    Route::put('edit/{id}', 'update')->name('pengajuan.update');
    Route::delete('destroy/{id}', 'destroy')->name('pengajuan.destroy');
});

Route::controller(PegawaiPengajuanController::class)->prefix('pegawaiPengajuan')->group(function () {
    Route::get('', 'index')->name('pegawaiPengajuan');
    Route::get('create', 'create')->name('pegawaiPengajuan.create');
    Route::post('store', 'store')->name('pegawaiPengajuan.store');
    Route::get('show/{id}', 'show')->name('pegawaiPengajuan.show');
    Route::get('edit/{id}', 'edit')->name('pegawaiPengajuan.edit');
    Route::put('edit/{id}', 'update')->name('pegawaiPengajuan.update');
    Route::delete('destroy/{id}', 'destroy')->name('pegawaiPengajuan.destroy');
});

Route::controller(PetugasPengajuanController::class)->prefix('petugasPengajuan')->group(function () {
    Route::get('', 'index')->name('petugasPengajuan');
    Route::get('create', 'create')->name('petugasPengajuan.create');
    Route::post('store', 'store')->name('petugasPengajuan.store');
    Route::get('show/{id}', 'show')->name('petugasPengajuan.show');
    Route::get('edit/{id}', 'edit')->name('petugasPengajuan.edit');
    Route::put('edit/{id}', 'update')->name('petugasPengajuan.update');
    Route::delete('destroy/{id}', 'destroy')->name('petugasPengajuan.destroy');
});

    // CRUD Admin
Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('', 'index')->name('admin');
    Route::get('create', 'create')->name('admin.create');
    Route::post('store', 'store')->name('admin.store');
    Route::get('show/{id}', 'show')->name('admin.show');
    Route::get('edit/{id}', 'edit')->name('admin.edit');
    Route::put('edit/{id}', 'update')->name('admin.update');
    Route::delete('destroy/{id}', 'destroy')->name('admin.destroy');
});

    // Crud Petugas
    Route::controller(PetugasController::class)->prefix('petugas')->group(function () {
    Route::get('', 'index')->name('petugas');
    Route::get('create', 'create')->name('petugas.create');
    Route::post('store', 'store')->name('petugas.store');
    Route::get('show/{id}', 'show')->name('petugas.show');
    Route::get('edit/{id}', 'edit')->name('petugas.edit');
    Route::put('edit/{id}', 'update')->name('petugas.update');
    Route::delete('destroy/{id}', 'destroy')->name('petugas.destroy');
});




    Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });


    //     Route::get('user/{id}/download', 'download')->name('user.download');

    // Pembuatan User
    // Route::get('/users', [UserController::class, 'index'])->name('user.index');
    // Route::get('/users', [UserController::class, 'create'])->name('user.create')->middleware('auth');
    // Route::post('/users', [UserController::class, 'store'])->name('user.store')->middleware('auth');
    // Route::delete('/users', [UserController::class, 'destroy/{id}'])->name('user.destroy');

    // Clear application cache
    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return 'Application cache has been cleared';
    });

    // Clear route cache
    Route::get('/route-cache', function() {
        Artisan::call('route:cache');
        return 'Routes cache has been cleared';
    });

    // Clear config cache
    Route::get('/config-cache', function() {
        Artisan::call('config:cache');
        return 'Config cache has been cleared';
    });

    // Clear view cache
    Route::get('/view-clear', function() {
        Artisan::call('view:clear');
        return 'View cache has been cleared';
    });
