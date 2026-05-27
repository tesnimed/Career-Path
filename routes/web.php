<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\SkillController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\SkillCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest; // هي مشان مسار معالجة ضغطة المستخدم على رابط التأكيد القادم في الإيميل
use Illuminate\Support\Facades\Artisan;

// الصفحات العامة
Route::get('/', [HomeController::class, 'index'])->name('home');
    // روابط تسجيل الدخول
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// روابط المستخدمين المسجلين (الكويز وتفاصيل الجامعة)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
    Route::post('/quiz', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/major-details/{id}', [MajorController::class, 'showPublic'])->name('major_details_public');
    Route::get('/university-details/{id}', [UniversityController::class, 'showPublic'])->name('university_details');
    Route::post('/quiz-results', [QuizController::class, 'submit'])->name('quiz_results.submit');
});
// روابط لوحة تحكم الإدارة (Admin)
Route::middleware(['auth', 'role:careerpath', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('skills', SkillController::class);
    Route::resource('majors', MajorController::class);  // يقوم بإنشاء رابط show تلقائياً
    Route::resource('universities', UniversityController::class);
    Route::resource('skill_categories', SkillCategoryController::class);
    Route::resource('users', UserController::class);
    Route::get('universities/{university}/manage-majors', [UniversityController::class, 'manageMajors'])->name('universities.majors');
    
});


// 1. مسار عرض صفحة التنبيه (نتركه كما هو، يحتاج تسجيل دخول لكي يراه المستخدم بعد التسجيل مباشرة)
// مسار عرض صفحة التنبيه للمستخدم بعد التسجيل مباشرة لكي يذهب ويفحص بريده
// مسار عرض صفحة التنبيه للمستخدم لتأكيد بريده الإلكتروني (استدعاء ملف العرض)
Route::get('/email/verify', function () {
    return view('auth.verify-notice');
})->middleware('auth')->name('verification.notice');

// 2. المسار الجديد والمعدل: يوجه الطلب للـ Controller ونحذف منه الـ 'auth' ليعمل من أي متصفح
// مسار معالجة ضغطة المستخدم على الزر القادم في الإيميل (مربوط بالـ Controller وبدون حماية auth)
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
    ->middleware(['signed'])
    ->name('verification.verify');



// مسار تشغيل طابور الإيميلات برمجياً لخلفية السيرفر
Route::get('/run-queue-worker', function() {
    \Illuminate\Support\Facades\Artisan::queue('queue:work', ['--stop-when-empty' => true]);
    return "Queue worker started in background successfully!";
});



// email link fix deployment





Route::get('/run-queue-worker', function() {
    // مسح الكاش للتأكد من قراءة البيانات الصحيحة
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    
    // إجبار الموديل على التحميل لمنع خطأ الـ Incomplete Object
    if (!class_exists(\App\Models\User::class)) {
        include_once app_path('Models/User.php');
    }

    try {
        // تشغيل الطابور بقوة وبدون فترات انتظار تفادياً للـ Max Attempts
        Artisan::call('queue:work', [
            '--stop-when-empty' => true,
            '--force' => true,
            '--backoff' => 0,
            '--tries' => 1 // محاولة واحدة فقط؛ إما تنجح أو تطبع الخطأ الحقيقي فوراً
        ]);
        
        return "Queue executed! Output: " . Artisan::output();
    } catch (\Exception $e) {
        return "SMTP Error: " . $e->getMessage();
    }
});