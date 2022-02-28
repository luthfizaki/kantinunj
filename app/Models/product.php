<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];
    
    public function scopeFilter ($query, array $filters) {
        // ?? digunakan untuk mengganti syntax ternary yang panjang
        $query->when($filters['search'] ?? false, function ($query, $search) {
             $query->where('product_name', 'like', '%' . $search . '%')
                         ->orWhere ('desc', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas ('category', function ($query) use ($category) {
                  $query->where ('slug', $category);
            });
        });

        return $query;
        // $query->when ($filters['author'] ?? false, function ($query, $author) {
        //     $query->whereHas('author', function($query) use ($author) {
        //         $query->where ('username', $author);
        //     });
        // });
    }
        // public function scopeFiltere ($query, array $filters) {
        // // ?? digunakan untuk mengganti syntax ternary yang panjang
        // // $query->when($filters['search'] ?? false, function ($query, $search) {
        // //      $query->where('product_name', 'like', '%' . $search . '%')
        // //                  ->orWhere ('desc', 'like', '%' . $search . '%');
        // // })->when($filters['category'] ?? false, function ($query, $category) {
        // //     $query->whereHas ('category', function ($query) use ($category) {
        // //           $query->where ('slug', $category);
        // //     });
        // // });;

        // $query->when($filters['category'] ?? false, function ($query, $category) {
        //     $query->whereHas ('category', function ($query) use ($category) {
        //           $query->where ('slug', $category);
        //     });
        // });

    //     return $query;
    //     $query->when ($filters['author'] ?? false, function ($query, $author) {
    //         $query->whereHas('author', function($query) use ($author) {
    //             $query->where ('username', $author);
    //         });
    //     });
    // }
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transactions () {
        return $this->hasMany(transaction::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }
}
