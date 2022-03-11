<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678),
        ]);
        $user->assignRole('admin');

        User::factory()->count(3)
            ->create([
                'email_verified_at' => null,
                'password' => bcrypt(12345678),
            ])->each(function ($item) {
                $item->assignRole('user');
            });
    }
}
