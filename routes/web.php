<?php

use App\Http\Controllers\Admin\AccessController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UploadFile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/summernote', [SupportController::class, 'upload'])->name('summernote');
Route::middleware(['auth:sanctum',])->name('admin.')->prefix('admin')->group(function () {
    Route::get('download/course/{link}',function ($id){
        $detailCourse=\App\Models\CourseDetail::find($id);
        $filepath = public_path('storage/'.$detailCourse->content);
        return Response()->download($filepath);
    })->name('download.course');
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/upload/quest/static',[UploadFile::class,'uploadQuestStatic'])->name('upload-static');
    Route::post('/upload/quest/dynamic',[UploadFile::class,'uploadQuestDynamic'])->name('upload-dynamic');

    Route::get('course/{slug}',[\App\Http\Controllers\User\CourseController::class,'index'])->name('user.course');
    Route::get('exam/{slug}',[\App\Http\Controllers\User\ExamController::class,'index'])->name('user.exam');
    Route::get('exam/{slug}/start',[\App\Http\Controllers\User\ExamController::class,'start'])->name('user.exam.start');
    Route::get('exam/{slug}/state/{id}',[\App\Http\Controllers\User\ExamController::class,'exam'])->name('user.exam.exam');

    Route::middleware(['checkRole:1'])->group(function (){
        Route::resource('room', RoomController::class)->only('index', 'create', 'edit', 'show');

        Route::get('room/{room}/exam',[ExamController::class,'index'])->name('exam.index');
        Route::get('room/{room}/exam/create',[ExamController::class,'create'])->name('exam.create');
        Route::get('room/{room}/exam/edit/{id}',[ExamController::class,'edit'])->name('exam.edit');
        Route::get('room/{room}/exam/{exam}',[ExamController::class,'show'])->name('exam.show');
        Route::get('room/{room}/exam/{exam}/step/create',[ExamController::class,'stepCreate'])->name('exam.step.create');
        Route::get('room/{room}/exam/{exam}/step/edit/{id}',[ExamController::class,'stepEdit'])->name('exam.step.edit');
        Route::get('room/{room}/exam/{exam}/step/{step}/question',[ExamController::class,'question'])->name('exam.question');
        Route::get('room/{room}/exam/{exam}/step/{step}/question/create',[ExamController::class,'questionCreate'])->name('exam.question.create');
        Route::get('room/{room}/exam/{exam}/step/{step}/question/edit/{id}',[ExamController::class,'questionEdit'])->name('exam.question.edit');
        Route::post('room/quest/{step}/static',[UploadFile::class,'uploadQuestStatic'])->name('upload-static');

        Route::get('room/{room}/course',[CourseController::class,'index'])->name('course.index');
        Route::get('room/{room}/course/create',[CourseController::class,'create'])->name('course.create');
        Route::get('room/{room}/course/edit/{id}',[CourseController::class,'edit'])->name('course.edit');
        Route::get('room/{room}/course/{course}',[CourseController::class,'show'])->name('course.show');
        Route::get('room/{room}/course/{course}/highlight/edit/{id}',[CourseController::class,'highlightEdit'])->name('course.highlight.edit');
        Route::get('room/{room}/course/{course}/highlight/create',[CourseController::class,'highlightCreate'])->name('course.highlight.create');
        Route::get('room/{room}/course/{course}/detail/edit{id}',[CourseController::class,'detailEdit'])->name('course.detail.edit');
        Route::get('room/{room}/course/{course}/detail/create/{id}',[CourseController::class,'detailCreate'])->name('course.detail.create');
        Route::get('room/{room}/course/{course}/detail/show/{id}',[CourseController::class,'detail'])->name('course.detail');

        Route::get('access/exam',[AccessController::class,'exam'])->name('access.exam');
        Route::get('access/course',[AccessController::class,'course'])->name('access.course');
    });
//    Route::get('exam/{examSlug}', function ($examSlug) {
//        $exam=\App\Models\ExamStep::whereSlug($examSlug)->firstOrFail();
//        return view('exam',compact('exam'));
//    })->name('exam');

});
