<?php

use App\Http\Controllers\Admin\AccessController;
use App\Http\Controllers\Admin\BundleController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\PublicAnnouncementController;
use App\Http\Controllers\Admin\PublicBannerController;
use App\Http\Controllers\Admin\PublicEventController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UploadFile;
use App\Http\Controllers\User\ProgramController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Xendit\Invoice;
use Xendit\Xendit;

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
Route::get('dashboard', function () {
    return redirect(route('admin.dashboard'));
})->name('dashboard');

Route::post('xendit/callback',function (Request $request){
    return response($request);
});

Route::get('/testing', function () {
    Xendit::setApiKey('xnd_development_QqB3QgKVdbR6ARcMIuKD2hd4czwdR8aHb60LsM9dSoDSCA2hzxofemGDYl25cn7');
    $params = [
        'external_id' => 'demo_147580196270',
        'payer_email' => 'sample_email@xendit.co',
        'description' => 'Trip to Bali',
        'amount' => 32000,
    ];
    $createInvoice = Invoice::create($params);
    dd($createInvoice);
});

Route::get('/', function () {
    return view('index');
});
Route::post('/summernote', [SupportController::class, 'upload'])->name('summernote');
Route::middleware(['auth:sanctum',])->name('admin.')->prefix('admin')->group(function () {
    Route::get('download/course/{link}', function ($id) {
        $detailCourse = \App\Models\CourseDetail::find($id);
        $filepath = public_path('storage/' . $detailCourse->content);
        return Response()->download($filepath);
    })->name('download.course');
    Route::get('dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::post('upload/quest/static', [UploadFile::class, 'uploadQuestStatic'])->name('upload-static');
    Route::post('upload/quest/dynamic', [UploadFile::class, 'uploadQuestDynamic'])->name('upload-dynamic');

    Route::get('program/{slug}', [ProgramController::class, 'index'])->name('program.index');

    Route::get('course/{slug}', [\App\Http\Controllers\User\CourseController::class, 'index'])->name('user.course');
    Route::get('exam/{slug}', [\App\Http\Controllers\User\ExamController::class, 'index'])->name('user.exam');
    Route::get('exam/{slug}/start', [\App\Http\Controllers\User\ExamController::class, 'start'])->name('user.exam.start');
    Route::get('exam/{slug}/exam/{id}', [\App\Http\Controllers\User\ExamController::class, 'exam'])->name('user.exam.exam');
    Route::get('exam/{slug}/discussion/{id}', [\App\Http\Controllers\User\ExamController::class, 'discussion'])->name('user.exam.discussion');
    Route::get('exam/{slug}/result/{id}', [\App\Http\Controllers\User\ExamController::class, 'result'])->name('user.exam.result');

    Route::middleware(['checkRole:1'])->group(function () {
        Route::resource('room', RoomController::class)->only('index', 'create', 'edit', 'show');
        Route::resource('announcement', PublicAnnouncementController::class)->only('index', 'create', 'edit');
        Route::resource('banner', PublicBannerController::class)->only('index', 'create', 'edit');
        Route::resource('event', PublicEventController::class)->only('index', 'create', 'edit');

        Route::get('room/{room}/exam', [ExamController::class, 'index'])->name('exam.index');
        Route::get('room/{room}/exam/create', [ExamController::class, 'create'])->name('exam.create');
        Route::get('room/{room}/exam/edit/{id}', [ExamController::class, 'edit'])->name('exam.edit');
        Route::get('room/{room}/exam/{exam}', [ExamController::class, 'show'])->name('exam.show');
        Route::get('room/{room}/exam/{exam}/step/create', [ExamController::class, 'stepCreate'])->name('exam.step.create');
        Route::get('room/{room}/exam/{exam}/step/edit/{id}', [ExamController::class, 'stepEdit'])->name('exam.step.edit');
        Route::get('room/{room}/exam/{exam}/step/{step}/question', [ExamController::class, 'question'])->name('exam.question');
        Route::get('room/{room}/exam/{exam}/step/{step}/question/create', [ExamController::class, 'questionCreate'])->name('exam.question.create');
        Route::get('room/{room}/exam/{exam}/step/{step}/question/edit/{id}', [ExamController::class, 'questionEdit'])->name('exam.question.edit');
        Route::post('room/quest/{step}/static', [UploadFile::class, 'uploadQuestStatic'])->name('upload-static');

        Route::get('room/{room}/course', [CourseController::class, 'index'])->name('course.index');
        Route::get('room/{room}/course/create', [CourseController::class, 'create'])->name('course.create');
        Route::get('room/{room}/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
        Route::get('room/{room}/course/{course}', [CourseController::class, 'show'])->name('course.show');
        Route::get('room/{room}/course/{course}/highlight/edit/{id}', [CourseController::class, 'highlightEdit'])->name('course.highlight.edit');
        Route::get('room/{room}/course/{course}/highlight/create', [CourseController::class, 'highlightCreate'])->name('course.highlight.create');
        Route::get('room/{room}/course/{course}/detail/edit{id}', [CourseController::class, 'detailEdit'])->name('course.detail.edit');
        Route::get('room/{room}/course/{course}/detail/create/{id}', [CourseController::class, 'detailCreate'])->name('course.detail.create');
        Route::get('room/{room}/course/{course}/detail/show/{id}', [CourseController::class, 'detail'])->name('course.detail');

        Route::get('access/exam', [AccessController::class, 'exam'])->name('access.exam');
        Route::get('access/course', [AccessController::class, 'course'])->name('access.course');

        Route::get('room/{room}/bundle', [BundleController::class, 'index'])->name('bundle.index');
        Route::get('room/{room}/bundle/create', [BundleController::class, 'create'])->name('bundle.create');
        Route::get('room/{room}/bundle/edit/{id}', [BundleController::class, 'edit'])->name('bundle.edit');
        Route::get('room/{room}/bundle/price/{id}', [BundleController::class, 'bundlePrice'])->name('bundle.price.index');
        Route::get('room/{room}/bundle/price/{id}/create', [BundleController::class, 'bundlePriceCreate'])->name('bundle.price.create');
        Route::get('room/{room}/bundle/detail/{id}', [BundleController::class, 'bundleDetail'])->name('bundle.detail.index');
        Route::get('room/{room}/bundle/detail/{id}/create', [BundleController::class, 'bundleDetailCreate'])->name('bundle.detail.create');
        Route::get('room/{room}/bundle/token/{id}', [BundleController::class, 'bundleToken'])->name('bundle.token.index');
        Route::get('room/{room}/bundle/token/{id}/create/{number}', [BundleController::class, 'bundleTokenCreate'])->name('bundle.token.create');
    });
//    Route::get('exam/{examSlug}', function ($examSlug) {
//        $exam=\App\Models\ExamStep::whereSlug($examSlug)->firstOrFail();
//        return view('exam',compact('exam'));
//    })->name('exam');

});
