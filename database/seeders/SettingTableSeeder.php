<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'primary_color' => 'purple',
            'secondary_color' => 'azure',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
