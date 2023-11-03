<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\prorammerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('clear-compiled');
    return "Cleared!";
});
Route::get('/', function () {
    return view('welcome');
})->name('root');

Route::group(['middleware' => ['auth']],function (){

    Route::controller(DashboardController::class)->group(function (){
        Route::middleware(['permissions:dashboard'])->group(function(){
            Route::get('/dashboard','index')->name('dashboard');
        });
    });

    # 3.2 Super Admin Controller
    Route::group(['middleware'=>['auth','role:super-admin']],function (){
# 3.2.1 Only for programmer
        Route::controller(prorammerController::class)->group(function (){
            Route::match(['post','get'],'permission-input','create')->name('permission.input');
            Route::delete('permission-input-delete','delete')->name('permission.input.delete');
        });//3.2.1 End
# 3.2.2 User Screen Permission Controller
        Route::controller(UserPermissionController::class)->group(function (){
            Route::post('add-user-permission','addPermission')->name('add.user.permission');
            Route::delete('delete-user-permission','removePermission')->name('remove.user.permission');
        });//3.2.2 End
# 3.2.3 User File manager permission
        Route::controller(UserController::class)->group(function (){
            Route::post('user-per-add','UserPerSubmit');
            Route::post('user-per-delete','UserPerDelete');
            Route::middleware(['permission:salary_certificate_input'])->group(function () {
                Route::get('export-user-salary-prototype','exportUserSalaryPrototype')->name('export.user.salary.prototype');
            });
        });//3.2.3 End
    });//3.2 End

# 3.3 User Management Controller
    Route::controller(UserController::class,)->group(function (){
# 3.3.1 Add user
        Route::middleware(['permission:add_user'])->group(function (){
            Route::match(['post','get'],'add-user','create')->name('add.user');
        });//3.3.1 End
# 3.3.2 User List
        Route::middleware(['permission:list_user'])->group(function (){
            Route::get('user-list','show')->name('user.list');
        });//3.3.2 End
# 3.3.3 User single view
        Route::middleware(['permission:view_user'])->group(function (){
            Route::get('user-view/{userID}','SingleView')->name('user.single.view');
        });//3.3.3 End
# 3.3.4 User single edit
        Route::middleware(['permission:edit_user'])->group(function (){
            Route::match(['put','get'],'user-edit/{userID}','UserEdit')->name('user.edit');
            Route::post('user-status-change','userStatusChange')->name('user.status.change');
            Route::post('user-role-change','userRoleChange')->name('user.role.change');
            Route::post('user-password-change','userPasswordChange')->name('user.password.change');
            Route::post('user-dept-change','userDepartmentChange')->name('user.dept.change');
        });//3.3.4 End
# 3.3.5 User delete
        Route::middleware(['permission:delete_user'])->group(function (){
            Route::delete('user-delete','UserDelete')->name('user.delete');
        });//3.3.5 End

    });//3.3 End

});

require __DIR__.'/auth.php';
