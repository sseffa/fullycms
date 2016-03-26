<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $this->call('ArticlesTableSeeder');
        $this->call('NewsTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('ArticlesTagsTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('PagesTableSeeder');
        $this->call('PhotoGalleriesTableSeeder');
        $this->call('SettingsTableSeeder');
        $this->call('MenusTableSeeder');
        $this->call('SlidersTableSeeder');
        $this->call('FaqsTableSeeder');
        $this->call('ProjectsTableSeeder');
        $this->call('VideosTableSeeder');
        $this->call('SlidersTableSeeder');
    }
}
