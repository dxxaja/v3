<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat beberapa data like
        $likes = [
            [
                'user_id' => 1, // Sesuaikan dengan ID pengguna yang memberi like
                'photo_id' => 1, // Sesuaikan dengan ID foto yang akan diberi like
            ],
            [
                'user_id' => 2,
                'photo_id' => 2,
            ],
            // Tambahkan data like lainnya sesuai kebutuhan
        ];

        // Masukkan data like ke dalam database
        foreach ($likes as $like) {
            Like::create($like);
        }
    }
}
