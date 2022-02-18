<?php

use App\Http\Controllers\Admin\AccessController;
use App\Http\Controllers\Admin\BundleController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\PublicAnnouncementController;
use App\Http\Controllers\Admin\PublicBannerController;
use App\Http\Controllers\Admin\PublicEventController;
use App\Http\Controllers\Admin\ReferralController;
use App\Http\Controllers\Admin\RoomEventController;
use App\Http\Controllers\Admin\RoomBannerController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UploadFile;
use App\Http\Controllers\User\ProgramController;
use App\Models\Payment;
use App\Models\ReportQuest;
use App\Models\User;
use App\Models\UserOwnCourse;
use App\Models\UserOwnExam;
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

Route::post('xendit/callback', function (Request $request) {
    $request = $request->all();
    $payment = Payment::where('payment_id', $request['id'])->first();
    if ($payment->referralCode != null) {
        $commission=User::find($payment->referralCode->user_id);
        $commission->update([
            'commission'=>$commission->commission+$payment->bundle->referral_money
        ]);
    }
    $payment->update(['status' => 2]);

    foreach ($payment->bundle->bundleDetails as $item) {
        if ($item->exam_id != null) {
            $uoe = UserOwnExam::where('user_id', $payment->user_id)->where('exam_id', $item->exam_id)->get();
            if ($uoe->count() == 0) {
                UserOwnExam::create(['user_id' => $payment->user_id, 'exam_id' => $item->exam_id]);
            }
        }
        if ($item->course_id != null) {
            $uoe = UserOwnCourse::where('user_id', $payment->user_id)->where('course_id', $item->course_id)->get();
            if ($uoe->count() == 0) {
                UserOwnCourse::create(['user_id' => $payment->user_id, 'course_id' => $item->course_id]);
            }
        }
    }
    return response($request);
});
Route::get('create/xendit/invoice', function () {
    Xendit::setApiKey(env('API_KEY'));
    $params = [
        'external_id' => auth()->id() . "",
        'payer_email' => auth()->user()->email,
        'description' => "asd",
        'amount' => 10,
    ];
    $createInvoice = Invoice::create($params);
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

    Route::post('create/xendit/invoice', function (Request $request) {
        Xendit::setApiKey(env('API_KEY'));
        $params = [
            'external_id' => auth()->id(),
            'payer_email' => auth()->user()->email,
            'description' => $request->description,
            'amount' => $request->amount,
        ];
        $createInvoice = Invoice::create($params);
    });


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

    Route::get('payment', function () {
        $payments = Payment::class;
        return view('pages.payment', compact('payments'));
    })->name('payment');

    Route::middleware(['checkRole:1'])->group(function () {
        Route::resource('room', RoomController::class)->only('index', 'create', 'edit', 'show');
        Route::resource('announcement', PublicAnnouncementController::class)->only('index', 'create', 'edit');
        Route::resource('banner', PublicBannerController::class)->only('index', 'create', 'edit');
        Route::resource('event', PublicEventController::class)->only('index', 'create', 'edit');

        Route::get('room/{room}/banner', [RoomBannerController::class, 'index'])->name('room.banner.index');
        Route::get('room/{room}/banner/create', [RoomBannerController::class, 'create'])->name('room.banner.create');
        Route::get('room/{room}/banner/edit/{id}', [RoomBannerController::class, 'edit'])->name('room.banner.edit');

//        Route::get('room/{room}/announcement', [RoomAnnouncementController::class, 'index'])->name('room.announcement.index');
//        Route::get('room/{room}/announcement/create', [RoomAnnouncementController::class, 'create'])->name('room.announcement.create');
//        Route::get('room/{room}/announcement/edit/{id}', [RoomAnnouncementController::class, 'edit'])->name('room.announcement.edit');
        Route::get('quest-report', function () {
            $reportQuests = ReportQuest::class;
            return view('pages.report-quest', compact('reportQuests'));
        })->name('quest-report');


        Route::get('room/{room}/event', [RoomEventController::class, 'index'])->name('room.event.index');
        Route::get('room/{room}/event/create', [RoomEventController::class, 'create'])->name('room.event.create');
        Route::get('room/{room}/event/edit/{id}', [RoomEventController::class, 'edit'])->name('room.event.edit');

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

        Route::get('referral', [ReferralController::class, 'index'])->name('referral.index');
        Route::get('referral/create', [ReferralController::class, 'create'])->name('referral.create');
        Route::get('referral/edit/{id}', [ReferralController::class, 'edit'])->name('referral.edit');
        Route::get('referral/can-use/{id}', [ReferralController::class, 'canUse'])->name('referral.can.use');
        Route::get('referral/can-use/{id}/add', [ReferralController::class, 'canUseAdd'])->name('referral.can.use.add');
    });
    Route::get('referral/me', [\App\Http\Controllers\User\ReferralController::class, 'index'])->name('referral.me.use');
    Route::get('referral/me/withdraw', [\App\Http\Controllers\User\ReferralController::class, 'withdraw'])->name('referral.me.withdraw');
    Route::get('referral/me/{id}', [\App\Http\Controllers\User\ReferralController::class, 'edit'])->name('referral.me.edit');
//    Route::get('exam/{examSlug}', function ($examSlug) {
//        $exam=\App\Models\ExamStep::whereSlug($examSlug)->firstOrFail();
//        return view('exam',compact('exam'));
//    })->name('exam');

});
