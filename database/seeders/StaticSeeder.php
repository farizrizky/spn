<?php

namespace Database\Seeders;

use App\Models\StaticPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $pages = [
        [           
            'page' => 'home',
            'title' => 'Welcome to SPN Official',
            'meta_description' => '',
            'view_count' => 0,
        ],
        [
            'page' => 'profile',
            'title' => 'Profil PT. Sindo Prima Niaga',
            'meta_description' => '',
            'view_count' => 0,
        ],
        [
            'page' => 'award',
            'title' => 'Award',
            'meta_description' => '',
            'view_count' => 0,
        ],
        [
            'page' => 'kontak',
            'title' => 'Hubungi Kami',
            'meta_description' => '',
            'view_count' => 0,
        ],
        [
            'page' => 'consignment-project',
            'title' => 'Consignment Project',
            'meta_description' => '',
            'view_count' => 0,
        ],
        [
            'page' => 'layanan-distribusi',
            'title' => 'Layanan Distribusi',
            'meta_description' => '',
            'view_count' => 0,
        ],

    ];
    public function run(): void
    {
        StaticPage::truncate(); // Clear existing records
        foreach ($this->pages as $page) {
            StaticPage::create($page);
        }
    }
}
        