<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasUuids;
    protected $table = 'type';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_type', 'type', 'product');
    }
}
