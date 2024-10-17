<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'Buku Pemrograman Laravel', 'description' => 'Panduan lengkap untuk memulai dengan Laravel.', 'price' => 150000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Pemrograman JavaScript', 'description' => 'Belajar JavaScript dari dasar hingga mahir.', 'price' => 180000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Panduan CSS', 'description' => 'Panduan lengkap untuk styling website dengan CSS.', 'price' => 120000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Pemrograman Python', 'description' => 'Dasar-dasar pemrograman Python untuk pemula.', 'price' => 160000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Pengembangan Web Frontend', 'description' => 'Komprehensif untuk pengembangan web frontend.', 'price' => 200000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Pengembangan Web Backend', 'description' => 'Panduan lengkap untuk pengembangan web backend.', 'price' => 190000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Database MySQL', 'description' => 'Belajar dan mengelola database MySQL.', 'price' => 140000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Java untuk Pemula', 'description' => 'Memulai perjalanan pemrograman Java.', 'price' => 170000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku UX/UI Design', 'description' => 'Panduan lengkap desain UX/UI untuk pemula.', 'price' => 220000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Framework Vue.js', 'description' => 'Belajar framework Vue.js dari dasar hingga mahir.', 'price' => 150000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Framework React.js', 'description' => 'Memahami framework React.js dengan praktis.', 'price' => 160000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku API Development', 'description' => 'Cara membuat dan menggunakan API.', 'price' => 130000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Algoritma dan Struktur Data', 'description' => 'Mempelajari algoritma dan struktur data dasar.', 'price' => 180000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Cloud Computing', 'description' => 'Pengantar untuk cloud computing dan layanan cloud.', 'price' => 210000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku DevOps Essentials', 'description' => 'Dasar-dasar DevOps untuk pengembangan perangkat lunak.', 'price' => 190000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Cybersecurity Basics', 'description' => 'Konsep dasar keamanan siber dan praktik terbaik.', 'price' => 200000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Machine Learning', 'description' => 'Pengantar machine learning dan teknik-tekniknya.', 'price' => 230000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Blockchain dan Cryptocurrency', 'description' => 'Memahami blockchain dan cryptocurrency.', 'price' => 250000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Pengembangan Aplikasi Mobile', 'description' => 'Membuat aplikasi mobile untuk Android dan iOS.', 'price' => 220000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Agile dan Scrum', 'description' => 'Metodologi Agile dan Scrum dalam pengembangan perangkat lunak.', 'price' => 170000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Internet of Things (IoT)', 'description' => 'Dasar-dasar IoT dan implementasinya.', 'price' => 240000, 'image' => 'images/buku-1.png'],
            ['name' => 'Buku Testing dan Quality Assurance', 'description' => 'Metode testing dan kualitas perangkat lunak.', 'price' => 180000, 'image' => 'images/buku-1.png'],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
