<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdministradorSeeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AdministradorSeeder::class);
    }
}
