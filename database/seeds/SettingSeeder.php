<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'name'=>'Management',
            'logo'=>'asset/dist/img/AdminLTELogo.png',
            'url'=>'www.google.com',
        ]);
    }
}
