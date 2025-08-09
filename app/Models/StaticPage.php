<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasUuids;
    protected $table = 'static';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
