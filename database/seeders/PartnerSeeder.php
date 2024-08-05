<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
        Partner::create([
            'title' => 'partner-1',
            'image' => 'partner-1.jpg'
        ]);
        Partner::create([
            'title' => 'partner-2',
            'image' => 'partner-2.jpg'
        ]);
        Partner::create([
            'title' => 'partner-3',
            'image' => 'partner-3.jpg'
        ]);
        Partner::create([
            'title' => 'partner-4',
            'image' => 'partner-4.jpg'
        ]);
        Partner::create([
            'title' => 'partner-5',
            'image' => 'partner-5.jpg'
        ]);
    }
}
