<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::create([
            'name' => 'Admin Kelurahan Gundih',
            'email' => 'admin@gundih.surabaya.go.id',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        // 2. Kelurahan Profile
        \App\Models\KelurahanProfile::create([
            'deskripsi' => 'Kelurahan Gundih adalah kelurahan yang terletak di Kecamatan Bubutan, Kota Surabaya. Kami berkomitmen memajukan UMKM lokal.',
            'visi' => 'Menjadi kelurahan digital yang mandiri dan berdaya saing.',
            'misi' => '1. Memajukan ekonomi kerakyatan melalui digitalisasi UMKM. 2. Memberikan pelayanan publik yang prima.',
            'alamat_kantor' => 'Jl. Gundih No. 1, Surabaya',
            'kontak' => '031-1234567',
        ]);

        // 3. Categories
        $categories = [
            'Kuliner', 'Fashion', 'Kerajinan', 'Jasa', 'Kebutuhan Pokok'
        ];
        
        $categoryIds = [];
        foreach ($categories as $cat) {
            $createdCat = \App\Models\Category::create(['nama_kategori' => $cat]);
            $categoryIds[] = $createdCat->id;
        }

        // 4. UMKMs (10 dummy data)
        $faker = \Faker\Factory::create('id_ID');
        
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Umkm::create([
                'nama_usaha' => 'Usaha ' . $faker->company,
                'pemilik' => $faker->name,
                'kategori_id' => $faker->randomElement($categoryIds),
                'deskripsi' => $faker->paragraph(2),
                'alamat' => $faker->address,
                'no_telepon' => $faker->phoneNumber,
                'jam_operasional' => '08:00 - 17:00',
                'link_sosmed' => 'https://instagram.com/umkm_' . $i,
                'status' => 'aktif',
            ]);
        }
    }
}
