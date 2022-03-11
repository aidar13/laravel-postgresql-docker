<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['available', 'unavailable'];

        Product::factory()
            ->count(10)
            ->create([
                'status' => $statuses[mt_rand(0, 1)],
            ]);
    }
}
