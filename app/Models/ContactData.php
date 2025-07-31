<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ContactData extends Model
{
    use HasUuids;
    protected $table = 'contact_data';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
