<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_list',
        'product_type',
        'product_detail',
        'product_code',
        'product_category'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
