<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Roles\MenuController;
use App\Http\Controllers\Roles\UserGroupController;
use App\Http\Controllers\Roles\RoleAccessController;
use App\Http\Controllers\Configurations\OfficeController;
use App\Http\Controllers\Configurations\CountryController;
use App\Http\Controllers\Configurations\PradeshController;
use App\Http\Controllers\Configurations\DistrictController;
use App\Http\Controllers\Configurations\MuniTypeController;
use App\Http\Controllers\Configurations\DepartmentController;
use App\Http\Controllers\Configurations\FiscalYearController;
use App\Http\Controllers\Configurations\OfficeTypeController;
use App\Http\Controllers\Configurations\DesignationController;
use App\Http\Controllers\Configurations\MunicipalityController;

use App\Http\Controllers\SliderController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SocialController;

Auth::routes();
//Route::get('/', function () {
//    return view('frontend.home');
//});

Route::get('/', [FrontendController::class,'index'])->name('home');
Route::get('/news', [FrontendController::class,'newsShow'])->name('show.news');
Route::get('/news/{slug}', [FrontendController::class,'newsSingleShow'])->name('news.single.page');
Route::get('/event', [FrontendController::class,'eventShow'])->name('show.event');
Route::get('/notice', [FrontendController::class,'noticeShow'])->name('show.notice');
Route::get('/download', [FrontendController::class,'download'])->name('show.download');
Route::get('/contact', [FrontendController::class,'contact'])->name('show.contact');
//Route::get('/', 'HomeController@index');


Route::group(['middleware' => ['auth', 'roles']], function () {

    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');

    Route::prefix('roles')->group(function () {
        Route::resource('/menu', MenuController::class);
        Route::get('/menu/menuControllerChangeStatus/{id}', [MenuController::class,'changeStatus']);
        Route::resource('/group', UserGroupController::class);
        Route::get('/roleAccessIndex', [RoleAccessController::class,'index']);
        Route::get('roleChangeAccess/{allowId}/{id}', [RoleAccessController::class,'changeAccess']);
    });

    Route::resource('/user', UserController::class);
    Route::get('/user/status/{id}', [UserController::class,'status']);
    Route::get('/profile', [UserController::class,'profile'])->name('profile');
    Route::post('profile/profilePic', [UserController::class,'profilePic']);
    Route::post('/profile/password', [UserController::class,'password']);

    Route::prefix('configurations')->group(function () {
        Route::resource('/designation', DesignationController::class);
        Route::resource('/department', DepartmentController::class);
        Route::resource('/fiscalYear', FiscalYearController::class);
        Route::get('/fiscalYear/status/{id}', [FiscalYearController::class,'status']);
        Route::resource('/country', CountryController::class);
        Route::get('/country/status/{id}', [CountryController::class,'status']);
        Route::resource('/pradesh', PradeshController::class);
        Route::resource('/muniType', MuniTypeController::class);
        Route::resource('/district', DistrictController::class);
        Route::resource('/municipality', MunicipalityController::class);
        Route::resource('/officeType', OfficeTypeController::class);

        Route::resource('/office', OfficeController::class);
        Route::get('/office/status/{id}', [OfficeController::class,'status']);
    });

    Route::prefix('logs')->group(function () {
        Route::get('/loginLogs', [LogController::class,'loginLogs']);
        Route::get('/failLoginLogs', [LogController::class,'failLogin']);
    });

    Route::resource('admin/slider', SliderController::class);
    Route::resource('admin/download', DownloadController::class);
    Route::resource('admin/event', EventController::class);
    Route::resource('admin/notice', NoticeController::class);
    Route::resource('admin/news', NewsController::class);
    Route::resource('admin/navbar', NavBarController::class);
    Route::resource('admin/contact', ContactController::class);
    Route::resource('admin/socialmedia', SocialController::class);


    Route::resource('feedback', FeedbackController::class);
});
