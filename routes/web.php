<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CGController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Auth\AuthController;
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

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.admin.dashboard');
        })->name('admin.dashboard');
    
        Route::prefix('master_user')->group(function () {
            Route::get('/', function () {
                return view('pages.admin.master_user');
            })->name('admin.view_user');
        });
    
        Route::prefix('master_members')->group(function () {
            Route::get('/', function () {
                return view('pages.admin.view_members');
            })->name('admin.view_members');
    
            Route::get('/add', function () {
                return view('pages.admin.add_member');
            })->name('admin.view.add_member');

            Route::post('/add', [MemberController::class, 'add'])->name('master_member.add');
        });
    
        Route::prefix('master_team_leaders')->group(function () {
            Route::get('/', function () {
                return view('pages.admin.master_team_leaders');
            })->name('admin.view_team_leaders');
        });
    
        Route::prefix('master_coaches')->group(function () {
            Route::get('/', function () {
                return view('pages.admin.master_coaches');
            })->name('admin.view_coaches');
        });
    
        Route::prefix('master_connect_groups')->group(function () {
            Route::get('/', [CGController::class, 'view'])->name('admin.view_connect_groups');
            Route::post('/add', [CGController::class, 'add'])->name("master_connect_groups.add");
            Route::get('/get_by_id', [CGController::class, 'getById'])->name("master_connect_groups.get_by_id");
            Route::get('/delete_by_id', [CGController::class, 'destroyById'])->name("master_connect_groups.delete_by_id");
        });
    
        Route::prefix('master_ministy')->group(function () {
            Route::get('/', function () {
                return view('pages.admin.master_ministry');
            })->name('admin.view_ministry');
        });
    
        Route::prefix('master_roles')->group(function () {
            Route::get('/', function () {
                return view('pages.admin.master_roles');
            })->name('admin.view_roles');
        });
    });
});
