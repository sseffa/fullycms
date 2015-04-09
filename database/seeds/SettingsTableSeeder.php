<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('settings')->truncate();

        $settings = array(
            'settings'   => '{"site_title":"Fully CMS","ga_code":"Google Analytics Code","meta_keywords":"Google Analytics Code","meta_description":"Meta Description"}',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
            'lang'       => 'tr');

        DB::table('settings')->insert($settings);
    }
}
