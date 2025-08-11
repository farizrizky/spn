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

    public static function getWebsiteCover()
    {
        return \App\Models\WebsiteCover::where('is_active', true)->get();
    }

    public static function getClient(){
        return \App\Models\Client::where('is_active', true)->get();
    }

    public static function getTestimonial()
    {
        return \App\Models\Testimonial::where('is_active', true)->get();
    }

    public static function urlVisited($ipAddress, $url)
    {
        $today = now()->format('Y-m-d');
        $visited = \App\Models\Visitor::where('ip_address', $ipAddress)
            ->whereDate('created_at', $today)
            ->where('url', $url)
            ->count();

        if($visited > 1) {
            return true;
        }

        return false;
    }
}   