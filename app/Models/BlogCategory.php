<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasUuids;
    protected $table = 'blog_category';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function blog()
    {
        return $this->hasMany(Blog::class, 'blog_category');
    }
}
