<?php

use App\Http\Controllers\Admin\AdminController;
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
    });

    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard');
    })->name('admin.dashboard');

    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

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
        })->name('admin.add_member');
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
        Route::get('/', function () {
            return view('pages.admin.master_connect_group');
        })->name('admin.view_connect_groups');
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
