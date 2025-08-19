<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\BannerController;
 use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\UsernewController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ClinicvideoController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\VideotestimonialController;
use App\Http\Controllers\Admin\CoursePurchaseController;



use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangepasswordfrontController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TestimonialfrontController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CoursefrontController;
use App\Http\Controllers\CoursevideosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyaccountController;
use App\Http\Controllers\MyprofileController;
use App\Http\Controllers\VideoController;



use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\UserMiddleware;



Route::get('admin', function () {
    return redirect()->route('login');
});


    Route::get('admin/dashboard', function () {
        return view('admin/dashboard');
    })->middleware(['auth', 'verified',RoleMiddleware::class . ':admin'])->name('dashboard');

      Route::middleware(['auth',RoleMiddleware::class . ':admin'])->group(function () {
       Route::prefix('admin')->group(function() {



        Route::resource('page', PageController::class);
        Route::resource('banner',BannerController::class);
        Route::resource('course', CourseController::class);
        Route::get('/admin/course/{id}/video', [CourseController::class, 'viewVideo'])
    ->middleware(['auth'])
    ->name('admin.course.video');

        Route::get('admin/course/{course}/video/{videoid}', [CourseController::class, 'deleteVideo'])
        ->name('course.video.delete');


        Route::resource('contact', ContactController::class);
        Route::resource('seo', SeoController::class);
        Route::resource('testimonial', TestimonialController::class);
        Route::resource('usernews', UsernewController::class);
  Route::resource('videotestimonial', VideotestimonialController::class);
   Route::resource('clinicvideo', ClinicvideoController::class);

  // User Management
  Route::get('/users', [UsernewController::class, 'index'])->name('admin.users.index');
  //Route::post('/users/{id}/update-status', [UsernewController::class, 'updateStatus'])->name('users.updateStatus');
  Route::get('/users/update-status/{id}', [UsernewController::class, 'updateStatus'])->name('users.updateStatus');

  Route::get('/users/reset-device/{id}', [UsernewController::class, 'resetDevice']);

  Route::delete('/users/{id}', [UsernewController::class, 'destroy'])->name('users.destroy');

  Route::get('/users/{id}/view', [UsernewController::class, 'ViewUsers'])->name('users.viewusers');

  Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-passwords');
  
  Route::post('update-password',[ChangePasswordController::class,'update_password'])->name('update-password');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

      Route::get('course/delete2/{id}', [CourseController::class, 'delete2'])->name('delete.video');

      Route::get('/purchases', [CoursePurchaseController::class, 'index'])->name('admin.purchases.index');

      Route::put('/purchases/{id}', [CoursePurchaseController::class, 'updateStatus'])->name('admin.purchases.update');

      Route::get('/course/expire-status/{id}', [CourseController::class, 'ExpireStatus']);

});
});


Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/testimonial', [TestimonialfrontController::class, 'index'])->name('testimonial');
Route::match(['get','post'],'/contact', [ContactUsController::class,'index'])->name('contact');
Route::get('/courses', [CoursefrontController::class, 'index'])->name('courses');
Route::match(['get','post'],'course-detail/{slug}', [CoursefrontController::class, 'detail'])->name('course-detail');




Route::post('/Auth', [LoginController::class, 'login'])->name('UserAuth');

Route::post('/UserRegsiter', [LoginController::class, 'register'])->name('UserRegister');


Route::middleware([UserMiddleware::class])->group(function () {

Route::get('/my-account', [MyaccountController::class, 'index'])->name('my.account');

Route::get('/change-password', [ChangepasswordfrontController::class, 'changePassword'])->name('change-password'); // for showing form
Route::post('/change-password', [ChangepasswordfrontController::class, 'updatePassword'])->name('change-passwords'); // for submitting form

Route::get('/course-videos', [CoursevideosController::class, 'index'])->name('course-videos');

Route::get('/myprofile', [MyprofileController::class, 'index'])->name('my-profile');

Route::get('/course-video/{courseId}/{videoFile}', [VideoController::class, 'stream'])->where('videoFile', '.*') 
     ->name('course.video.stream');

});

Route::get('/logout', [LoginController::class, 'logout'])->name('logouts');



use Illuminate\Support\Facades\Artisan;

Route::get('/optimize-app', function () {
    Artisan::call('optimize:clear');  // Clear all caches
    Artisan::call('config:cache');    // Cache config
    Artisan::call('route:cache');     // Cache routes
    Artisan::call('view:cache');      // Cache views

    return 'Application optimized for production!';
});


Route::get('/run-migrations', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return "✅ Migrations run successfully.";
    } catch (\Exception $e) {
        return "❌ Migration failed: " . $e->getMessage();
    }
});




require __DIR__.'/auth.php';
