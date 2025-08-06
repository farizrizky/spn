<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class WebsiteCover extends Model
{
    use HasUuids;
    protected $table = 'website_cover';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
