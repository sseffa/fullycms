<?php

class SettingsTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('settings')->truncate();

        $article = array(
            'site_title'       => 'sf',
            'ga_code'          => 'ga_code',
            'meta_keywords'    => 'meta_keywords',
            'meta_description' => 'meta_description',
        );

        DB::table('settings')->insert($article);
    }
}
