<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPassword;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TC;
use App\Http\Controllers\TeacherController;
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



Route::get('/test',function (){
    return view('studentportal.index');
} );




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
    Route::get('/all-teacher', [TeacherController::class, 'AllTeacher'])->name('admin.all.teacher');
    Route::get('/all-teacher-list', [TeacherController::class, 'AllTeacherList'])->name('admin.all.teacher.list');
    Route::get('/teacher/{id}', [TeacherController::class, 'SingleTeacher'])->name('admin.profile.teacher');
    Route::get('/teacher/edit/{id}', [TeacherController::class, 'EditTeacher'])->name('admin.edit.teacher');
    Route::post('/teacher/edit', [TeacherController::class, 'UpdateTeacher'])->name('admin.editPost.teacher');
    Route::get('/add-teacher', [TeacherController::class, 'AddTeacher'])->name('admin.add.teacher');
    Route::post('/add-teacher', [TeacherController::class, 'AddNewTeacher'])->name('admin.addPost.teacher');
    Route::post('/delete-teacher', [TeacherController::class, 'DeleteTeacher'])->name('admin.delete.teacher');
    Route::post('/forcedelete-teacher', [TeacherController::class, 'forceDeleteTeacher'])->name('admin.forcedelete.teacher');

    // Teacher Trash
    Route::get('/teacher-trash', [TeacherController::class, 'teacherTrash'])->name('admin.teacher.trash');
    Route::get('/restore-teacher/{id}', [TeacherController::class, 'restoreTeacher'])->name('admin.restore.teacher');


    // Student
    Route::get('/student/{id}', [StudentController::class, 'studentProfile'])->name('admin.student.profile');
    Route::get('/all-student', [StudentController::class, 'allStudent'])->name('admin.all.student');
    Route::get('/all-student-list', [StudentController::class, 'allStudentList'])->name('admin.all.student.list');
    Route::get('/edit-student/{id}', [StudentController::class, 'editStudent'])->name('admin.edit.student');
    Route::post('/update-student', [StudentController::class, 'updateStudent'])->name('admin.editPost.student');
    Route::get('/add-student', [StudentController::class, 'addStudent'])->name('admin.add.student');
    Route::post('/insert-student', [StudentController::class, 'insertStudent'])->name('admin.insert.student');

    // Student Trash
    Route::get('/student-trash', [studentController::class, 'studentTrash'])->name('admin.student.trash');
    Route::get('/restore-student/{id}', [studentController::class, 'restorestudent'])->name('admin.restore.student');
    Route::post('/student-move-to-trash', [studentController::class, 'movetoTrash'])->name('admin.movetotrash.student');
    Route::post('/delete-student', [StudentController::class, 'deleteStudent'])->name('admin.delete.student');


    Route::get('/all-parents', [ParentController::class, 'allParent'])->name('parent.all');
    Route::get('/parent-profile/{id}', [ParentController::class, 'parentProfile'])->name('parent.profile');
    Route::get('/edit-parent-profile/{id}', [ParentController::class, 'editProfile'])->name('edit.parent.profile');
    Route::post('/delete-parent', [ParentController::class, 'moveToTrash'])->name('parent.movetotrash');
    Route::post('/update-parent', [ParentController::class, 'updateParent'])->name('parent.editPost');
    Route::get('/add-parent', [ParentController::class, 'addparent'])->name('add.parent');
    Route::post('/add-parent', [ParentController::class, 'insertParent'])->name('add.parent.post');


    // TC 
    Route::get('/tc', [TC::class, 'tc'])->name('tc');
    Route::get('/preview-tc', [TC::class, 'previewTc'])->name('preview-tc');

    
});
