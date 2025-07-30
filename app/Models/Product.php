<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuids, HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product');
    }

    public function productAdditionalInformation()
    {
        return $this->hasMany(ProductAdditionalInformation::class, 'product');
    }

    public function productType()
    {
        return $this->belongsToMany(Type::class, 'product_type', 'product', 'type');
    }

}
