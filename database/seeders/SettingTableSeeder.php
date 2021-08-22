<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Setting::create([
                'nom' => 'exemple.com',
                'copyright' => 'copyright 2021 tous droits reservés',
        ]);
    }
}
