<?php

use App\Models\Post;
use App\Models\StaticInfo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KartuPelajarController;
use App\Http\Controllers\PendaftaranSantriController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $latestPosts = (new Post())->getLatestPosts();
    $staticInfo = (new StaticInfo())->getStaticInfo();

    return view('welcome', compact('latestPosts', 'staticInfo'));
})->name('home');

Route::get('/berita', function () {

        $latestPosts = (new Post())->getLatestPosts();
        $staticInfo = (new StaticInfo())->getStaticInfo();
        // dd(compact('latestPosts', 'staticInfo'));

        return view('berita', compact('latestPosts', 'staticInfo'));
    })->name('berita');

Route::get('/galeri', function () {

    $latestPosts = (new Post())->getLatestPosts();
    $staticInfo = (new StaticInfo())->getStaticInfo();
    // dd(compact('latestPosts', 'staticInfo'));

    return view('galeri', compact('latestPosts', 'staticInfo'));
})->name('galeri');

    Route::get('/pesantren', function () {

        $latestPosts = (new Post())->getLatestPosts();
        $staticInfo = (new StaticInfo())->getStaticInfo();
        // dd(compact('latestPosts', 'staticInfo'));

        return view('kampus', compact('latestPosts', 'staticInfo'));
    })->name('pesantren');

    // Route::get('/pendaftaran', function () {

    //     $latestPosts = (new Post())->getLatestPosts();
    //     $staticInfo = (new StaticInfo())->getStaticInfo();
    //     // dd(compact('latestPosts', 'staticInfo'));

    //     return view('pendaftaran', compact('latestPosts', 'staticInfo'));
    // })->name('pendaftaran');
    // bagian dibawah ini sebagai gantinya
    Route::get('/pendaftaran', [PendaftaranSantriController::class, 'showForm'])->name('pendaftaran');

    Route::post('/pendaftaran/store', [PendaftaranSantriController::class, 'store'])->name('pendaftaran.store');
