<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Kaka Praditha', 'title' => 'About']);
});

// Buat 2 route baru
// 1./blog 
// 2 buah artikel, judul dan isi
// 2. /contact
// email / social media

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});