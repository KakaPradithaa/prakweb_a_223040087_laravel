<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Kaka Praditha', 'title' => 'About']);
});

Route::get('/posts/{slug}', function ($slug) {
   $posts = [
    [
        'id' => 1,
        'slug' => 'judul-artikel-1',
        'title' => 'Judul Artikel 1',
        'author' => 'Kaka Praditha Putra',
        'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, nesciunt. Ad doloremque error, rerum explicabo omnis natus nemo modi nulla sed necessitatibus. Commodi earum odit perferendis accusantium a blanditiis fugiat.'
    ],

    [
        'id' => 2,
        'slug' => 'judul-artikel-2',
        'title' => 'Judul Artikel 2',
        'author' => 'Kaka Praditha Putra',
        'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius quae repudiandae voluptatibus, rem unde earum porro architecto facere. Perspiciatis eveniet fugiat odio. Tenetur consectetur, atque totam corporis nisi blanditiis veniam!'
    ]];

    $post = Arr::first($posts, function($post) use ($slug){
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

// Buat 2 route baru
// 1./blog 
// 2 buah artikel, judul dan isi
// 2. /contact
// email / social media

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Kaka Praditha Putra',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, nesciunt. Ad doloremque error, rerum explicabo omnis natus nemo modi nulla sed necessitatibus. Commodi earum odit perferendis accusantium a blanditiis fugiat.'
        ],

        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Kaka Praditha Putra',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius quae repudiandae voluptatibus, rem unde earum porro architecto facere. Perspiciatis eveniet fugiat odio. Tenetur consectetur, atque totam corporis nisi blanditiis veniam!'
        ]
    ]]);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});