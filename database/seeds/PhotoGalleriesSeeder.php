<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PhotoGalleriesTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('photo_galleries')->truncate();

        $article = array(
            'title'        => 'Fotoğraf Galerisi',
            'slug'         => Str::slug('Fotoğraf Galerisi'),
            'content'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In scelerisque eget tellus et tempor. Nulla vel lectus aliquam, tempus massa ornare, fermentum tellus. Maecenas in enim sed libero ultrices tincidunt. Ut turpis ante, facilisis a fringilla rhoncus, ornare quis ipsum. Nullam erat ligula, imperdiet vel neque ac, facilisis tempor est. Morbi nec volutpat turpis. Quisque blandit justo ut diam ultrices, id lobortis nunc molestie. Donec a leo at enim pretium vehicula eu non lorem. Cras consequat, arcu nec facilisis hendrerit, metus lacus malesuada nibh, a consequat nulla est et est. In cursus, lorem eu vehicula rhoncus, justo quam bibendum eros, ut iaculis nisi nisl at velit. Aliquam massa massa, sodales et nunc vitae, ullamcorper egestas est. Mauris iaculis convallis libero, a scelerisque dolor ornare ut. Pellentesque blandit in eros ut interdum. Nulla luctus condimentum dignissim. Pellentesque nec consectetur erat, accumsan cursus urna.',
            'created_at'   => new DateTime,
            'updated_at'   => new DateTime,
            'is_published' => true,
            'lang'         => 'tr',);

        DB::table('photo_galleries')->insert($article);
    }
}
