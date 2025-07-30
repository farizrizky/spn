<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasUuids, HasFactory;
    protected $table = 'blog';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category');
    }

    public function blogTag()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag', 'blog', 'tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
