<?php

class NewsTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('news')->truncate();

        DB::table('news')->insert(array(
            array(
                'title'      => 'Lorem Lipsum',
                'slug'       => Str::slug('Lorem Lipsum'),
                'content'    => 'Lorem lipsum dolar.',
                'datetime'   => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'title'      => 'Lorem Lipsum 2',
                'slug'       => Str::slug('Lorem Lipsum 2'),
                'content'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean faucibus in tellus vel consectetur. Cras a quam facilisis, porta dui id, ultrices dui. Donec molestie, tortor eu condimentum tempus, massa nisl auctor dui, sodales tempus diam leo sed magna. Aliquam eu neque non nibh congue euismod. Vestibulum at malesuada nibh, sit amet imperdiet erat. Vivamus fringilla augue nunc, id porttitor lectus iaculis vitae. Maecenas posuere porttitor arcu. Nullam bibendum congue diam sed interdum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin laoreet aliquam gravida. Etiam sit amet orci sed augue lacinia vulputate. Phasellus mollis pretium orci, mollis ultrices purus accumsan sed. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam ac sollicitudin erat, sit amet cursus elit. Duis nec lacinia eros, sit amet convallis erat. ',
                'datetime'   => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'title'      => 'Lorem Lipsum 3',
                'slug'       => Str::slug('Lorem Lipsum 3'),
                'content'    => 'Aenean varius lectus commodo, sollicitudin nulla eget, malesuada velit. Maecenas neque mi, eleifend non urna non, pellentesque tincidunt orci. Aliquam elit libero, feugiat a posuere id, aliquet non dui. Nam ultrices nisl elit, a auctor mauris malesuada sit amet. Etiam malesuada scelerisque nisl, eu mollis leo condimentum sit amet. Nam varius aliquam malesuada. Curabitur scelerisque facilisis dolor, vitae viverra metus mollis ut. Nunc non neque ut ante pretium adipiscing sit amet sed leo. Donec eu vehicula arcu, non blandit quam. ',
                'datetime'   => new DateTime,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        ));
    }
}
