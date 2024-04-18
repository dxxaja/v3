<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class KomenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat beberapa data komentar
        $comments = [
            [
                'user_id' => 1, // Sesuaikan dengan ID pengguna yang membuat komentar
                'photo_id' => 1, // Sesuaikan dengan ID foto yang dikomentari
                'content' => 'Ini adalah komentar pertama.',
            ],
            [
                'user_id' => 2,
                'photo_id' => 2,
                'content' => 'Ini adalah komentar kedua.',
            ],
            // Tambahkan data komentar lainnya sesuai kebutuhan
        ];

        // Masukkan data komentar ke dalam database
        foreach ($comments as $comment) {
            Comment::create($comment);
        }
    }
}
