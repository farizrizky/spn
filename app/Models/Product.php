<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuids;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category');
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product');
    }

    public function productAdditionalInformation()
    {
        return $this->hasMany(ProductAdditionalInformation::class, 'product');
    }

    public function qualityLevel()
    {
        return $this->hasManyThrough(
            QualityLevel::class,
            ProductQualityLevel::class,
            'product', // Foreign key on ProductQualityLevel table
            'id', // Foreign key on QualityLevel table
            'id', // Local key on Product table
            'quality_level' // Local key on ProductQualityLevel table
        );
    }

    public function productQualityLevel()
    {
        return $this->hasMany(ProductQualityLevel::class, 'product');
    }

}
