<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoriesController;



Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/project', [IndexController::class, 'project'])->name('project');


Route::group(['prefix'=>'/news', 'as'=>'news.'], function(){


    Route::group(['prefix'=>'category', 'as'=>'category.'], function(){
        Route::get('/{category_id}', [NewsController::class, 'category'])->where('category_id','[0-9]+')->name('by_id');
        Route::get('/{slug}', [NewsController::class, 'slug'])->name('by_slug');
        Route::get('/', [CategoriesController::class, 'index'])->name('by_index');

    });
    Route::get('/', [NewsController::class, 'index'])-> name('index');
    Route::get('/{id}', [NewsController::class, 'show'])->name('show');
    Route::get('/{id}/comments/{comment}', [NewsController::class, 'add'])->name('comment');

});
Route::group(['prefix'=>'/admin', 'namespace'=>'Admin', 'as'=>'admin.'], function(){
    Route::group(['prefix'=>'/news', 'as'=>'news.'], function(){
        Route::get('/', [NewsController::class, 'index'])-> name('index');
        Route::get('/{id}', [NewsController::class, 'show'])->name('show');
        Route::post('/', [NewsController::class, 'add'])->name('add');

    });
});






//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/phpinfo', function () {
//    phpinfo();
//});
//
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
