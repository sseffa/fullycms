<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        Eloquent::unguard();

        $this->call('NewsTableSeeder');
        $this->call('ArticlesTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('ArticlesTagsTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('PagesTableSeeder');
        $this->call('PhotoGalleriesTableSeeder');
        $this->call('SettingsTableSeeder');
    	$this->call('MenusTableSeeder');
	}
}