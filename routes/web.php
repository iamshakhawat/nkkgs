<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPassword;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\TC;
use App\Http\Controllers\StudentController;
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

Route::get('/', [Homepage::class, 'index'])->name('hompage');
Route::get('/users', [Homepage::class, 'users'])->name('users');


Route::get('/login', [Homepage::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost')->middleware('guest');


// Reset Password
Route::get('/forget-password', [ForgetPassword::class, 'forgetPassword'])->name('forget.password');
Route::post('/forget-password', [ForgetPassword::class, 'resetPassword'])->name('reset.password');
Route::get('/verify', [ForgetPassword::class, 'verifyEmail'])->name('verify.email');
Route::post('/set-new-password', [ForgetPassword::class, 'setNewPassword'])->name('new.password');


Route::prefix('/admin')->middleware('auth', 'rolecheck:admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/edit-profile', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/edit-profile', [AdminController::class, 'updateAdmin'])->name('admin.editPost');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/change-password', [AdminController::class, 'changePassword'])->name('admin.change.password');
    Route::post('/set-new-password', [AdminController::class, 'setNewPassword'])->name('admin.new.password');
    Route::get('/account-delete', [AdminController::class, 'deleteAccount'])->name('admin.account.delete');


    // Admin
    Route::get('/all-admin', [AdminController::class, 'allAdmin'])->name('admin.all.admin');
    Route::get('/preview-admin/{id}', [AdminController::class, 'previewAdmin'])->name('admin.preview.admin');
    Route::get('/edit-admin/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit.admin');
    Route::get('/admin-move-to-trash/{id}', [AdminController::class, 'moveTrashAdmin'])->name('admin.movetotrash.admin');
    Route::get('/delete-admin/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete.admin');
    Route::get('/add-admin', [AdminController::class, 'addAdmin'])->name('admin.add.admin');
    Route::post('/add-admin', [AdminController::class, 'insertAdmin'])->name('admin.insert.admin');


    // Export
    require __DIR__ . '/export.php';


    // Trash
    Route::get('/admin-trash', [AdminController::class, 'adminTrash'])->name('admin.trash.admin');
    Route::get('/admin-restore/{id}', [AdminController::class, 'adminRestore'])->name('admin.restore.admin');


    // Teacher 
    Route::get('/all-teacher', [AdminController::class, 'AllTeacher'])->name('admin.all.teacher');
    Route::get('/all-teacher-list', [AdminController::class, 'AllTeacherList'])->name('admin.all.teacher.list');
    Route::get('/teacher/{id}', [AdminController::class, 'SingleTeacher'])->name('admin.profile.teacher');
    Route::get('/teacher/edit/{id}', [AdminController::class, 'EditTeacher'])->name('admin.edit.teacher');
    Route::post('/teacher/edit', [AdminController::class, 'UpdateTeacher'])->name('admin.editPost.teacher');
    Route::get('/add-teacher', [AdminController::class, 'AddTeacher'])->name('admin.add.teacher');
    Route::post('/add-teacher', [AdminController::class, 'AddNewTeacher'])->name('admin.addPost.teacher');
    Route::post('/delete-teacher', [AdminController::class, 'DeleteTeacher'])->name('admin.delete.teacher');
    Route::post('/forcedelete-teacher', [AdminController::class, 'forceDeleteTeacher'])->name('admin.forcedelete.teacher');

    // Teacher Trash
    Route::get('/teacher-trash', [AdminController::class, 'teacherTrash'])->name('admin.teacher.trash');
    Route::get('/restore-teacher/{id}', [AdminController::class, 'restoreTeacher'])->name('admin.restore.teacher');


    // Student
    Route::get('/student/{id}', [AdminController::class, 'studentProfile'])->name('admin.student.profile');
    Route::get('/all-student', [AdminController::class, 'allStudent'])->name('admin.all.student');
    Route::get('/all-student-list', [AdminController::class, 'allStudentList'])->name('admin.all.student.list');
    Route::get('/edit-student/{id}', [AdminController::class, 'editStudent'])->name('admin.edit.student');
    Route::post('/update-student', [AdminController::class, 'updateStudent'])->name('admin.editPost.student');
    Route::get('/add-student', [AdminController::class, 'addStudent'])->name('admin.add.student');
    Route::post('/insert-student', [AdminController::class, 'insertStudent'])->name('admin.insert.student');

    // Student Trash
    Route::get('/student-trash', [AdminController::class, 'studentTrash'])->name('admin.student.trash');
    Route::get('/restore-student/{id}', [AdminController::class, 'restorestudent'])->name('admin.restore.student');
    Route::post('/student-move-to-trash', [AdminController::class, 'movetoTrashStudent'])->name('admin.movetotrash.student');
    Route::post('/delete-student', [AdminController::class, 'deleteStudent'])->name('admin.delete.student');

    // Parent
    Route::get('/all-parents', [AdminController::class, 'allParent'])->name('parent.all');
    Route::get('/parent-profile/{id}', [AdminController::class, 'parentProfile'])->name('parent.profile');
    Route::get('/edit-parent-profile/{id}', [AdminController::class, 'editProfile'])->name('edit.parent.profile');
    Route::post('/delete-parent', [AdminController::class, 'moveToTrash'])->name('parent.movetotrash');
    Route::post('/update-parent', [AdminController::class, 'updateParent'])->name('parent.editPost');
    Route::get('/add-parent', [AdminController::class, 'addparent'])->name('add.parent');
    Route::post('/add-parent', [AdminController::class, 'insertParent'])->name('add.parent.post');
    Route::get('/connect-with-student',[AdminController::class,'connectwithstudent'])->name('connect.with.student');
    Route::post('/select-student-for-connect',[AdminController::class,'selectStudentforConnect'])->name('selectStudentforConnect');


    // TC 
    Route::get('/tc', [AdminController::class, 'tc'])->name('admin.tc');
    Route::get('/preview-tc/{tc_id}/{student_id}', [AdminController::class, 'previewTc'])->name('admin.preview-tc');
    Route::get('/tc-trash', [AdminController::class, 'tcTrash'])->name('admin.tctrash');
    Route::get('/move-to-tc-trash/{id}', [AdminController::class, 'movetotctrash'])->name('admin.movetotctrash');
    Route::get('/tc-restore/{tc_id}', [AdminController::class, 'tcrestore'])->name('admin.tcrestore');
    Route::post('/tc-delete', [AdminController::class, 'tcdelete'])->name('admin.tcdelete');
    Route::post('/tc-approve', [AdminController::class, 'tcapprove'])->name('admin.tcapprove');
    Route::post('/tc-reject', [AdminController::class, 'tcreject'])->name('admin.tcreject');
    Route::get('/tc-download/{id}', [AdminController::class, 'tcdownload'])->name('admin.tcdownload');

    // Book List
    Route::get('/book-list', [AdminController::class, 'book_list'])->name('admin.booklist');
    Route::post('/add-book-list', [AdminController::class, 'addbooklist'])->name('admin.addbooklist');
    Route::get('/download-book/{id}', [AdminController::class, 'downloadBook'])->name('admin.downloadbookpdf');
    Route::get('/delete-book/{id}', [AdminController::class, 'deletebooklist'])->name('admin.deletebooklist');
    Route::get('/edit-booklist/{id}', [AdminController::class, 'editbooklist'])->name('admin.editbooklist');
    Route::post('/update-booklist', [AdminController::class, 'updatebooklist'])->name('admin.editbooklistPost');

    //Admin Notice
    Route::get('/notice',[AdminController::class,'notice'])->name('admin.notice');
    Route::post('/add-notice',[AdminController::class,'addnotice'])->name('admin.addnotice');
    Route::get('/delete-notice/{id}',[AdminController::class,'deletenotice'])->name('admin.deletenotice');
    Route::post('/edit-notice',[AdminController::class,'editNotice'])->name('admin.editNotice');
    Route::post('/update-notice',[AdminController::class,'updatenotice'])->name('admin.updatenotice');

    
});

// Prefix
Route::prefix('/student')->middleware('auth','rolecheck:student')->group(function (){
    Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/logout', [StudentController::class, 'logout'])->name('student.logout');
    Route::get('/change-password', [StudentController::class, 'changePassword'])->name('student.change.password');
    Route::post('/change-password', [StudentController::class, 'changePasswordPost'])->name('student.change.password.post');
    Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::get('/edit', [StudentController::class, 'editprofile'])->name('student.edit');
    Route::post('/edit-profile', [StudentController::class, 'editprofilePost'])->name('student.editPost');
    Route::get('/apply-for-tc', [StudentController::class, 'applyfortc'])->name('student.applyfortc');
    Route::post('/apply-for-tc', [StudentController::class, 'applyfortcPost'])->name('student.applyfortcPost');
    Route::get('/tc-status', [StudentController::class, 'tcStatus'])->name('student.tcstatus');
    Route::get('/tc-download/{id}', [StudentController::class, 'tcdownload'])->name('student.tcdownload');
    Route::get('/booklist',[StudentController::class,'booklist'])->name('student.booklist');
    Route::get('/download-book/{id}', [AdminController::class, 'downloadBook'])->name('student.downloadbookpdf');
});



