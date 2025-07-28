<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasUuids;
    protected $table = 'product_category';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function product()
    {
        return $this->hasMany(Product::class, 'product_category');
    }

}
