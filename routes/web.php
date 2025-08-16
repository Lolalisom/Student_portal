<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, AssignmentController, SubmissionController, ResultController, MessageController, StudentController};

Route::get('/', fn()=>view('welcome'));

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function(){
        return auth()->user()->isAdmin() ? redirect()->route('dashboard.admin') : redirect()->route('dashboard.student');
    })->name('dashboard');

    Route::get('/dashboard/student', [DashboardController::class, 'student'])->name('dashboard.student');
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');

    // Admin-only routes (no role middleware)
    Route::resource('assignments', AssignmentController::class)->except(['show']);
    Route::get('assignments/{assignment}', [AssignmentController::class,'show'])->name('assignments.show');

    Route::prefix('admin')->name('admin.')->group(function(){
        Route::resource('students', StudentController::class)->parameters(['students' => 'student']);
    });

    Route::get('submissions', [SubmissionController::class,'index'])->name('submissions.index');
    Route::get('submissions/{submission}/grade', [SubmissionController::class,'gradeForm'])->name('submissions.grade.form');
    Route::post('submissions/{submission}/grade', [SubmissionController::class,'grade'])->name('submissions.grade');

    Route::get('results/manage', [ResultController::class,'index'])->name('results.manage');
    Route::post('results/publish', [ResultController::class,'store'])->name('results.store');

    Route::get('assignments-list', [AssignmentController::class,'index'])->name('assignments.index');
    Route::get('assignments/{assignment}', [AssignmentController::class,'show'])->name('assignments.show.pub');
    Route::get('assignments/{assignment}/submit', [SubmissionController::class,'create'])->name('submissions.create');
    Route::post('assignments/{assignment}/submit', [SubmissionController::class,'store'])->name('submissions.store');

    Route::get('results', [ResultController::class,'index'])->name('results.index');

    Route::get('messages', [MessageController::class,'inbox'])->name('messages.inbox');
    Route::get('messages/compose', [MessageController::class,'sendForm'])->name('messages.compose');
    Route::post('messages/send', [MessageController::class,'send'])->name('messages.send');
    Route::post('messages/{message}/reply', [MessageController::class,'reply'])->name('messages.reply');
});

require __DIR__.'/auth.php';
