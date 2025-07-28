<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasUuids;
    protected $table = 'product_image';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product');
    }
}
