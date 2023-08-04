<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'price',
        'product_description',
        'product_fulldescription', // Varsayılan değeri burada tanımlayın
        'photo',
    ];
    public function allProduct()
{
    return $this->belongsTo(AllProduct::class);
}

}
