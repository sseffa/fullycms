<?php

class CategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('categories')->truncate();

        DB::table('categories')->insert(array(
            array(
                'title' => 'PHP'
            ),
            array(
                'title' => 'SQL'
            )
        ));
    }
}
