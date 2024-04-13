<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeContoller;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SeekerContactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\StripeController;
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
// Route::get('/payment-gateway', function () {
//     return view('stripe');
// });
Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/stripe',[StripeController::class,'index']);
Route::get('success',[StripeController::class,'success']);

Route::get('about-us',[HomeContoller::class,'about'])->name('about.us');
Route::get('services',[HomeContoller::class,'services'])->name('services.view');
Route::get('services/detail/{id}',[HomeContoller::class,'services_detail'])->name('services.detail');
Route::get('services/detail/paint/{id}',[HomeContoller::class,'services_detail_paint'])->name('services.detail.paint');
Route::get('services/detail/plumber/{id}',[HomeContoller::class,'services_detail_plumber'])->name('services.detail.plumber');
Route::get('services/detail/architect/{id}',[HomeContoller::class,'services_detail_architect'])->name('services.detail.architect');
Route::get('services/detail/electrician/{id}',[HomeContoller::class,'services_detail_electrician'])->name('services.detail.electrician');
Route::get('services/detail/shuttering/{id}',[HomeContoller::class,'services_detail_shuttering'])->name('services.detail.shuttering');



Route::get('shops',[HomeContoller::class,'shops'])->name('shops.view');
Route::get('shops/detail/{id}',[HomeContoller::class,'shops_detail'])->name('shops.detail');
Route::get('shops/detail/paint/{id}',[HomeContoller::class,'shops_detail_paint'])->name('shops.detail.paint');
Route::get('shops/detail/plumber/{id}',[HomeContoller::class,'shops_detail_plumber'])->name('shops.detail.plumber');
Route::get('shops/detail/architect/{id}',[HomeContoller::class,'shops_detail_architect'])->name('shops.detail.architect');
Route::get('shops/detail/electrician/{id}',[HomeContoller::class,'shops_detail_electrician'])->name('shops.detail.electrician');
Route::get('shops/detail/shuttering/{id}',[HomeContoller::class,'shops_detail_shuttering'])->name('shops.detail.shuttering');


Route::get('seeker/shuttering/contact/{id}',[HomeContoller::class,'seeker_contact'])->name('seeker.contact');
Route::post('/payment/success', [HomeContoller::class, 'handlePaymentSuccess'])->name('payment.success');

// Route::get('user/profile',[HomeContoller::class,'seeker_profile'])->name('user.profile');



Route::get('/dashboard', function () {
    return view('frontend.dashbaord');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('seeker/logout', [AuthenticatedSessionController::class,'destroy'])->name('user.logout');
    Route::get('seeker/contact/data',[SeekerContactController::class,'index'])->name('seeker.contact.data');
    Route::get('seeker/contact/data/cancel/{id}',[SeekerContactController::class,'contact_cancel'])->name('seeker.contact.data.cancel');
    Route::get('user/profile',[SeekerContactController::class,'seeker_profile'])->name('user.profile');
    Route::post('user/profile/update/{id}',[SeekerContactController::class,'seeker_profile_update'])->name('seeker.profile.update');
    Route::get('/search/service',[HomeContoller::class,'search'])->name('service.search');
    Route::get('/search/shops',[HomeContoller::class,'search_shops'])->name('shops.search');

    Route::get('gallery/view',[HomeContoller::class,'gallery'])->name('user.gallery.view');
    Route::get('gallery/category/view/{id}',[HomeContoller::class,'gallery_detail'])->name('gallery.category.detail');



});

require __DIR__.'/auth.php';


// ======================================all the service provider rotues============================================

Route::prefix('admin')->group(function() {
    Route::get('/login',[AdminController::class,'index'])->name('login_form');
    Route::post('/login/ownser',[AdminController::class,'login'])->name('login.form');
    // Route::get('/dashboard',[AdminController::class,'dashbaord'])->name('admin.dashboard'))->middleware('admin');
    Route::get('/dashboard',[AdminController::class,'dashbaord'])->name('admin.dashboard')->middleware('admin');
    Route::post('/register/create',[AdminController::class,'register_store'])->name('admin.register.create');
    Route::get('/register',[AdminController::class,'register'])->name('admin.register');
    Route::get('/logout',[AdminController::class,'AdminLogout'])->name('admin.logout')->middleware('admin');

    Route::get('/profile/view',[AdminController::class,'view_profile'])->name('profile.view')->middleware('admin');
    Route::get('/profile/edit/view',[AdminController::class,'edit_profile'])->name('profile.edit')->middleware('admin');
    Route::post('/profile/update/{id}',[AdminController::class,'update_profile'])->name('profile.update')->middleware('admin');

    });

    Route::prefix('province')->group(function() {
        Route::get('/add/view',[AreaController::class,'index'])->name('add.province')->middleware('admin');;
        Route::post('/store',[AreaController::class,'store_province'])->name('store.province')->middleware('admin');;

        Route::get('/add/city',[AreaController::class,'city_index'])->name('add.city')->middleware('admin');;
        Route::post('/city/store',[AreaController::class,'store_city'])->name('store.city')->middleware('admin');;
});

Route::prefix('technician')->group(function() {
    Route::get('add/category',[ProviderController::class,'index'])->name('add.category')->middleware('admin');;
    Route::post('add/category',[ProviderController::class,'store'])->name('store.category')->middleware('admin');;

    Route::get('add/services',[ProviderController::class,'index_services'])->name('provider.add.services')->middleware('admin');
    Route::post('store/services',[ProviderController::class,'services_store'])->name('provider.services.store')->middleware('admin');
    Route::get('manage/services',[ProviderController::class,'services_manage'])->name('provider.manage.services')->middleware('admin');
    Route::get('delete/services/{id}',[ProviderController::class,'services_delete'])->name('provider.delete.service')->middleware('admin');
    Route::get('edit/services/{id}',[ProviderController::class,'services_edit'])->name('provider.edit.service')->middleware('admin');
    Route::post('update/services/{id}',[ProviderController::class,'services_update'])->name('provider.services.update')->middleware('admin');
    Route::get('contact/data/by/seeker',[ProviderController::class,'contacted_seekers'])->name('seeker.contact.provider')->middleware('admin');
    Route::get('contact/data/approve/{id}',[ProviderController::class,'contacted_approve'])->name('provider.contact.data.approve')->middleware('admin');

    Route::get('add/shops',[ProviderController::class,'index_shops'])->name('provider.add.shops')->middleware('admin');;
    Route::post('store/shops',[ProviderController::class,'shops_store'])->name('provider.shops.store')->middleware('admin');;
    Route::get('manage/shops',[ProviderController::class,'shops_manage'])->name('provider.manage.shops')->middleware('admin');;
    Route::get('delete/shops/{id}',[ProviderController::class,'shops_delete'])->name('provider.delete.shops')->middleware('admin');
    Route::get('edit/shops/{id}',[ProviderController::class,'shops_edit'])->name('provider.edit.shops')->middleware('admin');
    Route::post('update/shops/{id}',[ProviderController::class,'shops_update'])->name('provider.shops.update')->middleware('admin');


    Route::get('gallery',[ProviderController::class,'gallery'])->name('add.gallery')->middleware('admin');;
    Route::post('gallery/store',[ProviderController::class,'gallery_store'])->name('gallery.store')->middleware('admin');;
    Route::get('gallery/manage',[ProviderController::class,'gallery_manage'])->name('manage.gallery')->middleware('admin');;
    Route::get('gallery/delete/{id}',[ProviderController::class,'gallery_delete'])->name('gallery.delete')->middleware('admin');;
    Route::get('gallery/edit/{id}',[ProviderController::class,'gallery_edit'])->name('gallery.edit')->middleware('admin');;
    Route::post('gallery/update/{id}',[ProviderController::class,'gallery_update'])->name('gallery.update')->middleware('admin');;


});


// =========================================end of service provider rotues=========================================
