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

    public static function getContactData($name)
    {
        return \App\Models\ContactData::where('name', $name)->first();
    }

    public static function generateWhatsAppLink()
    {
       $phone = self::getContactData('telepon')->value;
       return "https://wa.me/{$phone}";
    }
}