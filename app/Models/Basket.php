<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class, 'basket_products', 'basket_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['user_id'];
}
