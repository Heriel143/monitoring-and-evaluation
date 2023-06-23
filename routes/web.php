<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DisaggreationController;
use App\Http\Controllers\FarmerDataController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\ProductControler;
use App\Http\Controllers\Pos\PurchaseControler;
use App\Http\Controllers\Pos\StockController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubIndicatorController;
use App\Http\Controllers\SupportingIndicatorController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\UserController;
use App\Models\Indicator;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\SubIndicator;
use App\Models\SupportingIndicator;
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
    return view('auth/login');
});

Route::get(
    '/dashboard',
    [UserController::class, 'direct']

    // return view('admin.index');
)->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/admin/edit/profile', 'editProfile')->name('edit.profile');
    Route::post('/admin/store/profile', 'updateProfile')->name('store.profile');
    Route::get('/admin/change/password', 'changePassword')->name('change.password');
    Route::post('/admin/update/password', 'updatePassword')->name('update.password');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/project/new', [ProjectController::class, 'new'])->name('project.new');
    Route::post('/profile/add', [ProjectController::class, 'add'])->name('project.add');
    Route::get('/project/all', [ProjectController::class, 'allProjects'])->name('project.all');
    Route::get('/project/delete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/project/update', [ProjectController::class, 'update'])->name('project.update');
});
Route::middleware('auth')->group(function () {
    Route::get('/indicator/add', [IndicatorController::class, 'add'])->name('indicator.add');
    Route::post('/indicator/store', [IndicatorController::class, 'store'])->name('indicator.store');
    Route::get('/indicator/add/sub', [SupportingIndicatorController::class, 'addSub'])->name('indicator.add.sub');
    Route::post('/indicator/add/sub', [SupportingIndicatorController::class, 'storeSup'])->name('indicator.store.sup');
    Route::get('/indicator/get', [IndicatorController::class, 'getIndicator'])->name('get-indicator');
    Route::get('/indicator/delete/{id}', [IndicatorController::class, 'destroy'])->name('delete.indicator');
    Route::get('/indicator/edit/{id}', [IndicatorController::class, 'edit'])->name('edit.indicator');
    Route::post('/indicator/update', [IndicatorController::class, 'update'])->name('indicator.update');
});
Route::middleware('auth')->group(function () {
    Route::get('/target/add', [TargetController::class, 'add'])->name('target.add');
    Route::post('/target/store', [TargetController::class, 'store'])->name('target.store');
    Route::get('/farmer/add', [FarmerDataController::class, 'add'])->name('data.add');
    Route::post('/farmer/store', [FarmerDataController::class, 'store'])->name('farmer.store');
    // Route::get('/indicator/add/sub', [SupportingIndicatorController::class, 'addSub'])->name('indicator.add.sub');
    // Route::post('/indicator/add/sub', [SupportingIndicatorController::class, 'storeSup'])->name('indicator.store.sup');
    // Route::get('/indicator/get', [IndicatorController::class, 'getIndicator'])->name('get-indicator');
});
Route::middleware('auth')->group(function () {
    Route::get('/disagretion/sex', [DisaggreationController::class, 'sex'])->name('get-sex');
    Route::get('/disagretion/get/all/{id}', [DisaggreationController::class, 'getAll'])->name('get.all');
    // Route::get('/farmer/add', [FarmerDataController::class, 'add'])->name('data.add');
    // Route::post('/farmer/store', [FarmerDataController::class, 'store'])->name('farmer.store');
    // Route::get('/indicator/add/sub', [SupportingIndicatorController::class, 'addSub'])->name('indicator.add.sub');
    // Route::post('/indicator/add/sub', [SupportingIndicatorController::class, 'storeSup'])->name('indicator.store.sup');
    // Route::get('/indicator/get', [IndicatorController::class, 'getIndicator'])->name('get-indicator');
});

require __DIR__ . '/auth.php';
