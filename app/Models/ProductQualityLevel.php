<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ProductQualityLevel extends Model
{
    use HasUuids;
    protected $table = 'product_quality_level';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product');
    }

    public function qualityLevel()
    {
        return $this->belongsTo(QualityLevel::class, 'quality_level');
    }
}
