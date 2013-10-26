<?php

class ArticlesTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('articles')->truncate();

        $article = array(
            'title'      => 'Hello World',
            'content'    => 'This is the first blog post.',   
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        );

        DB::table('articles')->insert($article);
    }
}
