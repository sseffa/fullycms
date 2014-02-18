<?php

class MenusTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('menus')->truncate();

        DB::table('menus')->insert(array(
            array(
                'title'     => 'Home',
                'url'       => '/',
                'order'     => 1,
                'parent_id' => 0,
                'type'      => 'module',
                'option'    => 'home',
                'is_published' => true,
                'created_at'=>new Datetime,
                'updated_at'=>new Datetime
            ),
            array(
                'title'     => 'News',
                'url'       => '/news',
                'order'     => 2,
                'parent_id' => 0,
                'type'      => 'module',
                'option'    => 'news',
                'is_published' => true,
                'created_at'=>new Datetime,
                'updated_at'=>new Datetime
            ),
            array(
                'title'     => 'Blog',
                'url'       => '/article',
                'order'     => 3,
                'parent_id' => 0,
                'type'      => 'module',
                'option'    => 'blog',
                'is_published' => true,
                'created_at'=>new Datetime,
                'updated_at'=>new Datetime
            ),
            array(
                'title'     => 'Contact',
                'url'       => '/contact',
                'order'     => 4,
                'parent_id' => 0,
                'type'      => 'module',
                'option'    => 'contact',
                'is_published' => true,
                'created_at'=>new Datetime,
                'updated_at'=>new Datetime
            )
        ));
    }
}
