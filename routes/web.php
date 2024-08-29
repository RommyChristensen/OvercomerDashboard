<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CGController;
use App\Http\Controllers\Admin\CoachController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MinistryController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.login');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('pages.admin.login');
    })->name('admin.view.login');

    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.admin.dashboard');
        })->name('admin.dashboard');
    
        Route::prefix('master_user')->group(function () {
            Route::get('/', [UserController::class, 'view'])->name('admin.view_user');
            Route::post('/add', [UserController::class, 'add'])->name("master_user.add");
            Route::post('/reset_password', [UserController::class, 'resetPassword'])->name("master_user.reset_password");
            Route::post('/destroy_by_id', [UserController::class, 'destroyById'])->name("master_user.destroy_by_id");
            Route::get('/change_password', [UserController::class, 'viewChangePassword'])->name('master_user.view_change_password');
            Route::post('/change_password', [UserController::class, 'changePassword'])->name('master_user.change_password');
        });
    
        Route::prefix('master_members')->group(function () {
            Route::get('/', [MemberController::class, 'view'])->name('admin.view_members');
            Route::get('/add', [MemberController::class, 'view_add'])->name('admin.view.add_member');
            Route::post('/add', [MemberController::class, 'add'])->name('master_member.add');
            Route::get('/edit/{member}', [MemberController::class, 'view_edit'])->name('master_member.view_edit');
            Route::post('/edit', [MemberController::class, 'edit'])->name('master_member.edit');
            Route::post('/delete_by_id', [MemberController::class, 'destroyById'])->name("master_member.delete_by_id");
        });

        Route::prefix('master_coaches')->group(function() {
            Route::get('/', [CoachController::class, 'view'])->name('admin.view_coaches');
            Route::post('/add', [CoachController::class, 'add'])->name('master_coaches.add');
            Route::get('/get_by_id', [CoachController::class, 'get_by_id'])->name('master_coaches.view_edit');
            Route::post('/edit', [CoachController::class, 'edit'])->name('master_coaches.edit');
            Route::delete('/delete_by_id', [CoachController::class, 'delete'])->name('master_coaches.delete_by_id');
        });

        Route::prefix('master_connect_groups')->group(function () {
            Route::get('/', [CGController::class, 'view'])->name('admin.view_connect_groups');
            Route::post('/add', [CGController::class, 'add'])->name("master_connect_groups.add");
            Route::get('/get_by_id', [CGController::class, 'getById'])->name("master_connect_groups.get_by_id");
            Route::get('/delete_by_id', [CGController::class, 'destroyById'])->name("master_connect_groups.delete_by_id");
        });
    
        Route::prefix('master_ministy')->group(function () {
            Route::get('/', [MinistryController::class, 'view'])->name('admin.view_ministry');
            Route::post('/add', [MinistryController::class, 'add'])->name("master_ministy.add");
        });
    
        Route::prefix('master_roles')->group(function () {
            Route::get('/', [RoleController::class, 'view'])->name('admin.view_roles');
            Route::get('/get_by_id', [RoleController::class, 'getById'])->name("master_role.get_by_id");
            Route::post('/add', [RoleController::class, 'add'])->name("master_role.add");
            Route::post('/delete_by_id', [RoleController::class, 'destroyById'])->name("master_role.delete_by_id");
            Route::post('/update_by_id', [RoleController::class, 'updateById'])->name("master_role.udpate_by_id");
        });

        Route::prefix('master_menus')->group(function () {
            Route::get('/', [MenuController::class, 'index'])->name('admin.view_menus');
            Route::get('/get_by_role_id', [MenuController::class, 'getByRoleId'])->name('master_menu.get_by_role_id');
            Route::post('/add', [MenuController::class, 'store'])->name('master_menu.add');
            Route::post('/destroy', [MenuController::class, 'destroy'])->name('master_menu.destroy');
        });
    });
});
