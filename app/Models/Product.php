<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $primaryKey = 'product_id';
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'description',
        'price',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
