<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;

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
    return redirect()->route('login');
})->middleware('guest');

Route::get('/home', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

// Temp public route - Update gambar produk (untuk development)
Route::get('/api/update-images-public', [ProdukController::class, 'updateProductImages']);

Route::get('/dashboard', [ProdukController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard-petugas', [ProdukController::class, 'dashboard'])->middleware(['auth'])->name('dashboard-petugas');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Pages Routes
Route::middleware('web')->group(function () {
    Route::get('/pages/tables', function () {
        return view('pages.tables');
    })->name('tables');

    Route::get('/pages/virtual-reality', function () {
        return view('pages.virtual-reality');
    })->name('virtual-reality');

    Route::get('/pages/rtl', function () {
        return view('pages.rtl');
    })->name('rtl');
});

// Kasir Routes
Route::middleware(['auth'])->group(function () {
    // Pendataan Barang
    Route::resource('produk', ProdukController::class);
    Route::get('/produk/kategori/{kategori}', [ProdukController::class, 'kategori'])->name('produk.kategori');
    Route::get('/cleanup-duplicates', [ProdukController::class, 'cleanupDuplicates'])->name('cleanup.duplicates');
    Route::get('/api/daily-sales', [ProdukController::class, 'getDailySalesData'])->name('api.daily-sales');
    Route::get('/api/petugas-daily-sales', [ProdukController::class, 'getPetugasDailySalesData'])->name('api.petugas-daily-sales');
    Route::get('/api/today-transactions', [ProdukController::class, 'getTodayTransactions'])->name('api.today-transactions');
    Route::get('/api/petugas-stats', [ProdukController::class, 'getPetugasStatsData'])->name('api.petugas-stats');
    
    // Upload Gambar API
    Route::post('/api/upload-gambar', [ProdukController::class, 'uploadGambar'])->name('api.upload-gambar');
    
    // Pembelian - Custom routes BEFORE resource
    Route::get('/penjualan', function () {
        return redirect()->route('penjualan.menu');
    });
    Route::get('/penjualan/menu', [PenjualanController::class, 'menu'])->name('penjualan.menu');
    Route::get('/penjualan/history', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('/penjualan/report', [PenjualanController::class, 'report'])->name('penjualan.report');
    Route::post('/penjualan/transaction', [PenjualanController::class, 'transaction'])->name('penjualan.transaction');
    Route::post('/penjualan/confirm', [PenjualanController::class, 'confirm'])->name('penjualan.confirm');
    Route::get('/penjualan/{penjualan}/receipt', [PenjualanController::class, 'receipt'])->name('penjualan.receipt');
    Route::resource('penjualan', PenjualanController::class, ['except' => ['index']]);
    
    // Stok Barang
    Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
    
    // Account Management (Admin Only)
    Route::middleware('admin')->group(function () {
        Route::get('/accounts', [UserController::class, 'index'])->name('accounts.index');
        Route::get('/accounts/{user}', [UserController::class, 'show'])->name('accounts.show');
        Route::get('/accounts/{user}/edit', [UserController::class, 'edit'])->name('accounts.edit');
        Route::put('/accounts/{user}', [UserController::class, 'update'])->name('accounts.update');
        Route::delete('/accounts/{user}', [UserController::class, 'destroy'])->name('accounts.destroy');
    });

    // Petugas Routes
    Route::middleware('petugas')->group(function () {
        Route::get('/petugas/profil', [UserController::class, 'petugasProfile'])->name('petugas.profile');
        Route::put('/petugas/profil', [UserController::class, 'petugasUpdateProfile'])->name('petugas.update-profile');
    });
    
    // Temp route - Update gambar produk
    Route::get('/update-product-images', [ProdukController::class, 'updateProductImages'])->name('update.product.images');
    Route::get('/debug-products', [ProdukController::class, 'debugProducts'])->name('debug.products');
});
