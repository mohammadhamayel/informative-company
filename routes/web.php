<?php

use App\Http\Controllers\Backend\AppController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ComponentController as PageComponentController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\HeaderController;
use App\Http\Controllers\Backend\ItemController as PageComponentItemController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\NavigationController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PluginController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SiteCustomController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\SubscriptionController;
use App\Http\Controllers\Backend\ThemeController;
use App\Http\Controllers\Common\LocaleController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;
use App\Models\Page;
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

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendHomeController::class, 'index'])->name('home');
Route::get('/{slug}', [FrontendPageController::class, 'page'])->name('page')->where('slug', Page::getValidSlugs());
Route::get('details/{id}', [FrontendPageController::class, 'details'])->name('content.details');

//======================= BLog Management =======================
Route::group(['prefix' => 'blog', 'as' => 'blog.', 'controller' => FrontendBlogController::class], function () {
    Route::get('filter', [FrontendBlogController::class, 'filter'])->name('filter');
    Route::get('{slug}', [FrontendBlogController::class, 'details'])->name('details');
});

Route::post('contact', [FrontendContactController::class, 'contactUs'])->name('contact.us');

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth', 'verified', '2fa'], 'prefix' => setting('admin_prefix'), 'as' => 'admin.'], function () {
    //======================= Dashboard =======================
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    //======================= Backend Profile Manage =======================
    Route::group(['controller' => ProfileController::class, 'as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/', 'profile')->name('settings');
        Route::post('/update', 'update')->name('update');

        //google 2fa auth
        Route::get('/2fa-generate', 'twoFaAuthGenerate')->name('2fa-generate');
        Route::post('/2fa', 'twoFaAuth')->name('2fa-auth');
        Route::post('/2fa-verify', 'twoFaAuthVerify')->name('2fa-verify');

        Route::post('/password-update', 'passwordUpdate')->name('password-update');
    });

    //======================= Navigation  Management =======================
    Route::group(['prefix' => 'navigation', 'as' => 'navigation.'], function () {
        Route::resource('site', NavigationController::class)->except(['create', 'show']);
        Route::controller(NavigationController::class)->group(function () {
            Route::get('{type}', 'type')->name('type');
            Route::post('position-update', 'positionUpdate')->name('position-update');
            Route::delete('position-remove', 'positionRemove')->name('position-remove');
        });
    });

    //======================= Page  Management =======================
    Route::group(['prefix' => 'page', 'as' => 'page.'], function () {
        Route::get('component-filter', [PageComponentController::class, 'componentFilter'])->name('component-filter');
        Route::resource('site', PageController::class)->except(['show']);
        Route::resource('component', PageComponentController::class)->except(['show']);
        Route::resource('component-item', PageComponentItemController::class)->except(['index', 'show']);
        Route::get('error404', [PageController::class, 'error404'])->name('error404');
    });

    //======================= Header  Management =======================
    Route::group(['prefix' => 'header', 'as' => 'header.', 'controller' => HeaderController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::post('update', 'update')->name('update');
    });

    //======================= Footer  Management =======================
    Route::group(['prefix' => 'footer', 'as' => 'footer.', 'controller' => FooterController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::post('update', 'update')->name('update');
    });

    //======================= Blog  Management =======================
    Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
        Route::resource('site', BlogController::class)->except('show');
        Route::resource('category', BlogCategoryController::class)->except(['show', 'create']);
    });

    //======================= Site Settings Management =======================
    Route::group(['prefix' => 'settings', 'as' => 'settings.', 'controller' => SettingController::class], function () {
        Route::get('/', 'settings')->name('index');
        Route::post('update', 'update')->name('update');
    });

    //======================= Theme  Management =======================
    Route::group(['prefix' => 'theme', 'as' => 'theme.', 'controller' => ThemeController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::post('update', 'update')->name('update');
    });

    //======================= Language Management =======================
    Route::get('language/translate/{code}', [LanguageController::class, 'translate'])->name('language.translate');
    Route::post('language/translate-update', [LanguageController::class, 'translatedUpdate'])->name('language.translate-update');
    Route::get('language/sync-missing-keys', [LanguageController::class, 'syncMissingKeys'])->name('language.sync-missing-keys');
    Route::resource('language', LanguageController::class);

    //======================= Plugin Management =======================
    Route::resource('plugin', PluginController::class)->only(['index', 'edit', 'update']);

    //======================= SEO =======================
    Route::group(['prefix' => 'seo', 'as' => 'seo.', 'controller' => SeoController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::post('update', 'update')->name('update');
    });

    //======================= Social Links =======================
    Route::resource('social', SocialController::class)->except(['create', 'show']);

    //======================= Subscription =======================
    Route::controller(SubscriptionController::class)->group(function () {
        Route::get('/subscription', 'subscription')->name('subscription');
        Route::post('mail-send', 'mailSend')->name('mail-send');
    });

    //======================= Custom Css/js Modify =======================
    Route::group(['controller' => SiteCustomController::class, 'prefix' => 'custom', 'as' => 'custom.'], function () {
        Route::get('{type}', 'type')->name('type');
        Route::post('update', 'update')->name('update.type');
    });

    //======================= Application =======================
    Route::controller(AppController::class)->group(function () {
        Route::get('/app', 'app')->name('app');
        Route::get('/optimize', 'optimize')->name('optimize');
        Route::get('/clear-cache', 'clearCache')->name('clear-cache');
        Route::get('/smtp-connection-check', 'smtpConnectionCheck')->name('smtp-connection-check');
    });
});

/*
|--------------------------------------------------------------------------
| Common Routes
|--------------------------------------------------------------------------
*/
Route::get('locale-set/{locale}', [LocaleController::class, 'setLocale'])->name('locale-set');
