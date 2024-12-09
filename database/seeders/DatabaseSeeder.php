<?php

namespace Database\Seeders;

use App\Models\Plane;
use Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Session;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = Config::get('seeder.count', 1);
        Plane::factory($count)->create();
    }
}
