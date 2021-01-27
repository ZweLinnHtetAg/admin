<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            'primary_color' => 'blue',
            'secondary_color' => 'purple',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
