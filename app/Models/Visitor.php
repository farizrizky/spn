<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasUuids;
    protected $table = 'visitor';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
