<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasUuids;
    protected $table = 'tag';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function blog()
    {
        return $this->belongsToMany(Blog::class, 'blog_tag', 'tag', 'blog');
    }
}
