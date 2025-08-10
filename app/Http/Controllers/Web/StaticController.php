<?php

namespace App\Http\Controllers\Web;

use App\Helpers\DataHelper;
use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use App\Models\Type;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function home(Request $request)
    {
        $data = [
            'title' => StaticPage::where('page', 'home')->value('title'),
            'meta_description' => StaticPage::where('page', 'home')->value('meta_description'),
            'partial_recent_blog' => PartialController::recentBlog(),
            'data_type' => Type::where('is_active', '1')->get(),
        ];

        $url = route('web.home');
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            StaticPage::where('page', 'home')->increment('view_count');
        }
        
        return view('web.page.static.home', $data);
    }

    public function profile(Request $request)
    {
        $data = [
            'title' => StaticPage::where('page', 'profile')->value('title'),
            'meta_description' => StaticPage::where('page', 'profile')->value('meta_description'),
            'partial_title' => PartialController::title('Profil'),
        ];

        $url = route('web.profile');
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            StaticPage::where('page', 'profile')->increment('view_count');
        }
        
        return view('web.page.static.profile', $data);
    }

    public function visionMission(Request $request)
    {
        $data = [
            'title' => StaticPage::where('page', 'vision-mission')->value('title'),
            'meta_description' => StaticPage::where('page', 'vision-mission')->value('meta_description'),
            'partial_title' => PartialController::title('Visi & Misi'),
        ];

        $url = route('web.vision-mission');
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            StaticPage::where('page', 'vision-mission')->increment('view_count');
        }

        return view('web.page.static.vision-mission', $data);
    }

    public function consignmentProject(Request $request)
    {
        $data = [
            'title' => StaticPage::where('page', 'consignment-project')->value('title'),
            'meta_description' => StaticPage::where('page', 'consignment-project')->value('meta_description'),
            'partial_title' => PartialController::title('Consignment Project'),
        ];

        $url = route('web.consignment-project');
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            StaticPage::where('page', 'consignment-project')->increment('view_count');
        }

        return view('web.page.static.consignment-project', $data);
    }

    public function award(Request $request)
    {
        $data = [
            'title' => StaticPage::where('page', 'award')->value('title'),
            'meta_description' => StaticPage::where('page', 'award')->value('meta_description'),
            'partial_title' => PartialController::title('Award'),
        ];

        $url = route('web.award');
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            StaticPage::where('page', 'award')->increment('view_count');
        }

        return view('web.page.static.award', $data);
    }

    public function distributionService(Request $request)
    {
        $data = [
            'title' => StaticPage::where('page', 'layanan-distribusi')->value('title'),
            'meta_description' => StaticPage::where('page', 'layanan-distribusi')->value('meta_description'),
            'partial_title' => PartialController::title('Layanan Distribusi'),
        ];

        $url = route('web.distribution-service');
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            StaticPage::where('page', 'layanan-distribusi')->increment('view_count');
        }

        return view('web.page.static.distribution-service', $data);
    }

    public function lubeTruck(Request $request)
    {
        $data = [
            'title' => StaticPage::where('page', 'lube-truck')->value('title'),
            'meta_description' => StaticPage::where('page', 'lube-truck')->value('meta_description'),
            'partial_title' => PartialController::title('Lube Truck'),
        ];

        $url = route('web.home');
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            StaticPage::where('page', 'home')->increment('view_count');
        }
        
        return view('web.page.static.lube-truck', $data);
    }

    public function lubeStation(Request $request)
    {
        $data = [
            'title' => StaticPage::where('page', 'lube-station')->value('title'),
            'meta_description' => StaticPage::where('page', 'lube-station')->value('meta_description'),
            'partial_title' => PartialController::title('Lube Station'),
        ];

        $url = route('web.lube-station');
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            StaticPage::where('page', 'lube-station')->increment('view_count');
        }

        return view('web.page.static.lube-station', $data);
    }

    public function contact(Request $request)
    {
        $data = [
            'title' => StaticPage::where('page', 'kontak')->value('title'),
            'meta_description' => StaticPage::where('page', 'kontak')->value('meta_description'),
            'partial_title' => PartialController::title('Hubungi Kami'),
        ];

        $url = route('web.contact');
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            StaticPage::where('page', 'kontak')->increment('view_count');
        }

        return view('web.page.static.contact', $data);
    }

    public function notFound()
    {
        $data = [
            'title' => 'Halaman Tidak Ditemukan',
            'meta_description' => 'Halaman yang Anda cari tidak ditemukan.',
            'partial_title' => PartialController::title('Halaman Tidak Ditemukan'),
        ];
        
        return view('web.page.static.not-found', $data);
    }
}
