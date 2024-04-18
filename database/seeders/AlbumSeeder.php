<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat beberapa data album
        $albums = [
            [
                'name' => 'Album 1',
                'description' => 'Deskripsi album 1',
                'cover_image' => 'album1.jpg', // Sesuaikan dengan nama file gambar di direktori /storage/album_covers/
                'user_id' => 1, // Sesuaikan dengan ID pengguna yang membuat album
            ],
            [
                'name' => 'Album 2',
                'description' => 'Deskripsi album 2',
                'cover_image' => 'album2.jpg',
                'user_id' => 2,
            ],
            // Tambahkan data album lainnya sesuai kebutuhan
        ];

        // Masukkan data album ke dalam database
        foreach ($albums as $album) {
            Album::create($album);
        }
    }
}
