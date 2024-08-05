<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cat;

class CatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
        Cat::create([
            'name' => 'kucing-1',
            'description' => 'ini adalah kucing',
            'image' => 'kucing-1.jpeg'
        ]);
        Cat::create([
            'name' => 'kucing-2',
            'description' => 'ini adalah kucing',
            'image' => 'kucing-2.jpeg'
        ]);
        Cat::create([
            'name' => 'kucing-3',
            'description' => 'ini adalah kucing',
            'image' => 'kucing-3.jpeg'
        ]);
        Cat::create([
            'name' => 'kucing-4',
            'description' => 'ini adalah kucing',
            'image' => 'kucing-4.jpeg'
        ]);
        Cat::create([
            'name' => 'kucing-5',
            'description' => 'ini adalah kucing',
            'image' => 'kucing-5.jpeg'
        ]);
    }
}
