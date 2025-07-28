<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class QualityLevel extends Model
{
    use HasUuids;
    protected $table = 'quality_level';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function product()
    {
        return $this->hasManyThrough(
            Product::class,
            ProductQualityLevel::class,
            'quality_level', // Foreign key on ProductQualityLevel table
            'id', // Foreign key on Product table
            'id', // Local key on QualityLevel table
            'product' // Local key on ProductQualityLevel table
        );
    }

    public function productQualityLevel()
    {
        return $this->hasMany(ProductQualityLevel::class, 'quality_level');
    }
}
