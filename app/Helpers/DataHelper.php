<?php
namespace App\Helpers;

use Illuminate\Support\Facades\App;

Class DataHelper{

    public static function getProductCategory()
    {
        return \App\Models\ProductCategory::where('is_active', true)->get();
    }

}