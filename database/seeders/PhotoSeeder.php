<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat beberapa data foto
        $photos = [
            [
                'album_id' => 1, // Sesuaikan dengan ID album tempat foto akan disimpan
                'user_id' => 1, // Sesuaikan dengan ID pengguna yang mengunggah foto
                'photo' => 'photo1.jpg', // Sesuaikan dengan nama file foto di direktori /storage/photos/
                'title' => 'Photo 1',
                'description' => 'Deskripsi photo 1',
                'size' => '1024x768',
            ],
            [
                'album_id' => 2,
                'user_id' => 2,
                'photo' => 'photo2.jpg',
                'title' => 'Photo 2',
                'description' => 'Deskripsi photo 2',
                'size' => '800x600',
            ],
            // Tambahkan data foto lainnya sesuai kebutuhan
        ];

        // Masukkan data foto ke dalam database
        foreach ($photos as $photo) {
            Photo::create($photo);
        }
    }
}
