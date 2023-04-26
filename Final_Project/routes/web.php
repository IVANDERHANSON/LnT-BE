<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Models\Category;
use App\Models\Item;
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
    $categories = Category::all();
    $items = Item::all();
    return view('dashboard', compact('categories', 'items'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/category', [CategoryController::class, 'category'])->middleware(['auth', 'verified'])->name('category');
Route::post('addCategory', [CategoryController::class, 'addCategory'])->middleware(['auth', 'verified'])->name('addCategory');

Route::post('addItem', [ItemController::class, 'addItem'])->middleware(['auth', 'verified'])->name('addItem');
Route::get('/item', [ItemController::class, 'item'])->middleware(['auth', 'verified'])->name('item');
Route::get('/edit-item/{id}', [ItemController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit');
Route::patch('/update-item/{id}', [ItemController::class, 'update'])->middleware(['auth', 'verified'])->name('update');
Route::delete('/delete-item/{id}', [ItemController::class, 'delete'])->middleware(['auth', 'verified'])->name('delete');

Route::get('/invoice', [InvoiceController::class, 'invoice'])->middleware(['auth', 'verified'])->name('invoice');
Route::get('/print-invoice/{id}', [InvoiceController::class, 'print'])->middleware(['auth', 'verified'])->name('print');
Route::post('/saveInvoice', [InvoiceController::class, 'saveInvoice'])->middleware(['auth', 'verified'])->name('saveInvoice');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
