<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','cedula','telefono' ,'total','status','address'];


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }
}

