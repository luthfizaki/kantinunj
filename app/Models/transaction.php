<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    // use Sluggable;

    protected $guarded = ['id'];
    protected $with = [ 'author', 'product', 'customer'];

    // public function category() {
    //     return $this->belongsTo(Category::class);
    // }

    // public function product () {
    //     return $this->belongsTo(product::class);
    // }
    // public function author() {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function customer() {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function transactions () {
    //     return $this->hasMany(transaction::class);
    // }

        public function product () {
        return $this->belongsTo(product::class);
    }

    // public function getRouteKeyName() {
    //     return 'slug';
    // }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }
}
