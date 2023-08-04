<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'author', 'book_description', 'photo', 'product_name', 'product_description'];

    public function book()
    {
        return $this->hasOne(Book::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
