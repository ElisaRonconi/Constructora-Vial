<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Machine;
use App\Models\Work;
use App\Models\Province;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
         Machine::factory()->count(10)->create();
         Work::factory()->count(10)->create();       
         $this->call([ProvinceSeeder::class,
         AdminUserSeeder::class,]);
 
    }
}
