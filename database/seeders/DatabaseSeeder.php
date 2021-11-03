<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portal_web;
use App\Models\Divisi;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Portal_web::create([
            'title' => "Halaman HRIS",
            'divisi_id' => "1",
            'desc'  => "Halaman ini untuk mengatur kepegawaian",
            'link'  => "hris.com"
        ]);

        Portal_web::create([
            'title' => "Halaman Inventory",
            'divisi_id' => "1",
            'desc'  => "Halaman ini untuk mengatur persediaan",
            'link'  => "inventory.com"
        ]);

        Portal_web::create([
            'title' => "Halaman SAFE",
            'divisi_id' => "2",
            'desc'  => "Halaman ini untuk mengatur alur kas",
            'link'  => "safe.com"
        ]);

        Divisi::create([
            'name'  => "SDM & Umum"
        ]);
        
        Divisi::create([
            'name'  => "keuangan"
        ]);

        User::create([
            'name' => 'Coba User',
            'email' => 'cobauser@gmail.com',
            'empid' => '121212',
            'password'  => bcrypt('coba123')
        ]);

    }
}
