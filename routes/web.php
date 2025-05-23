<?php

use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('contact-us');
Route::get('/conditions', [PagesController::class, 'conditionsListing'])->name('conditions');
Route::get('/conditions/{slug}', [PagesController::class, 'conditionsDetail'])->name('conditions.detail');
Route::get('/expertise', [PagesController::class, 'expertiseListing'])->name('expertise');
Route::get('/expertise/{slug}', [PagesController::class, 'expertiseDetail'])->name('expertise.detail');
Route::get('/blogs', [PagesController::class, 'publicationsListing'])->name('publications');
Route::get('/blogs/{slug}', [PagesController::class, 'publicationsDetail'])->name('publications.detail');
Route::get('/terms-and-conditions', [PagesController::class, 'termsAndConditions'])->name('terms-and-conditions');
Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/reviews', [PagesController::class, 'reviews'])->name('reviews');
Route::get('/projects/{slug}', [PagesController::class, 'projects'])->name('projects');
Route::get('/property-rates/{slug}', [PagesController::class, 'rates'])->name('rates');

Route::get('/properties', [PagesController::class, 'properties'])->name('properties');
Route::get('/properties/properties-detail/{id}', [PagesController::class, 'propertiesDetail'])->name('properties-detail');

//-----------------------Website Routes End-----------------------//


//-----------------------Admin Routes Start-----------------------//
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::view('/profile/change-password', 'auth.change-password')->name('profile.change-password');
    Route::get('/filters',[AdminPagesController::class,'getFilterResults'])->name('filters');


});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', function () {return view('dashboard');})->name('dashboard');
    Route::prefix('system')->name('system.')->group(function () {
        Route::view('/roles', 'admin.roles')->name('roles')->middleware('can:role-management');
        Route::view('/users', 'admin.users')->name('users')->middleware('can:user-management');
    });

    Route::prefix('conditions')->name('conditions.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'conditions'])->name('index');
        Route::get('/create', [AdminPagesController::class, 'createCondition'])->name('create');
        Route::get('/edit/{id}', [AdminPagesController::class, 'editCondition'])->name('edit');
        Route::get('/preview/{id}', [AdminPagesController::class, 'previewCondition'])->name('preview');
    });

    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'testimonials'])->name('index');
        Route::get('/create', [AdminPagesController::class, 'createTestimonial'])->name('create');
        Route::get('/edit/{id}', [AdminPagesController::class, 'editTestimonial'])->name('edit');
    });

    Route::prefix('expertise')->name('expertise.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'expertises'])->name('index');
        Route::get('/create', [AdminPagesController::class, 'createExpertise'])->name('create');
        Route::get('/edit/{id}', [AdminPagesController::class, 'editExpertise'])->name('edit');
        Route::get('/preview/{id}', [AdminPagesController::class, 'previewExpertise'])->name('preview');
    });

    Route::prefix('publications')->name('publications.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'publications'])->name('index');
        Route::get('/create', [AdminPagesController::class, 'createPublication'])->name('create');
        Route::get('/edit/{id}', [AdminPagesController::class, 'editPublication'])->name('edit');
        Route::get('/preview/{id}', [AdminPagesController::class, 'previewPublication'])->name('preview');
        Route::view('/types', 'admin.publications.types.index')->name('types.index');
        Route::view('/authors', 'admin.publications.authors.index')->name('authors.index');
        Route::view('/topics', 'admin.publications.topics.index')->name('topics.index');
    });

    Route::prefix('web-pages')->name('web-pages.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'webPages'])->name('index');
        Route::get('/create', [AdminPagesController::class, 'createWebPage'])->name('create');
        Route::get('/edit/{id}', [AdminPagesController::class, 'editWebPage'])->name('edit');
    });

    Route::prefix('properties')->name('properties.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'properties'])->name('index');
        Route::get('/create', [AdminPagesController::class, 'createProperty'])->name('create');
        Route::get('/edit/{id}', [AdminPagesController::class, 'editProperty'])->name('edit');
        // Route::get('/preview/{id}', [AdminPagesController::class, 'previewProperty'])->name('preview');
    });
    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'projects'])->name('index');
        Route::get('/create', [AdminPagesController::class, 'createProject'])->name('create');
        Route::get('/edit/{id}', [AdminPagesController::class, 'editProject'])->name('edit');
    });
    Route::prefix('rates')->name('rates.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'rates'])->name('index');
        Route::get('/create', [AdminPagesController::class, 'createRate'])->name('create');
        Route::get('/edit/{id}', [AdminPagesController::class, 'editRate'])->name('edit');
    });

    Route::prefix('specifications')->name('specifications.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'specifications'])->name('index');

    });

    Route::prefix('amenetise')->name('amenetise.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'amenetise'])->name('index');

    });

    Route::prefix('property-enquiries')->name('property-enquiries.')->group(function () {
        Route::get('/', function () {
            return view('admin.property-enquiry.property-enquiries');
        })->name('property-enquiries');
    });
    Route::prefix('home-pages')->name('home-pages.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'homePages'])->name('index');
    });
    Route::post('/upload-image', [AdminPagesController::class, 'upload'])->name('image.upload');
    Route::prefix('team-section')->name('team-section.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'teamSection'])->name('team');
    });
    Route::prefix('token-receipt')->name('token-receipt.')->group(function () {
        Route::get('/', [AdminPagesController::class, 'tokenReceipt'])->name('token');
    });

    Route::get('/token-receipt-list', [AdminPagesController::class, 'tokenReceiptList'])->name('token-receipt-list');
    Route::get('/property-history/{id}', [AdminPagesController::class, 'propertyHistory'])
    ->name('property-history');
    Route::get('/agent-history/{id}', [AdminPagesController::class, 'agentHistory'])
    ->name('agent-history');


});

require __DIR__.'/auth.php';
//-----------------------Admin Routes End-----------------------//
