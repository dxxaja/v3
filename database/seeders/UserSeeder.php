<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat beberapa data pengguna
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'asd@asd',
                'password' => Hash::make('asd'),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password456'),
            ],
            // Tambahkan data pengguna lainnya sesuai kebutuhan
        ];

        // Masukkan data pengguna ke dalam database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
