<?php

use App\Models\Cv;
use App\Models\Offer;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EnterpriseController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home'  , [HomeController::class , 'reroute'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware( 'auth' , 'Enterprise')->group(function () {
    Route::get('/profile/enterprise' , [EnterpriseController::class , 'index'])->name('profile.enterprise');
    Route::get('/offer/candidates/{id}' , [OfferController::class , 'ConsultCandidates'])->name('offer.candidates');
    Route::get('/enterprise/home' , [EnterpriseController::class , 'return_to_view'])->name('enterprise.home');
    Route::post('/profile/enterprise/confirm' , [EnterpriseController::class , 'store' ])->name('enterprise.confirm');
    Route::post('/enterprise/offer/create' , [EnterpriseController::class , 'storeOffer' ])->name('offer.create');
    Route::delete('/offer/delete/{id}' , [OfferController::class , 'destroy'])->name('offer.delete');
});

Route::middleware( 'auth' , 'Candidate')->group(function () {
    Route::get('profile/candidate/view' , [CandidateController::class , 'index'])->name('profile.candidate');
    Route::post('/profile/candidate' , [CandidateController::class , 'store'])->name('candidate.confirm');
    Route::post('/profile/candidate/cv' , [CandidateController::class , 'storeCv'])->name('cv.add');
    Route::delete('/profile/delete/cv' , [CandidateController::class , 'DeleteCv'])->name('cv.delete');
    Route::get('candidate/cv/view' , [CvController::class , 'index'])->name('cv');
    Route::get('candidate/cv/download' , [CvController::class , 'downloadCv'])->name('download.cv');
    Route::get('candidate/jobOffers' , [OfferController::class , 'JobOffers'])->name('job.offers');
    Route::get('candidate/jobOffer/{id}' , [OfferController::class , 'JobOffer'])->name('job.offer');
    Route::post('/offer/apply' , [OfferController::class , 'StoreApplication'])->name('store.application');

    Route::post('/subscribe', [CandidateController::class , 'subscribe'])->name('subscribe');
});
Route::middleware( 'auth' , 'ADMIN')->group(function () {
    Route::get('profile/Admin' , [AdminController::class , 'index'])->name('profile.admin');
    Route::get('profile/Admin/Stats' , [AdminController::class , 'stats'])->name('stats.admin');
    Route::delete('profile/Admin/softdelete' , [AdminController::class , 'destroy'])->name('destroy.admin');
    
});


require __DIR__.'/auth.php';
