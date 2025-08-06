<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'Welcome to SPN Official',
            'description' => 'Professional, Fast, Save, and Competitive',
            'partial_hero' => PartialController::hero('custom1'),
            'partial_recent_blog' => PartialController::recentBlog(),
            'data_type' => Type::where('is_active', '1')->get(),
        ];
        
        return view('web.page.static.home', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profil PT. Sindo Prima Niaga',
            'partial_title' => PartialController::title('Profil'),
        ];
        
        return view('web.page.static.profile', $data);
    }

    public function visionMission()
    {
        $data = [
            'title' => 'Visi & Misi',
            'partial_title' => PartialController::title('Visi & Misi'),
        ];
        
        return view('web.page.static.vision-mission', $data);
    }

    public function consignmentProject()
    {
        $data = [
            'title' => 'Consignment Project',
            'partial_title' => PartialController::title('Consignment Project'),
        ];
        
        return view('web.page.static.consignment-project', $data);
    }

    public function award()
    {
        $data = [
            'title' => 'Award',
            'partial_title' => PartialController::title('Award'),
        ];
        
        return view('web.page.static.award', $data);
    }

    public function distributionService()
    {
        $data = [
            'title' => 'Layanan Distribusi',
            'partial_title' => PartialController::title('Layanan Distribusi'),
        ];
        
        return view('web.page.static.distribution-service', $data);
    }

    public function lubeTruck()
    {
        $data = [
            'title' => 'Lube Truck',
            'partial_title' => PartialController::title('Lube Truck'),
        ];
        
        return view('web.page.static.lube-truck', $data);
    }

    public function lubeStation()
    {
        $data = [
            'title' => 'Lube Station',
            'partial_title' => PartialController::title('Lube Station'),
        ];
        
        return view('web.page.static.lube-station', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Hubungi Kami',
            'partial_title' => PartialController::title('Hubungi Kami'),
        ];
        
        return view('web.page.static.contact', $data);
    }

    public function notFound()
    {
        $data = [
            'title' => 'Halaman Tidak Ditemukan',
            'partial_title' => PartialController::title('Halaman Tidak Ditemukan'),
        ];
        
        return view('web.page.static.not-found', $data);
    }
}
