<?php

use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder {

    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run() {

        DB::table('faqs')->truncate();

        DB::table('faqs')->insert(array(
            array(
                'question'   => 'Lorem ipsum dolor',
                'answer'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'order'      => 1,
                'lang'       => 'tr',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'question'   => 'Maecenas tincidunt auctor iaculis. Duis sed suscipit arcu.',
                'answer'     => 'Maecenas tincidunt auctor iaculis. Duis sed suscipit arcu. Cras iaculis felis eu tincidunt adipiscing.',
                'order'      => 1,
                'lang'       => 'tr',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'question'   => 'Curabitur sagittis ante sed quam tristique interdum.',
                'answer'     => 'Sed adipiscing arcu vulputate, ullamcorper sem ac, vulputate mauris. Fusce sit amet blandit lacus. ',
                'order'      => 1,
                'lang'       => 'tr',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'question'   => 'Suspendisse sit amet interdum neque.',
                'answer'     => 'Cras sed nisl a lectus venenatis pulvinar. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
                'order'      => 1,
                'lang'       => 'tr',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'question'   => 'Maecenas rutrum congue orci, a vestibulum enim varius sed.',
                'answer'     => 'Maecenas rutrum congue orci, a vestibulum enim varius sed. Donec vestibulum pellentesque nunc, eget condimentum tellus iaculis sit amet.',
                'order'      => 1,
                'lang'       => 'tr',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'question'   => 'Lorem ipsum',
                'answer'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'order'      => 1,
                'lang'       => 'tr',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'question'   => 'Donec condimentum lacus a lorem convallis, in venenatis arcu tincidunt. ',
                'answer'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'order'      => 1,
                'lang'       => 'tr',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'question'   => 'Duis quam ante, fringilla in metus quis, ornare scelerisque felis. ',
                'answer'     => 'Praesent aliquet vel mauris ac egestas. Vivamus eu semper lectus, et facilisis mi. Cras at augue sem. Curabitur sagittis ante sed quam tristique interdum.',
                'order'      => 1,
                'lang'       => 'tr',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'question'   => 'Phasellus massa felis, ullamcorper in ullamcorper sed, consectetur consequat nulla.',
                'answer'     => 'Vivamus convallis erat ac suscipit aliquet. Maecenas congue ut felis vitae gravida. Nam scelerisque suscipit neque, at elementum lorem interdum sed. Maecenas ac interdum metus, eget mattis diam.',
                'order'      => 1,
                'lang'       => 'tr',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'question'   => 'Donec vitae elit sed ante sodales ultricies sed quis ipsum.',
                'answer'     => 'Nam dui quam, interdum non nisi eu, consectetur accumsan urna. Integer quis enim tincidunt, dictum nisi feugiat, placerat ante. Quisque a urna id odio mollis mattis ac at ante.',
                'order'      => 1,
                'lang'       => 'tr',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'question'   => 'Donec vitae elit sed ante sodales ultricies sed quis ipsum.',
                'answer'     => 'Nam dui quam, interdum non nisi eu, consectetur accumsan urna. Integer quis enim tincidunt, dictum nisi feugiat, placerat ante. Quisque a urna id odio mollis mattis ac at ante.',
                'order'      => 1,
                'lang'       => 'en',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        ));
    }
}
