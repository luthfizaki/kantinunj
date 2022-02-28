<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class transactions extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];
    protected $with = [ 'author', 'product'];

    public function category() {
        return $this->hasMany(Category::class);
    }

    public function product () {
        return $this->belongsTo(product::class);
    }
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
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
