<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class WebsiteHeader extends Model
{
    use HasUuids;
    protected $table = 'website_header';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
