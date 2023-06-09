<?php

use App\Http\Controllers\API\AboutController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ConfigController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SlideController;
use App\Http\Controllers\API\SubProductController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::controller(AuthController::class)->group(function () {
    Route::post('logining', 'userLogin')->name('logining');
    Route::post('admin_logining', 'adminLogin')->name('admin_logining');
    Route::post('registering', 'registering')->name('registering');
    Route::post('logout', 'logout')->name('logout');
    Route::post('forgot-password', 'forgotPasswordHandle')->name('forgot_password');
    Route::post('reset-password/{token}', 'resetPasswordHandle')->name('reset_password');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users/')
    ->name('users.')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('count', 'countUser')->name('count');
        Route::post('update_address', 'updateAddress')->name('update_address');
        Route::get('/count', 'countUser')->name('count');
        Route::put('/profile', 'updateProfile')->name('update_profile');
        Route::put('/change-password', 'changePassword')->name('change_password');
        Route::put('/change-avatar', 'changeAvatar')->name('change_avatar');
    });

Route::prefix('categories')
    ->name('categories.')
    ->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', 'all')->name('all');
        Route::middleware('admin.api')->group(function () {
            Route::post('/', 'store')->name('store');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
    });

Route::prefix('slides')->name('slides.')
    ->group(function () {
        Route::controller(SlideController::class)
            ->group(function () {
                Route::get('/', 'all')->name('all');
                Route::get('/last-index', 'lastIndex')->name('last_index');
                Route::get('enable', 'allEnable')->name('all_enable');
                Route::get('/{id}', 'get')->name('get');
                Route::post('/', 'store')->name('store');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });

        Route::prefix('/{productId}/subs')->name('subs.')
            ->controller(SubProductController::class)
            ->group(function () {
                Route::get('/', 'all')->name('all');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}', 'get')->name('get');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
    });

Route::prefix('products')->name('products.')
    ->group(function () {
        Route::controller(ProductController::class)
            ->group(function () {
                Route::get('/{id}', 'get')->name('get');
                Route::get('get_with_subs/{slug}', 'getWithSubs')->name('get_with_subs');
                Route::get('/', 'all')->name('all');
                Route::post('/', 'store')->name('store');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });

        Route::prefix('/{productId}/subs')->name('subs.')
            ->controller(SubProductController::class)
            ->group(function () {
                Route::get('/', 'all')->name('all');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}', 'get')->name('get');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
    });

Route::prefix('orders')
    ->name('orders.')
    ->controller(OrderController::class)
    ->group(function () {
        Route::prefix('/products')->group(function () {
            Route::get('/', 'products')->name('products');
            Route::post('/', 'productsCreate')->name('products_create');
        });
        Route::prefix('/{id}')->group(function () {
            Route::get('/product', 'product')->name('product');
            Route::get('/photo', 'photo')->name('photo');
            Route::put('/photo-price', 'photoPrice')->name('photo_price');
            Route::put('/change-status', 'changeStatus')->name('change_status');
            Route::put('/total', 'updateTotal')->name('update_total');
        });
        Route::get('/photos', 'photos')->name('photos');
        Route::post('/photos', 'photosCreate')->name('photos_create');
        Route::get('products-auth', 'productsByAuth')->name('products_by_auth');
        Route::get('photos-auth', 'photosByAuth')->name('photos_by_auth');
    });

Route::prefix('cart')
    ->name('cart.')
    ->controller(CartController::class)
    ->group(function () {
        Route::get('/', 'all')->name('all');
        Route::post('/update', 'update')->name('update');
        Route::delete('/{id}', 'remove')->name('remove');
        Route::delete('/', 'emptyCart')->name('empty_cart');
    });

Route::prefix('/about')
    ->name('about.')
    ->controller(AboutController::class)
    ->group(function () {
        Route::get('/', 'get')->name('get');
        Route::put('/', 'update')->name('update');
    });

Route::prefix('/config')
    ->name('config.')
    ->controller(ConfigController::class)
    ->group(function () {
        Route::get('/mail-admin', 'getEmailAdmin')->name('get_email_admin');
        Route::put('/mail-admin', 'updateEmailAdmin')->name('update_email_admin');
        Route::prefix('/banks')->name('banks.')
        ->group(function () {
            Route::get('/', 'allBank')->name('all');
            Route::post('/', 'createBank')->name('create');
            Route::get('/{id}', 'getBank')->name('get');
            Route::put('/{id}', 'updateBank')->name('update');
            Route::delete('/{id}', 'destroyBank')->name('destroy');
        });
    });
