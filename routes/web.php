<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthorController;
use App\Http\Controllers\CompanyCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\savedJobController;
use Illuminate\Support\Facades\Route;

//public routes
Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/job/{job}', [PostController::class, 'show'])->name('post.show');
Route::get('employer/{employer}', [AuthorController::class, 'employer'])->name('account.employer');

//return vue page
Route::get('/search', [JobController::class, 'index'])->name('job.index');

//auth routes
Route::middleware('auth')->prefix('account')->group(function () {
  //every auth routes AccountController
  Route::get('logout', [AccountController::class, 'logout'])->name('account.logout');
  Route::get('overview', [AccountController::class, 'index'])->name('account.index');
  Route::get('deactivate', [AccountController::class, 'deactivateView'])->name('account.deactivate');
  Route::get('change-password', [AccountController::class, 'changePasswordView'])->name('account.changePassword');
  Route::delete('delete', [AccountController::class, 'deleteAccount'])->name('account.delete');
  Route::put('change-password', [AccountController::class, 'changePassword'])->name('account.changePassword');
  //savedJobs
  Route::get('my-saved-jobs', [savedJobController::class, 'index'])->name('savedJob.index');
  Route::get('my-saved-jobs/{id}', [savedJobController::class, 'store'])->name('savedJob.store');
  Route::delete('my-saved-jobs/{id}', [savedJobController::class, 'destroy'])->name('savedJob.destroy');
  //applyjobs
  Route::get('apply-job', [AccountController::class, 'applyJobView'])->name('account.applyJob');
  Route::post('apply-job', [AccountController::class, 'applyJob'])->name('account.applyJob');

  //
  //applyjobs
  Route::get('upload-qualifications', [AccountController::class, 'uploadQualificationsView'])->name('account.uploadQualificationsView');
  Route::post('upload-qualifications', [AccountController::class, 'uploadQualifications'])->name('account.uploadQualifications');

  //Admin Role Routes
  Route::group(['middleware' => ['role:admin']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('account.dashboard');
    Route::get('view-all-users', [AdminController::class, 'viewAllUsers'])->name('account.viewAllUsers');
    Route::delete('view-all-users', [AdminController::class, 'destroyUser'])->name('account.destroyUser');

    Route::get('category/{category}/edit', [CompanyCategoryController::class, 'edit'])->name('category.edit');
    Route::post('category', [CompanyCategoryController::class, 'store'])->name('category.store');
    Route::put('category/{id}', [CompanyCategoryController::class, 'update'])->name('category.update');
    Route::get('category/{id}', [CompanyCategoryController::class, 'destroy'])->name('category.destroy');
    Route::delete('referals/{id}', [CompanyCategoryController::class, 'denie'])->name('referal.denie');
    Route::get('referals/{id}', [CompanyCategoryController::class, 'approve'])->name('referal.approve');
    Route::get('check-referal-admin', [AccountController::class, 'checkReferal'])->name('account.check-referal-admin');

    

  });

  
  //User Role routes
  Route::group(['middleware' => ['role:user']], function () {
    Route::get('refer-someone-view', [AccountController::class, 'referSomeoneView'])->name('account.referSomeoneView');
    Route::post('refer-someone', [AccountController::class, 'referSomeone'])->name('account.referSomeone');
    Route::get('check-referal', [AccountController::class, 'checkReferal'])->name('account.check-referal');
  });
});
