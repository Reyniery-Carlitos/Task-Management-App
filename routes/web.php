<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// USER
Route::controller((UserController::class))->group(function () {
    Route::post('/users', 'store', 'store')->middleware(['auth', 'can:users.store'])->name('users.store');

    Route::get('/users/employees', 'listByEmployees')->middleware(['auth', 'can:users.employees.list'])->name('users.employees.list');
    Route::get('/users/admin', 'listByAdmins')->middleware(['auth', 'can:users.admin.list'])->name('users.admin.list');
    Route::get('/users/employees/{idEmployee}', 'listByEmployeeId')->middleware(['auth', 'can:users.employees.listEmployee'])->name('users.employees.listEmployee');
    Route::get('/users/dashboard/{idDashboard}', 'listByDashboard')->middleware(['auth', 'can:users.dashboard.list'])->name('users.dashboard.list');

    Route::put('/users/{user}')->middleware(['auth', 'can:users.update'])->name('users.update');

    Route::delete('/users/{user}', 'destroy')->middleware(['auth', 'can:users.destroy'])->name('users.destroy');
});

// DASHBOARD
Route::controller(DashboardController::class)->group(function () {
    Route::post('/dashboards', 'store')->middleware(['auth'])->name('dashboards.store');
    
    Route::get('dashboards/create', 'create')->middleware(['auth'])->name('dashboards.crear');
    Route::get('/dashboards/owner', 'listByOwner')->middleware(['auth'])->name('dashboards.owner.list');
    Route::get('/dashboards/employee/{idEmployee}', 'listByEmployee')->middleware(['auth', 'can:dashboards.employee.list'])->name('dashboards.employee.list');
    
    Route::put('/dashboards/{dashboard}', 'update')->middleware(['auth', 'can:dashboards.update'])->name('dashboards.update');

    Route::delete('/dashboards/{dashboard}', 'destroy')->middleware(['auth', 'can:dashboards.destroy']);
});

// TASK
Route::controller(TaskController::class)->group(function() {
    Route::post('/tasks', 'store')->middleware(['auth', 'can:tasks.store'])->name('tasks.store');

    Route::get('/tasks/dashboard/{idDashboard}', 'listByDashboard')->middleware(['auth', 'can:tasks.dashboard.list'])->name('tasks.dashboard.list');
    Route::get('/tasks/status/{idStatus}', 'listByStatus')->middleware(['auth', 'can:tasks.status.list'])->name('tasks.status.list');
    
    Route::update('/tasks/{task}', 'update')->middleware(['auth', 'can:tasks.update'])->name('tasks.update');

    Route::delete('/tasks/{task}', 'destroy')->middleware(['auth', 'can:tasks.destroy'])->name('tasks.destroy');
});

// STATUS
Route::controller(StatusController::class)->group(function() {
    Route::get('/statuses', 'list')->middleware(['auth', 'can:statuses.list'])->name('statuses.list');
    Route::get('/statuses/{id}', 'listById')->middleware(['auth', 'can:statuses.listById'])->name('statuses.listById');
});

// COMMENT
Route::controller(CommentController::class)->group(function() {
    Route::post('/comments', 'store')->middleware(['auth', 'can:comments.store'])->name('comments.store');

    Route::get('/comments/task/{idTask}', 'listByTask')->middleware(['auth', 'can:comments.task.id'])->name('comments.task.list');

    Route::put('/comments/{comment}', 'update')->middleware(['auth', 'can:comments.update'])->name('comments.update');

    Route::delete('/comments/{comment}', 'destroy')->middleware(['auth', 'can:comments.destroy'])->name('comments.destroy');
});

// ROLES
Route::controller(RoleController::class)->group(function() {
    Route::get('/roles', 'list')->middleware(['auth', 'can:roles.list'])->name('roles.list');
    Route::get('/roles/{id}', 'listById')->middleware(['auth', 'can:roles.listById'])->name('roles.listById');
});

// AUTH
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
