<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Member\ProfileController;
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


Route::group(['middleware' => ['guest']], function () {
    Route::match(['GET', 'POST'], 'login', [AuthController::class, 'login'])->name('login');
    Route::match(['GET', 'POST'], 'forgot-password', [AuthController::class, 'forgot'])->name('forgot');
    Route::match(['GET', 'POST'], 'reset', [AuthController::class, 'reset'])->name('reset');
    Route::match(['GET', 'POST'], 'register', [AuthController::class, 'register'])->name('register');
    
});
Route::group(['middleware' => ['auth']], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [MemberController::class, 'index'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('change-password',[ProfileController::class,'changePassword'])->name('change-password');
    Route::post('update-user-details',[ProfileController::class,'updateUserDetails'])->name('update-user-details');

    Route::get('member-finance', [FinanceController::class,'index'])->name('member.finance');
    Route::get('member-create-contribution', [FinanceController::class,'create'])->name('member.create-contribution');
    Route::get('member-edit-contribution/{id}', [FinanceController::class,'edit'])->name('member.edit-contribution');
    Route::get('member-cancel-contribution/{id}', [FinanceController::class,'cancel'])->name('member.cancel-contribution');
    Route::post('member-store-contribution', [FinanceController::class,'store'])->name('member.store-contribution');
    Route::post('member-update-contribution/{id}', [FinanceController::class,'update'])->name('member.update-contribution');
   

});

Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin-delete-member/{id}', [AdminController::class, 'deleteMember'])->name('admin.delete-member');
    Route::get('admin-view-member-contribution/{id}', [AdminController::class, 'viewMemberContributions'])->name('admin.view-member-contribution');
    Route::get('admin-finance', [FinanceController::class, 'index'])->name('admin.finance');
    Route::get('admin-approve-contribution/{id}', [FinanceController::class, 'approve'])->name('admin.approve-contribution');
    Route::get('admin-decline-contribution/{id}', [FinanceController::class, 'decline'])->name('admin.decline-contribution');
});
