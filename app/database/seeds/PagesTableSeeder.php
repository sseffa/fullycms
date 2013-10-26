<?php

class PagesTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('pages')->truncate();

        $article = array(
            'title'      => 'About',
            'content'    => 'Lorem Lipsum',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
            'is_menu'    => true,
        );

        DB::table('pages')->insert($article);
    }
}
