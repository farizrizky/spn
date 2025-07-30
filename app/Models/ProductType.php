<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class ProductType extends Model
{
    use HasUuids, HasFactory;
    protected $table = 'product_type';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
