<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post 
{
    // use HasFactory;
    private static $portopolio = [
        [
            "title"     => "Design LEATALENT",
            "slug"      => "design-leatalent",
            "author"    => "Luthfi Arzaki",
            "desc"      => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas sit rerum ratione quis commodi consequuntur repellendus. Voluptatibus dolore illum laudantium optio inventore expedita esse possimus debitis assumenda harum! Repellendus, veniam?",
            "image"     => "landingpage-leatalent.png"
        ],

        [
            "title"     => "Re design LMS UNJ",
            "slug"      => "re-design-lms-unj",
            "author"    => "Luthfi Arzaki",
            "desc"      => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas sit rerum ratione quis commodi consequuntur repellendus. Voluptatibus dolore illum laudantium optio inventore expedita esse possimus debitis assumenda harum! Repellendus, veniam?",
            "image"     => "landingpage-leatalent.png"
        ],
    ];

    public static function all () {
        return collect(self::$portopolio);
    }

    public static function find ($slug) {
        $posts = static::all();
        return $posts->firstwhere('slug', $slug);
    }
}
