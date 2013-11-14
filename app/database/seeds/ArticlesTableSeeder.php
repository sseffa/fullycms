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
            'title'            => 'Hello World',
            'slug'             => Str::slug('Hello World'),
            'content'          => 'This is the first blog post.',
            'meta_title'       => e('Hello World'),
            'meta_keywords'    => str_replace(' ', ', ', strtolower('Hello World')),
            'meta_description' => strip_tags('Hello World'),
            'created_at'       => new DateTime,
            'updated_at'       => new DateTime,
        );

        DB::table('articles')->insert($article);
    }
}
