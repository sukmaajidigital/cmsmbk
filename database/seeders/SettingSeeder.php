<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting')->insert([
            'app_name' => 'Dashboard MBK',
            'data_theme' => 'gourmet',
            'dir' => 'ltr',
            'logo' => 'logo/PJUMXQbq5l5EQ5GImO6Ikg8HYXxv4JYwtB1CL2ov.png',
            'icon' => 'icons/tIqInRVDpeW8ROs5TRSQZKJXFGxWARs8kJZMx3OC.png',
        ]);
    }
}
