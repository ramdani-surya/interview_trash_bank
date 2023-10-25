<?php

namespace Database\Seeders;

use App\Models\TrashType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrashTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trashTypes = [
            [
                'type_name' => 'Kertas',
                'price_kg' => 1500
            ],
            [
                'type_name' => 'Plastik',
                'price_kg' => 3000
            ],
            [
                'type_name' => 'Logam',
                'price_kg' => 5000
            ],
            [
                'type_name' => 'Kaca',
                'price_kg' => 1500
            ],
        ];

        foreach ($trashTypes as $trashType) {
            TrashType::create($trashType);
        }
    }
}
