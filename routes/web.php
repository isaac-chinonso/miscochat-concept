<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\User\UserPageController;
use App\Http\Controllers\User\UserPostController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\User\UserTransactionController;
use App\Http\Controllers\User\UserPaymentController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminTaskController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Subadmin\SubadminPageController;
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

Route::get('/', [PageController::class, 'index']);

Route::get('/about', [PageController::class, 'about']);

Route::get('/marketplace', [PageController::class, 'marketplace']);

Route::get('product-details/{slug}', [PageController::class, 'productdetails'])->name('productdetails');

Route::get('/support', [PageController::class, 'support']);

Route::post('signin', [UserController::class, 'signin']);

Route::get('/register', [PageController::class, 'register']);

Route::get('login', [PageController::class, 'login'])->name('login');

Route::post('savelogin', [UserController::class, 'savelogin']);

Route::get('/forget-password', [PageController::class, 'resetpassword'])->name('forget.password.get');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('/forget-password-link', [ResetPasswordController::class, 'ForgetPasswordStore'])->name('forget.password.post');

Route::post('/reset-password', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('logout', [UserController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth', 'prefix' => 'user', 'before' => 'user'], function () {

    Route::get('/dashboard', [UserPageController::class, 'dashboard'])->name('userdashboard');

    Route::get('/earn', [UserPageController::class, 'earn'])->name('userearn');

    Route::post('/submit-profile', [UserPostController::class, 'submitprofile'])->name('submitprofile');

    Route::post('/accept-task', [UserPostController::class, 'accepttask'])->name('accepttask');

    Route::get('/task/{id}', [UserPageController::class, 'performtask'])->name('usertask');

    Route::post('/submit-task/{id}', [UserPostController::class, 'submittask'])->name('submittask');

    Route::get('/marketplace', [UserPageController::class, 'market']);

    Route::get('/activate-account', [UserPageController::class, 'activateaccount']);

    Route::post('/activate-user', [UserPostController::class, 'activateuser']);

    Route::get('/fund-wallet', [UserPageController::class, 'fundwallet'])->name('userfundwallet');

    Route::get('/pay-wallet', [UserPageController::class, 'orderfee'])->name('payment');

    Route::post('/deposit', [UserTransactionController::class, 'deposit']);

    Route::post('/pay', [UserPaymentController::class, 'redirectToGateway'])->name('pay'); 

    Route::get('/payment/callback', [UserPaymentController::class, 'handleGatewayCallback']);

    Route::get('/place-withdrawal', [UserPageController::class, 'placewithdrawal']);

    Route::post('/withdraw', [UserTransactionController::class, 'withdraw']);

    Route::get('/airtime-data-topup', [UserPageController::class, 'topuprequest']);

    Route::post('/topup', [UserTransactionController::class, 'topup']);

    Route::get('/transaction-history', [UserPageController::class, 'transaction']);

    Route::post('/save-bank', [UserPostController::class, 'savebank']);

    Route::get('/bank', [UserPageController::class, 'bank']);

    Route::get('/profile', [UserPageController::class, 'profile'])->name('userprofile');

    Route::post('update-profile', [UserController::class, 'updateprofile'])->name('updateprofile');

    Route::get('/advertise', [UserPageController::class, 'advertise']);

    Route::get('/sell', [UserPageController::class, 'sell']);

    Route::get('/post-product', [UserPageController::class, 'postsell']);

    Route::post('/save-product', [UserPostController::class, 'saveproduct']);

    Route::get('delete-product/{id}', [UserPostController::class, 'deleteproduct'])->name('deleteuserproduct');

    Route::get('product-details/{slug}', [UserPageController::class, 'productdetails'])->name('userproductdetails');

    Route::get('/product-list', [UserPageController::class, 'productlist'])->name('userproductlist');

    Route::get('/social-buy', [UserPageController::class, 'socialbuy']);

    Route::post('/save-advert-task', [UserPostController::class, 'saveadverttask']);

    Route::get('/orders', [UserPageController::class, 'orderlist'])->name('userorder');

    Route::get('delete-order/{id}', [UserPostController::class, 'deleteorder'])->name('deleteuserorder');

});

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'before' => 'admin'], function () {

    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('admindashboard');

    Route::get('/members', [AdminPageController::class, 'member']);

    Route::get('/subadmins', [AdminPageController::class, 'subadmins']);

    Route::get('/make-sub-admin/{id}', [AdminPostController::class, 'makesubadmin'])->name('makesubadmin');

    Route::get('/revoke-sub-admin/{id}', [AdminPostController::class, 'revokesubadmin'])->name('revokesubadmin');

    Route::get('/category', [AdminPageController::class, 'category']);

    Route::post('/save-category', [AdminPostController::class, 'savecategory']);

    Route::get('delete-category/{id}', [AdminPostController::class, 'deletecategory'])->name('admindeletecategory');

    Route::get('/product', [AdminPageController::class, 'product']);

    Route::get('/add-product', [AdminPageController::class, 'addproduct']);

    Route::post('/save-product', [AdminPostController::class, 'saveproduct']);

    Route::get('delete-product/{id}', [AdminPostController::class, 'deleteproduct'])->name('deleteadminproduct');

    Route::get('/orders', [AdminPageController::class, 'order']);

    Route::post('/save-task/{id}', [AdminTaskController::class, 'savetask'])->name('savetask');

    Route::get('/task', [AdminPageController::class, 'task']);

    Route::get('allocated-task/{id}', [AdminPageController::class, 'allocatedtask'])->name('allocatedtask');

    Route::get('/coupon', [AdminPageController::class, 'coupon']);

    Route::post('/save-coupon', [AdminPostController::class, 'savecode']);

    Route::get('delete-coupon/{id}', [AdminPostController::class, 'deletecoupon'])->name('deleteadmincoupon');

    Route::get('/pending-deposit', [AdminPageController::class, 'pendingdeposit']);

    Route::get('/active-deposit', [AdminPageController::class, 'activedeposit']);

    Route::get('/pending-topup', [AdminPageController::class, 'pendingtopup']);

    Route::get('/active-topup', [AdminPageController::class, 'activetopup']);

    Route::get('/approve-topup/{id}', [AdminPostController::class, 'approvetopup'])->name('adminapprovetopup');

    Route::get('/topup-plan', [AdminPageController::class, 'topupplan']);

    Route::post('/save-mobile-topup-plan', [AdminPostController::class, 'savetopupplan']);

    Route::get('delete-mobile-topup-plan/{id}', [AdminPostController::class, 'deletetopupplan'])->name('deletetopupplan');

    Route::post('update-mobile-topup-plan/{id}', [AdminPostController::class, 'updatetopupplan'])->name('updatetopupplan');

    Route::get('/pending-withdrawal', [AdminPageController::class, 'pendingwithdrawal']);

    Route::get('/active-withdrawal', [AdminPageController::class, 'pendingwithdrawal']);

    Route::get('/approve-withdrawal/{id}', [AdminPostController::class, 'approvewithdrawal'])->name('adminapprovewithdrawal');

});

Route::group(['middleware' => 'auth', 'prefix' => 'subadmin', 'before' => 'subadmin'], function () {

    Route::get('/dashboard', [SubadminPageController::class, 'dashboard'])->name('subadmindashboard');

    Route::get('/pending-topup', [SubadminPageController::class, 'pendingtopup']);

    Route::get('/active-topup', [SubadminPageController::class, 'activetopup']);

    Route::get('/members', [SubadminPageController::class, 'member']);

});