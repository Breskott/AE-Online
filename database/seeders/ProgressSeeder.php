<?php

namespace Database\Seeders;

use App\Models\Progress;
use Illuminate\Database\Seeder;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Progress::factory()
            ->count(5)
            ->create();
    }
}
