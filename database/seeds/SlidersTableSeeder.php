<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     */
    public function run()
    {
        DB::table('sliders')->truncate();

        DB::table('sliders')->insert(array(
            array(
                'title' => 'Lorem ipsum dolor',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'path' => '/uploads/slider/slider_1.jpg',
                'file_name' => 'slider_1.jpg',
                'file_size' => 676338,
                'order' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Nullam sapien urna',
                'description' => 'Nullam sapien urna, volutpat vel tempus ac, porttitor sed lorem',
                'path' => '/uploads/slider/slider_2.jpg',
                'file_name' => 'slider_2.jpg',
                'file_size' => 572388,
                'order' => 2,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Nunc fringilla',
                'description' => 'Nunc fringilla ut purus non pellentesque. Integer eget risus nunc',
                'path' => '/uploads/slider/slider_3.jpg',
                'file_name' => 'slider_3.jpg',
                'file_size' => 394405,
                'order' => 3,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Morbi commodo',
                'description' => 'Morbi commodo massa at facilisis dignissim',
                'path' => '/uploads/slider/slider_4.jpg',
                'file_name' => 'slider_4.jpg',
                'file_size' => 335322,
                'order' => 4,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Suspendisse',
                'description' => 'Suspendisse enim eros, egestas quis risus eu, vulputate dignissim nisl',
                'path' => '/uploads/slider/slider_5.jpg',
                'file_name' => 'slider_5.jpg',
                'file_size' => 698727,
                'order' => 5,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Vestibulum',
                'description' => 'Vestibulum nec nisi feugiat, scelerisque urna ac, blandit nibh',
                'path' => '/uploads/slider/slider_6.jpg',
                'file_name' => 'slider_6.jpg',
                'file_size' => 844577,
                'order' => 6,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Donec lobortis pulvinar faucibus',
                'description' => 'Donec lobortis pulvinar faucibus. Etiam interdum justo eu dolor vulputate, at condimentum dolor faucibus',
                'path' => '/uploads/slider/slider_7.jpg',
                'file_name' => 'slider_7.jpg',
                'file_size' => 503064,
                'order' => 7,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Phasellus tempor ut ligula eget porta',
                'description' => 'Phasellus tempor ut ligula eget porta. Maecenas elementum iaculis ante, ut mattis lorem semper vel',
                'path' => '/uploads/slider/slider_8.jpg',
                'file_name' => 'slider_8.jpg',
                'file_size' => 623998,
                'order' => 8,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Aenean',
                'description' => 'Aenean ornare erat sed semper gravida',
                'path' => '/uploads/slider/slider_9.jpg',
                'file_name' => 'slider_9.jpg',
                'file_size' => 412537,
                'order' => 9,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Mauris dapibus tellus',
                'description' => 'Mauris dapibus tellus eu orci vulputate, hendrerit venenatis augue dictum',
                'path' => '/uploads/slider/slider_10.jpg',
                'file_name' => 'slider_10.jpg',
                'file_size' => 492158,
                'order' => 10,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Aenean',
                'description' => 'Aenean ornare erat sed semper gravida',
                'path' => '/uploads/slider/slider_9.jpg',
                'file_name' => 'slider_9.jpg',
                'file_size' => 412537,
                'order' => 9,
                'lang' => 'en',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Mauris dapibus tellus',
                'description' => 'Mauris dapibus tellus eu orci vulputate, hendrerit venenatis augue dictum',
                'path' => '/uploads/slider/slider_10.jpg',
                'file_name' => 'slider_10.jpg',
                'file_size' => 492158,
                'order' => 10,
                'lang' => 'en',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
        ));
    }
}
