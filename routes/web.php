<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Blog;

// Route::get('/', function () {
//     // return view('welcome');
//     return view('index');
// });
Route::get('/', function () {
    $services = Service::latest()->get();

    // Ambil data portofolio
    $portfolios = Portfolio::latest()->get();

    $blogs = Blog::latest()->get();

    // Kirim data ke view
    return view('index', compact('services', 'portfolios', 'blogs'));
});
Route::get('/admin', function () {
    // return view('welcome');
    return view('admin/index');
});

// Route::get('/admin/portofolio', function () {
//     // return view('welcome');
//     return view('admin/portofolio');
// });


use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogController;

Route::resource('blog', BlogController::class);
Route::resource('portfolio', PortfolioController::class);
Route::resource('service', App\Http\Controllers\ServiceController::class);

