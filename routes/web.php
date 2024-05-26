<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\AnexotermosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [PrincipalController::class, 'index'])->name('dashboard');
    Route::get('/termos', [PrincipalController::class, 'termos'])->name('index.termos');
    Route::get('/dashboard/create', [PrincipalController::class, 'create'])->name('index.create');
    Route::post('/dashboard/store', [PrincipalController::class, 'store'])->name('index.store');
    Route::get('/termos/show/{termos}', [PrincipalController::class, 'show'])->name('index.show');
    Route::delete('/termos/show/{termos}', [PrincipalController::class, 'destroy'])->name('index.destroy');
    Route::get('/termos/edit/{termos}', [PrincipalController::class, 'edit'])->name('index.edit');
    Route::put('/termos/edit/{termos}', [PrincipalController::class, 'update'])->name('index.update');

    // --------------------------

    Route::get('/termos/anexos', [AnexotermosController::class, 'index'])->name('anexos.index');
    Route::get('/termos/anexos/create', [AnexotermosController::class, 'create'])->name('anexos.create');
    Route::post('/termos/anexos/store', [AnexotermosController::class, 'store'])->name('anexos.store');
    Route::get('/arquivos/{arquivos}', [AnexotermosController::class, 'show'])->name('anexos.show');     
    Route::get('/termos/anexos/{arquivos}/edit', [AnexotermosController::class, 'edit'])->name('anexos.edit');
    Route::put('/termos/anexos/{arquivos}', [AnexotermosController::class, 'update'])->name('anexos.update');
    Route::delete('/termos/anexos/{arquivos}', [AnexotermosController::class, 'destroy'])->name('anexos.destroy');


    // ------------------------------   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
