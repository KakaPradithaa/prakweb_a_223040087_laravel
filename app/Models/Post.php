<?php

namespace App\Models;
use Illuminate\Support\Arr;

class Post{
    public static function all(){
        return [
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
    }

    public static function find($slug): array{
       
       $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);{

        if(!$post) {
            abort(404);
        }

        return $post;

        }
    }
}