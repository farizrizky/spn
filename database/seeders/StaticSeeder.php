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
            'slug' => '/',
            'meta_description' => '',
            'view_count' => 0,
        ],
        [
            'slug' => 'profil',
            'meta_description' => '',
            'view_count' => 0,
        ],
        [
            'slug' => 'award',
            'meta_description' => '',
            'view_count' => 0,
        ],
        [
            'slug' => 'kontak',
            'meta_description' => '',
            'view_count' => 0,
        ],
        [
            'slug' => 'consignment-project',
            'meta_description' => '',
            'view_count' => 0,
        ],
        [
            'slug' => 'layanan-distribusi',
            'meta_description' => '',
            'view_count' => 0,
        ],

    ];
    public function run(): void
    {
        foreach ($this->pages as $page) {
            StaticPage::create($page);
        }
    }
}
        