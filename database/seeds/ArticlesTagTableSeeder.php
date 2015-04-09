<?php

use Illuminate\Database\Seeder;

class ArticlesTagsTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('articles_tags')->truncate();

        DB::table('articles_tags')->insert(array(
            array(
                'article_id' => 1,
                'tag_id'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 1,
                'tag_id'     => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 1,
                'tag_id'     => 4,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 2,
                'tag_id'     => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 2,
                'tag_id'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 3,
                'tag_id'     => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 3,
                'tag_id'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 3,
                'tag_id'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 4,
                'tag_id'     => 4,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 4,
                'tag_id'     => 5,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 2,
                'tag_id'     => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 5,
                'tag_id'     => 5,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 5,
                'tag_id'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 1,
                'tag_id'     => 8,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 1,
                'tag_id'     => 5,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 6,
                'tag_id'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 7,
                'tag_id'     => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 8,
                'tag_id'     => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 9,
                'tag_id'     => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 9,
                'tag_id'     => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 10,
                'tag_id'     => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 10,
                'tag_id'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 10,
                'tag_id'     => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 10,
                'tag_id'     => 4,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'article_id' => 10,
                'tag_id'     => 5,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        ));
    }
}
