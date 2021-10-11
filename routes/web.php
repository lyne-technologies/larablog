<?php

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

Route::get(config('larablog.routes.admin.create.url'), [\LyneTechnologies\Larablog\Http\Controllers\BlogController::class, 'create'])
    ->name(config('larablog.routes.admin.create.name'))
    ->middleware(config('larablog.routes.admin.create.middleware'));

Route::get(config('larablog.routes.admin.edit.url'), [\LyneTechnologies\Larablog\Http\Controllers\BlogController::class, 'edit'])
    ->name(config('larablog.routes.admin.edit.name'))
    ->middleware(config('larablog.routes.admin.edit.middleware'));

Route::post(config('larablog.routes.admin.submit.url'), [\LyneTechnologies\Larablog\Http\Controllers\BlogController::class, 'submit'])
    ->name(config('larablog.routes.admin.submit.name'))
    ->middleware(config('larablog.routes.admin.middleware'));

Route::get(config('larablog.routes.admin.list.url'), [\LyneTechnologies\Larablog\Http\Controllers\BlogController::class, 'list'])
    ->name(config('larablog.routes.admin.list.name'))
    ->middleware(config('larablog.routes.admin.list.middleware'));

//Route::post('/upload', , 'upload']);
Route::post(config('larablog.routes.admin.edit.url').'/upload', [\LyneTechnologies\Larablog\Http\Controllers\BlogController::class, 'upload'])
    ->name(config('larablog.routes.admin.edit.name').'upload')
    ->middleware(config('larablog.routes.admin.edit.middleware'));

Route::get(config('larablog.routes.admin.categories.list.url'), [\LyneTechnologies\Larablog\Http\Controllers\CategoryController::class, 'list'])
    ->name(config('larablog.routes.admin.categories.list.name'))
    ->middleware(config('larablog.routes.admin.categories.list.middleware'));
Route::get(config('larablog.routes.admin.categories.submit.url'), [\LyneTechnologies\Larablog\Http\Controllers\CategoryController::class, 'submit'])
    ->name(config('larablog.routes.admin.categories.submit.name'))
    ->middleware(config('larablog.routes.admin.categories.submit.middleware'));
Route::get(config('larablog.routes.admin.categories.destroy.url'), [\LyneTechnologies\Larablog\Http\Controllers\CategoryController::class, 'destroy'])
    ->name(config('larablog.routes.admin.categories.destroy.name'))
    ->middleware(config('larablog.routes.admin.categories.destroy.middleware'));



Route::get(config('larablog.routes.list.url'), function () {
    return view('larablog::list',[
        'posts'=>\LyneTechnologies\Larablog\Models\Post::where('status', \LyneTechnologies\Larablog\Models\Post::STATUS_PUBLISHED)->get()
    ]);
})->name(config('larablog.routes.list.name'))->middleware(config('larablog.routes.list.middleware'));

Route::get(config('larablog.routes.single.url'), function ($slug) {
    $data = ['post'=>\LyneTechnologies\Larablog\Models\Post::where('slug', $slug)->first()];
    if(! $data['post'] || $data['post']->status != \LyneTechnologies\Larablog\Models\Post::STATUS_PUBLISHED){
        return abort(404);
    }
    return view('larablog::single', $data);
})->name(config('larablog.routes.single.name'))->middleware(config('larablog.routes.single.middleware'));