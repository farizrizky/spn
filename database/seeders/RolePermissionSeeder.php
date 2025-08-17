<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $permissions = [
        'Blog.Lihat Blog',
        'Blog.Kelola Blog',
        'Kategori Blog.Lihat Kategori Blog',
        'Kategori Blog.Kelola Kategori Blog',
        'Tag.Lihat Tag',
        'Tag.Kelola Tag',
        'Produk.Lihat Produk',
        'Produk.Kelola Produk',
        'Kategori Produk.Lihat Kategori Produk',
        'Kategori Produk.Kelola Kategori Produk',
        'File.Lihat File',
        'File.Kelola File',
        'Form Kontak.Lihat Form Kontak',
        'Form Kontak.Kelola Form Kontak',
        'Data Kontak.Lihat Data Kontak',
        'Data Kontak.Kelola Data Kontak',
        'Client.Lihat Client',
        'Client.Kelola Client',
        'Testimonial.Lihat Testimonial',
        'Testimonial.Kelola Testimonial',
        'Website Cover.Lihat Website Cover',
        'Website Cover.Kelola Website Cover',
        'Website Header.Lihat Website Header',
        'Website Header.Kelola Website Header',
        'Halaman Statis.Lihat Halaman Statis',
        'Halaman Statis.Kelola Halaman Statis',
        'Visitor Log.Lihat Visitor Log',
        'User.Lihat User',
        'User.Kelola User',
        'Role.Lihat Role',
        'Role.Kelola Role',
        'Permission.Lihat Permission',
        'Permission.Kelola Permission'
    ];

    private $roles = [
        'Administrator',
    ];

    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }

        foreach ($this->roles as $role) {
            \Spatie\Permission\Models\Role::create(['name' => $role]);
        }
    }
}
