<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\DataPersonalController;
use App\Http\Controllers\KependudukanController;
use App\Http\Controllers\RantingController;

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
    return view('welcome');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->name('dashboard.')->group(function () {
    Route::get('/', [RoleController::class, 'select'])->name('select');

    Route::prefix('superadmin')->name('superadmin.')->middleware('role:superadmin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('users', UserController::class);
        Route::put('users/{user}/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
        Route::delete('/user/{id}/delete', [UserController::class, 'delete']);

        Route::resource('roles', RoleController::class);
        Route::delete('/role/{id}/delete', [RoleController::class, 'delete']);
        Route::resource('rantings', RantingController::class);
        Route::delete('/ranting/{id}/delete', [RantingController::class, 'delete']);
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
        // Route::resource('rantings', RantingController::class);

        // Admin Routes
    });
    Route::prefix('petugas')->name('petugas.')->group(function () {
        // Route::get('/', [UserDashboardController::class, 'index'])->name('index');
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::prefix('data_anggota')->name('data_anggota.')->group(function () {
            Route::get('/', [AnggotaController::class, 'index'])->name('index');
            Route::post('/export', [AnggotaController::class, 'exportAnggota'])->name('export');
            Route::get('/data_personal/{no_kta}/edit', [AnggotaController::class, 'edit'])->name('data_personal.edit');
            Route::get('/kependudukan/{no_kta}/edit', [AnggotaController::class, 'editKependudukan'])->name('kependudukan.edit');
            Route::get('/pekerjaan/{no_kta}/edit', [AnggotaController::class, 'editPekerjaan'])->name('pekerjaan.edit');
            Route::get('/pendidikan/{no_kta}/edit', [AnggotaController::class, 'editPendidikan'])->name('pendidikan.edit');
            Route::get('/pelatihan/{no_kta}/edit', [AnggotaController::class, 'editPelatihan'])->name('pelatihan.edit');
            Route::get('/perizinan/{no_kta}/edit', [AnggotaController::class, 'editPerizinan'])->name('perizinan.edit');
        });



        // Edit Anggota
        // Data Personal
        Route::get('/data-personal/edit', [DataPersonalController::class, 'edit'])->name('data-personal.edit');
        Route::post('/data-personal/update', [DataPersonalController::class, 'update'])->name('data-personal.update');

        // Data Personal
        Route::get('/kependudukan/edit', [KependudukanController::class, 'edit'])->name('kependudukan.edit');
        Route::post('/kependudukan/update', [KependudukanController::class, 'update'])->name('kependudukan.update');

        // Data Personal
        Route::get('/pekerjaan/edit', [PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
        Route::post('/pekerjaan/update', [PekerjaanController::class, 'update'])->name('pekerjaan.update');

        // Data Personal
        Route::get('/perizinan/edit', [PerizinanController::class, 'edit'])->name('perizinan.edit');
        Route::post('/perizinan/update', [PerizinanController::class, 'update'])->name('perizinan.update');

        // Data Personal
        Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index');
        Route::post('/pendidikan-formal/store', [PendidikanController::class, 'storePendidikanFormal'])->name('pendidikan-formal.store');
        Route::put('/pendidikan-formal/update/{id}', [PendidikanController::class, 'updatePendidikanFormal'])->name('pendidikan-formal.update');
        Route::delete('/pendidikan-formal/delete/{id}', [PendidikanController::class, 'deletePendidikanFormal'])->name('pendidikan-formal.delete');

        Route::post('/pendidikan-profesi/store', [PendidikanController::class, 'storePendidikanProfesi'])->name('pendidikan-profesi.store');
        Route::put('/pendidikan-profesi/update/{id}', [PendidikanController::class, 'updatePendidikanProfesi'])->name('pendidikan-profesi.update');
        Route::delete('/pendidikan-profesi/delete/{id}', [PendidikanController::class, 'deletePendidikanProfesi'])->name('pendidikan-profesi.delete');


        // Pelatihan
        Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index');
        Route::post('/pelatihan/store', [PelatihanController::class, 'store'])->name('pelatihan.store');
        Route::put('/pelatihan/update/{id}', [PelatihanController::class, 'update'])->name('pelatihan.update');
        Route::delete('/pelatihan/destroy/{id}', [PelatihanController::class, 'destroy'])->name('pelatihan.destroy');
    });

    Route::prefix('anggota')->name('anggota.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        // Data Personal
        Route::get('/data-personal/edit', [DataPersonalController::class, 'edit'])->name('data-personal.edit');
        Route::post('/data-personal/update', [DataPersonalController::class, 'update'])->name('data-personal.update');

        // Data Personal
        Route::get('/kependudukan/edit', [KependudukanController::class, 'edit'])->name('kependudukan.edit');
        Route::post('/kependudukan/update', [KependudukanController::class, 'update'])->name('kependudukan.update');

        // Data Personal
        Route::get('/pekerjaan/edit', [PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
        Route::post('/pekerjaan/update', [PekerjaanController::class, 'update'])->name('pekerjaan.update');

        // Data Personal
        Route::get('/perizinan/edit', [PerizinanController::class, 'edit'])->name('perizinan.edit');
        Route::post('/perizinan/update', [PerizinanController::class, 'update'])->name('perizinan.update');

        // Data Personal
        Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index');
        Route::post('/pendidikan-formal/store', [PendidikanController::class, 'storePendidikanFormal'])->name('pendidikan-formal.store');
        Route::put('/pendidikan-formal/update/{id}', [PendidikanController::class, 'updatePendidikanFormal'])->name('pendidikan-formal.update');
        Route::delete('/pendidikan-formal/delete/{id}', [PendidikanController::class, 'deletePendidikanFormal'])->name('pendidikan-formal.delete');

        Route::post('/pendidikan-profesi/store', [PendidikanController::class, 'storePendidikanProfesi'])->name('pendidikan-profesi.store');
        Route::put('/pendidikan-profesi/update/{id}', [PendidikanController::class, 'updatePendidikanProfesi'])->name('pendidikan-profesi.update');
        Route::delete('/pendidikan-profesi/delete/{id}', [PendidikanController::class, 'deletePendidikanProfesi'])->name('pendidikan-profesi.delete');


        // Pelatihan
        Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index');
        Route::post('/pelatihan/store', [PelatihanController::class, 'store'])->name('pelatihan.store');
        Route::put('/pelatihan/update/{id}', [PelatihanController::class, 'update'])->name('pelatihan.update');
        Route::delete('/pelatihan/destroy/{id}', [PelatihanController::class, 'destroy'])->name('pelatihan.destroy');
    });
});

require __DIR__ . '/auth.php';
