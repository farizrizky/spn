<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ContactData;
use Illuminate\Database\Seeder;

class ContactDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactData::insert([
            [
                'id' => '01985fe5-5635-707d-80cd-11ab9e0edd60',
                'name' => 'Telepon',
                'value' => '08123456789',
                'url' => null,
                'icon' => 'ri-phone-fill',
                'created_at' => '2025-07-31 02:52:02',
                'updated_at' => '2025-07-31 02:52:02',
            ],
            [
                'id' => '01985fe5-d420-7010-95d6-e912564348ca',
                'name' => 'Email',
                'value' => 'sales@spniaga.co.id',
                'url' => null,
                'icon' => 'ri-mail-fill',
                'created_at' => '2025-07-31 02:52:34',
                'updated_at' => '2025-07-31 02:52:34',
            ],
            [
                'id' => '01985fe6-aea4-7001-9554-9fd25fcf7add',
                'name' => 'Alamat',
                'value' => 'Rukan Cordoba Blok C No.18 LT.1 Pantai Indah, DKI Jakarta',
                'url' => null,
                'icon' => 'ri-map-pin-2-fill',
                'created_at' => '2025-07-31 02:53:30',
                'updated_at' => '2025-07-31 03:01:58',
            ],
            [
                'id' => '01985fe7-ecb0-7163-8db9-e8b92bf7c86a',
                'name' => 'Instagram',
                'value' => null,
                'url' => 'https://www.instagram.com/spniaga_',
                'icon' => 'ri-instagram-line',
                'created_at' => '2025-07-31 02:54:51',
                'updated_at' => '2025-07-31 02:54:51',
            ],
            [
                'id' => '01985fe8-ef1e-735a-8550-36162a3bc329',
                'name' => 'LinkedIn',
                'value' => null,
                'url' => 'https://www.linkedin.com/company/pt-spniaga/',
                'icon' => 'ri-linkedin-line',
                'created_at' => '2025-07-31 02:55:57',
                'updated_at' => '2025-07-31 02:55:57',
            ],
            [
                'id' => '01985fe9-7543-70aa-8af2-0f3aaadeac5f',
                'name' => 'TikTok',
                'value' => null,
                'url' => 'https://www.tiktok.com/@spniaga_',
                'icon' => 'ri-tiktok-fill',
                'created_at' => '2025-07-31 02:56:32',
                'updated_at' => '2025-07-31 02:56:32',
            ],
        ]);
    }
}
