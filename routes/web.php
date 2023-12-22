<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Homepage;
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

Route::get('/',[Homepage::class,'index'])->name('hompage');


Route::get('/login',[Homepage::class,'login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'loginPost'])->name('loginPost')->middleware('guest');

Route::prefix('/admin')->middleware('auth','rolecheck:admin')->group(function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('/edit-profile',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('/edit-profile',[AdminController::class,'updateAdmin'])->name('admin.editPost');
    Route::get('/settings',[AdminController::class,'settings'])->name('admin.settings');
    Route::post('/change-password',[AdminController::class,'changePassword'])->name('admin.change.password');
    Route::get('/account-delete',[AdminController::class,'deleteAccount'])->name('admin.account.delete');
    Route::get('/forget-password',[AdminController::class,'forgetPassword'])->name('admin.forget.password');
    Route::post('/forget-password',[AdminController::class,'resetPassword'])->name('admin.reset.password');
    Route::get('/verify',[AdminController::class,'verifyEmail'])->name('admin.verify.email');

    Route::post('/set-new-password',[AdminController::class,'setNewPassword'])->name('admin.new.password');

    // Admin
    Route::get('/all-admin',[AdminController::class,'allAdmin'])->name('admin.all.admin');
    
    Route::get('/preview-admin/{id}',[AdminController::class,'previewAdmin'])->name('admin.preview.admin');
    Route::get('/edit-admin/{id}',[AdminController::class,'editAdmin'])->name('admin.edit.admin');
    Route::get('/delete-admin/{id}',[AdminController::class,'deleteAdmin'])->name('admin.delete.admin');
    Route::get('/add-admin',[AdminController::class,'addAdmin'])->name('admin.add.admin');
    Route::post('/add-admin',[AdminController::class,'insertAdmin'])->name('admin.insert.admin');

    // Export
    Route::get('/export-all-admin-exel',[AdminController::class,'exportAllAdminexel'])->name('admin.allexport.admin');
    Route::get('/export-all-admin-pdf',[AdminController::class,'exportPdfAdmins'])->name('admin.pdfexport.admin');


    // Trash
    Route::get('/admin-trash',[AdminController::class,'adminTrash'])->name('admin.trash.admin');
    Route::get('/admin-restore/{id}',[AdminController::class,'adminRestore'])->name('admin.restore.admin');
});
