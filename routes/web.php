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

// Route::get('/', function () {
//     return view('index');
// })->name('home.index');

// Route::get('/contact', function() {
//     return view('contact');
// })->name('home.contact');

Route::view('/', 'home.index')
    ->name('home.index');
Route::view('/contact', 'home.contact')
    ->name('home.contact');

Route::get('/posts/{id}', function ($id) {

    $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel'
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP'
        ]
    ];

    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]);

})->name('home.posts.id');
