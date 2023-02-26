<?php
    \Illuminate\Support\Facades\Route::prefix('/dashboard/permissions')->group(function () {
    \Illuminate\Support\Facades\Route::get('/',[\App\Http\Controllers\Admin\PermissionController::class,'index'])->name('admin.permission_list');
    \Illuminate\Support\Facades\Route::get('/create',[\App\Http\Controllers\Admin\PermissionController::class,'create'])->name('admin.permission_create');
    \Illuminate\Support\Facades\Route::post('/create',[\App\Http\Controllers\Admin\PermissionController::class,'store'])->name('admin.permission_store');
    \Illuminate\Support\Facades\Route::get('/edit/{id}',[\App\Http\Controllers\Admin\PermissionController::class,'edit'])->name('admin.permission.edit');
    \Illuminate\Support\Facades\Route::put('/update/{id}',[\App\Http\Controllers\Admin\PermissionController::class,'update'])->name('admin.permission.update');
    \Illuminate\Support\Facades\Route::delete('/delete/{id}',[\App\Http\Controllers\Admin\PermissionController::class,'destroy'])->name('admin.permission.delete');
});

\Illuminate\Support\Facades\Route::prefix('/dashboard/roles')->group(function () {
    \Illuminate\Support\Facades\Route::get('/',[\App\Http\Controllers\Admin\RoleController::class,'index'])->name('admin.role.index');
    \Illuminate\Support\Facades\Route::get('/create',[\App\Http\Controllers\Admin\RoleController::class,'create'])->name('admin.role.create');
    \Illuminate\Support\Facades\Route::post('/create',[\App\Http\Controllers\Admin\RoleController::class,'store'])->name('admin.role.store');
    \Illuminate\Support\Facades\Route::get('/edit/{id}',[\App\Http\Controllers\Admin\RoleController::class,'edit'])->name('admin.role.edit');
    \Illuminate\Support\Facades\Route::put('/update/{id}',[\App\Http\Controllers\Admin\RoleController::class,'update'])->name('admin.role.update');
    \Illuminate\Support\Facades\Route::delete('/delete/{id}',[\App\Http\Controllers\Admin\RoleController::class,'destroy'])->name('admin.role.delete');
});
