<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Eloquent::unguard();

        $this->call('ArticlesTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('ArticlesTagsTableSeeder');
        $this->call('PagesTableSeeder');
        $this->call('PhotoGalleriesTableSeeder');
        $this->call('SettingsTableSeeder');
    }
}