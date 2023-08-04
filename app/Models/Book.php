<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'author', 'book_description', 'photo'];
    public function allProduct()
{
    return $this->belongsTo(AllProduct::class);
}

}
