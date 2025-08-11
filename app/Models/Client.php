<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasUuids;
    protected $table = 'client';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
