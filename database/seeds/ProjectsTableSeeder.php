<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     */
    public function run()
    {
        DB::table('projects')->truncate();

        DB::table('projects')->insert(array(
            array(
                'title' => 'Lorem ipsum dolor',
                'slug' => Str::slug('Lorem ipsum dolor'),
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'path' => '',
                'file_name' => '',
                'file_size' => 0,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(), ),
            array(
                'title' => 'Nullam sapien urna',
                'slug' => Str::slug('Nullam sapien urna'),
                'description' => 'Nullam sapien urna, volutpat vel tempus ac, porttitor sed lorem',
                'path' => '',
                'file_name' => '',
                'file_size' => 0,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(), ),
            array(
                'title' => 'Nunc fringilla',
                'slug' => Str::slug('Nunc fringilla'),
                'description' => 'Nunc fringilla ut purus non pellentesque. Integer eget risus nunc',
                'path' => '',
                'file_name' => '',
                'file_size' => 0,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(), ),
            array(
                'title' => 'Morbi commodo',
                'slug' => Str::slug('Morbi commodo'),
                'description' => 'Morbi commodo massa at facilisis dignissim',
                'path' => '',
                'file_name' => '',
                'file_size' => 0,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(), ),
            array(
                'title' => 'Suspendisse',
                'slug' => Str::slug('Suspendisse'),
                'description' => 'Suspendisse enim eros, egestas quis risus eu, vulputate dignissim nisl',
                'path' => '',
                'file_name' => '',
                'file_size' => 0,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(), ),
            array(
                'title' => 'Vestibulum',
                'slug' => Str::slug('Vestibulum'),
                'description' => 'Vestibulum nec nisi feugiat, scelerisque urna ac, blandit nibh',
                'path' => '',
                'file_name' => '',
                'file_size' => 0,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(), ),
            array(
                'title' => 'Donec lobortis pulvinar faucibus',
                'slug' => Str::slug('Donec lobortis pulvinar faucibus'),
                'description' => 'Donec lobortis pulvinar faucibus. Etiam interdum justo eu dolor vulputate, at condimentum dolor faucibus',
                'path' => '',
                'file_name' => '',
                'file_size' => 0,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(), ),
            array(
                'title' => 'Phasellus tempor ut ligula eget porta',
                'slug' => Str::slug('Phasellus tempor ut ligula eget porta'),
                'description' => 'Phasellus tempor ut ligula eget porta. Maecenas elementum iaculis ante, ut mattis lorem semper vel',
                'path' => '',
                'file_name' => '',
                'file_size' => 0,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(), ),
            array(
                'title' => 'Aenean',
                'slug' => Str::slug('Aenean'),
                'description' => 'Aenean ornare erat sed semper gravida',
                'path' => '',
                'file_name' => '',
                'file_size' => 0,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(), ),
            array(
                'title' => 'Mauris dapibus tellus',
                'slug' => Str::slug('Mauris dapibus tellus'),
                'description' => 'Mauris dapibus tellus eu orci vulputate, hendrerit venenatis augue dictum',
                'path' => '',
                'file_name' => '',
                'file_size' => 0,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(), ), ));
    }
}
