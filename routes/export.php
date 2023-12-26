<?php

use App\Http\Controllers\ExportExcel;
use App\Http\Controllers\ExportPDF;
use Illuminate\Support\Facades\Route;


    // Excel
    Route::get('/export-all-admin-excel',[ExportExcel::class,'AdminExportExcel'])->name('export.all.admin.excel');
    Route::get('/export-all-teacher-excel',[ExportExcel::class,'TeacherExportExcel'])->name('export.all.teacher.excel');
    Route::get('/export-all-student-excel',[ExportExcel::class,'StudentExportExcel'])->name('export.all.student.excel');


    // PDF
    Route::get('/export-all-admin-pdf',[ExportPDF::class,'ExportAllAdmin'])->name('export.all.admin.pdf');
    Route::get('/export-all-teacher-pdf',[ExportPDF::class,'ExportAllTeacher'])->name('export.all.teacher.pdf');
    Route::get('/export-all-student-pdf',[ExportPDF::class,'ExportAllStudent'])->name('export.all.student.pdf');



?>