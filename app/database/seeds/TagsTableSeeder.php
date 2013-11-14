<?php

class TagsTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('tags')->truncate();

        $tags = array(
            'name'       => 'laravel',
            'slug'       => Str::slug('laravel'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        );

        DB::table('tags')->insert($tags);
    }
}
