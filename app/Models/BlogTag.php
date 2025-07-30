<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasUuids;
    protected $table = 'blog_tag';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    
}
