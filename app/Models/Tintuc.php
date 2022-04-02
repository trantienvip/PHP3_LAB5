<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    use HasFactory;

    protected $table = 'tintuc';

    protected $fillable = [
        'name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'tintuc_product',
            'tintuc_id',
            'product_id',
        );
    }
}
