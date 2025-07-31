<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasUuids;
    protected $table = 'contact_form';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
