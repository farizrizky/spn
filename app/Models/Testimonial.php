<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasUuids;
    protected $table = 'testimonial';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
