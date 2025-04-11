<?php

namespace App\Models;



class Post 
{
    private static $coba = [
        [
            'title' => 'Judul Posting Pertama',
            'slug' => 'judul-post-pertama',
            'author' => 'Gornal',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...'
        ],
        [
            'title' => 'Judul Posting Kedua',
            'slug' => 'judul-post-kedua',
            'author' => 'Gornal',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...'
        ]
    ];
    public static function all() {
        return collect(self::$coba);
    }
    public static function find($slug) {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
