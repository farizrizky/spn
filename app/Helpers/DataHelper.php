<?php
namespace App\Helpers;

use Illuminate\Support\Facades\App;

Class DataHelper{

    public static function getType()
    {
        return \App\Models\Type::where('is_active', true)->get();
    }

    public static function getBlogCategory()
    {
        return \App\Models\BlogCategory::get();
    }

}