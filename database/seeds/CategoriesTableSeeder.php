<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert(array(
            array(
                'title' => 'PHP',
                'slug' => Str::slug('PHP'),
                'lang' => 'tr', ),
            array(
                'title' => 'SQL',
                'slug' => Str::slug('SQL'),
                'lang' => 'tr', ),
            array(
                'title' => 'HTML',
                'slug' => Str::slug('HTML'),
                'lang' => 'tr', ),
            array(
                'title' => 'CSS',
                'slug' => Str::slug('CSS'),
                'lang' => 'tr', ),
            array(
                'title' => 'Javascript',
                'slug' => Str::slug('Javascript'),
                'lang' => 'tr', ),
            array(
                'title' => 'JQuery',
                'slug' => Str::slug('JQuery'),
                'lang' => 'en', ), ));
    }
}
