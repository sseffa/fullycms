<?php

class ArticlesTagsTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('articles_tags')->truncate();

        $articlesTags = array(
            'article_id' => 1,
            'tag_id'     => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        );

        DB::table('articles_tags')->insert($articlesTags);
    }
}
