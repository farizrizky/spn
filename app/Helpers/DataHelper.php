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
        $data = \App\Models\ContactData::where('name', $name);
        if ($data->count() == 0) {
            return null;
        }
        return $data->first();
    }

    public static function generateWhatsAppLink()
    {
       $phone = self::getContactData('telepon');
       if (!$phone || !$phone->value) {
           return null;
       }
       $phone = preg_replace('/[^0-9]/', '', $phone->value);
       return "https://wa.me/{$phone}";
    }
}