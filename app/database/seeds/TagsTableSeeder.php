<?php

class TagsTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {


        DB::table('tags')->truncate();

        DB::table('tags')->insert(array(
            array(
                'name'       => 'PHP',
                'slug'       => Str::slug('PHP'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'Laravel',
                'slug'       => Str::slug('Laravel'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'Mysql',
                'slug'       => Str::slug('Mysql'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'Oracle',
                'slug'       => Str::slug('Oracle'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'MongoDB',
                'slug'       => Str::slug('MongoDB'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'Redis',
                'slug'       => Str::slug('Redis'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'Memcache',
                'slug'       => Str::slug('Memcache'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'APC',
                'slug'       => Str::slug('APC'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'JSON',
                'slug'       => Str::slug('JSON'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'XML',
                'slug'       => Str::slug('XML'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'Ajax',
                'slug'       => Str::slug('Ajax'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'HTML',
                'slug'       => Str::slug('HTML'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'CSS',
                'slug'       => Str::slug('CSS'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name'       => 'Javascript',
                'slug'       => Str::slug('Javascript'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        ));
    }
}
