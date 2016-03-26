<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     */
    public function run()
    {
        DB::table('articles')->truncate();

        DB::table('articles')->insert(array(
            array(
                'title' => 'Cras vitae vulputate ipsum',
                'slug' => Str::slug('Blog Post'),
                'content' => 'This is the first blog post.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet facilisis ipsum. Aenean placerat orci ut ligula hendrerit egestas. Curabitur non porttitor elit. Ut scelerisque est ipsum, non molestie quam consequat accumsan. Suspendisse luctus metus ut mi consectetur, mollis convallis tortor posuere. Duis vestibulum erat at lacus ultrices, ut aliquam turpis pulvinar. Cras lobortis dui nisi, sed varius massa pulvinar sit amet. Cras vitae vulputate ipsum. Ut varius lectus quam, id ultrices nisl tempor mattis. Etiam sit amet imperdiet ipsum.

Sed porta velit vitae quam bibendum, ut convallis neque pharetra. Sed tempus velit tristique iaculis blandit. Phasellus et egestas lorem. Duis elementum turpis sollicitudin est consequat, vel viverra est tristique. Pellentesque lacinia posuere ante. Duis et consequat justo. Sed fermentum velit elit. Nulla suscipit vulputate ipsum, mattis tincidunt orci luctus eget. Nam in volutpat turpis. Cras vitae sapien urna. Pellentesque vestibulum adipiscing malesuada. Donec ornare sollicitudin libero ut hendrerit. ',
                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post')),
                'meta_description' => strip_tags('Blog Post'),
                'category_id' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Donec molestie',
                'slug' => Str::slug('Blog Post 2'),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean faucibus in tellus vel consectetur. Cras a quam facilisis, porta dui id, ultrices dui. Donec molestie, tortor eu condimentum tempus, massa nisl auctor dui, sodales tempus diam leo sed magna. Aliquam eu neque non nibh congue euismod. Vestibulum at malesuada nibh, sit amet imperdiet erat. Vivamus fringilla augue nunc, id porttitor lectus iaculis vitae. Maecenas posuere porttitor arcu. Nullam bibendum congue diam sed interdum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin laoreet aliquam gravida. Etiam sit amet orci sed augue lacinia vulputate. Phasellus mollis pretium orci, mollis ultrices purus accumsan sed. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam ac sollicitudin erat, sit amet cursus elit. Duis nec lacinia eros, sit amet convallis erat. ',
                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 2')),
                'meta_description' => strip_tags('Blog Post 2'),
                'category_id' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Donec eu vehicula arcu',
                'slug' => Str::slug('Blog Post 3'),
                'content' => 'Aenean varius lectus commodo, sollicitudin nulla eget, malesuada velit. Maecenas neque mi, eleifend non urna non, pellentesque tincidunt orci. Aliquam elit libero, feugiat a posuere id, aliquet non dui. Nam ultrices nisl elit, a auctor mauris malesuada sit amet. Etiam malesuada scelerisque nisl, eu mollis leo condimentum sit amet. Nam varius aliquam malesuada. Curabitur scelerisque facilisis dolor, vitae viverra metus mollis ut. Nunc non neque ut ante pretium adipiscing sit amet sed leo. Donec eu vehicula arcu, non blandit quam. ',
                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 3')),
                'meta_description' => strip_tags('Blog Post 3'),
                'category_id' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Pellentesque molestie',
                'slug' => Str::slug('Blog Post 4'),
                'content' => 'Curabitur sit amet rutrum lectus. Donec in massa adipiscing, facilisis mi quis, faucibus quam. In adipiscing, nisl vitae varius sagittis, augue nulla pulvinar diam, at viverra est est vel dui. Ut at velit sem. Vivamus rutrum iaculis leo, et vehicula velit aliquam vitae. Pellentesque molestie, ipsum elementum eleifend viverra, felis neque sagittis lorem, sed vestibulum erat dolor iaculis erat. Curabitur porta, arcu vitae luctus sagittis, sapien sapien pretium lorem, id accumsan quam turpis ornare ligula. Curabitur porttitor et quam ut facilisis. In hac habitasse platea dictumst. Nulla sed rhoncus nulla, vitae iaculis eros. Vivamus non enim sit amet velit pharetra luctus. Curabitur sodales lectus vestibulum, hendrerit justo sit amet, ullamcorper diam. Donec eu velit vitae justo convallis convallis. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 4')),
                'meta_description' => strip_tags('Blog Post 4'),
                'category_id' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Aliquam elit libero',
                'slug' => Str::slug('Blog Post 5'),
                'content' => 'Aenean varius lectus commodo, sollicitudin nulla eget, malesuada velit. Maecenas neque mi, eleifend non urna non, pellentesque tincidunt orci. Aliquam elit libero, feugiat a posuere id, aliquet non dui. Nam ultrices nisl elit, a auctor mauris malesuada sit amet. Etiam malesuada scelerisque nisl, eu mollis leo condimentum sit amet. Nam varius aliquam malesuada. Curabitur scelerisque facilisis dolor, vitae viverra metus mollis ut. Nunc non neque ut ante pretium adipiscing sit amet sed leo. Donec eu vehicula arcu, non blandit quam. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 5')),
                'meta_description' => strip_tags('Blog Post 5'),
                'category_id' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Fusce dictum',
                'slug' => Str::slug('Blog Post 6'),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce risus massa, facilisis ac interdum quis, hendrerit ac lacus. Integer tempor lacinia justo eget accumsan. Fusce vitae lorem vulputate lectus gravida euismod. Donec vitae quam eu magna tristique ultrices id quis diam. Fusce dictum, nisi id vehicula condimentum, dui ipsum varius nisl, eget euismod tortor magna eget odio. Sed nec diam semper, fermentum lectus in, congue purus. Sed congue viverra dolor id cursus. Cras eu placerat eros, ac viverra leo. Proin eleifend leo tortor, quis molestie diam egestas at. Nullam suscipit adipiscing purus, nec sollicitudin metus interdum quis. Pellentesque dapibus vitae felis non lobortis. Suspendisse id mollis justo. Duis semper rutrum orci id tristique. Cras ultrices laoreet cursus. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 6')),
                'meta_description' => strip_tags('Blog Post 6'),
                'category_id' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Pellentesque molestie',
                'slug' => Str::slug('Blog Post 7'),
                'content' => 'Curabitur sit amet rutrum lectus. Donec in massa adipiscing, facilisis mi quis, faucibus quam. In adipiscing, nisl vitae varius sagittis, augue nulla pulvinar diam, at viverra est est vel dui. Ut at velit sem. Vivamus rutrum iaculis leo, et vehicula velit aliquam vitae. Pellentesque molestie, ipsum elementum eleifend viverra, felis neque sagittis lorem, sed vestibulum erat dolor iaculis erat. Curabitur porta, arcu vitae luctus sagittis, sapien sapien pretium lorem, id accumsan quam turpis ornare ligula. Curabitur porttitor et quam ut facilisis. In hac habitasse platea dictumst. Nulla sed rhoncus nulla, vitae iaculis eros. Vivamus non enim sit amet velit pharetra luctus. Curabitur sodales lectus vestibulum, hendrerit justo sit amet, ullamcorper diam. Donec eu velit vitae justo convallis convallis. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 7')),
                'meta_description' => strip_tags('Blog Post 7'),
                'category_id' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Nullam suscipit adipiscing purus',
                'slug' => Str::slug('Blog Post 8'),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce risus massa, facilisis ac interdum quis, hendrerit ac lacus. Integer tempor lacinia justo eget accumsan. Fusce vitae lorem vulputate lectus gravida euismod. Donec vitae quam eu magna tristique ultrices id quis diam. Fusce dictum, nisi id vehicula condimentum, dui ipsum varius nisl, eget euismod tortor magna eget odio. Sed nec diam semper, fermentum lectus in, congue purus. Sed congue viverra dolor id cursus. Cras eu placerat eros, ac viverra leo. Proin eleifend leo tortor, quis molestie diam egestas at. Nullam suscipit adipiscing purus, nec sollicitudin metus interdum quis. Pellentesque dapibus vitae felis non lobortis. Suspendisse id mollis justo. Duis semper rutrum orci id tristique. Cras ultrices laoreet cursus. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 8')),
                'meta_description' => strip_tags('Blog Post 8'),
                'category_id' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Mauris risus nisl',
                'slug' => Str::slug('Blog Post 9'),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in odio in augue tincidunt viverra. Cras sit amet risus eget augue fermentum consequat et id libero. Donec a laoreet orci. In mi ligula, ornare sit amet nisi et, laoreet tincidunt elit. Curabitur id dui urna. Cras metus tortor, egestas nec magna ornare, scelerisque laoreet ante. Nam aliquam felis velit, a ornare ante porta quis. Proin nisi enim, lobortis at sapien sit amet, lacinia dictum libero. Donec ac pulvinar ante. Mauris risus nisl, pellentesque sed nunc eget, aliquam volutpat dolor. Fusce mollis id purus quis malesuada. Nullam gravida faucibus faucibus. Curabitur ut neque odio. Aenean porta fringilla placerat. Nullam consequat sagittis orci sed tincidunt. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 9')),
                'meta_description' => strip_tags('Blog Post 9'),
                'category_id' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Nam iaculis leo risus',
                'slug' => Str::slug('Blog Post 10'),
                'content' => 'In varius volutpat accumsan. Nam rhoncus massa ipsum. In ante erat, vestibulum non neque sit amet, sagittis ultricies risus. Nam iaculis leo risus, at malesuada arcu dictum quis. Nulla blandit mi turpis, nec vestibulum diam suscipit egestas. Aliquam ut mollis nulla. Sed scelerisque, magna vel scelerisque porta, mauris sem varius massa, eget sagittis dui eros id metus. Curabitur imperdiet est tellus, sed rutrum lacus viverra ut. Donec gravida adipiscing tellus sit amet posuere. Duis vel auctor arcu, nec ornare purus. Nulla vehicula, eros quis imperdiet laoreet, libero ipsum porttitor dui, consequat fringilla nulla lectus non elit. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 10')),
                'meta_description' => strip_tags('Blog Post 10'),
                'category_id' => 1,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ), array(
                'title' => 'Vestibulum quis dui in tellus commodo eleifend',
                'slug' => Str::slug('Blog Post 11'),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pulvinar eu orci id pretium. Morbi blandit lorem non orci commodo ullamcorper. Morbi rhoncus nisl non ligula posuere malesuada. In sit amet eros feugiat, condimentum urna vel, ornare tortor. Donec quis tellus eleifend, vulputate augue sed, molestie ipsum. Aenean sapien lectus, laoreet vitae justo at, posuere faucibus justo. Nam auctor, magna at pretium luctus, nisi mi gravida arcu, suscipit ultrices velit nisi vel libero. Phasellus eget euismod tortor. Aliquam rhoncus felis sed magna scelerisque fringilla. Vestibulum at congue enim. Integer rutrum aliquam velit in dictum. Sed sed sollicitudin nisi, et scelerisque odio. Vestibulum quis dui in tellus commodo eleifend. Suspendisse et quam purus. Donec at massa feugiat leo commodo commodo. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 11')),
                'meta_description' => strip_tags('Blog Post 11'),
                'category_id' => 2,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => ' Sed scelerisque',
                'slug' => Str::slug('Blog Post 12'),
                'content' => 'In varius volutpat accumsan. Nam rhoncus massa ipsum. In ante erat, vestibulum non neque sit amet, sagittis ultricies risus. Nam iaculis leo risus, at malesuada arcu dictum quis. Nulla blandit mi turpis, nec vestibulum diam suscipit egestas. Aliquam ut mollis nulla. Sed scelerisque, magna vel scelerisque porta, mauris sem varius massa, eget sagittis dui eros id metus. Curabitur imperdiet est tellus, sed rutrum lacus viverra ut. Donec gravida adipiscing tellus sit amet posuere. Duis vel auctor arcu, nec ornare purus. Nulla vehicula, eros quis imperdiet laoreet, libero ipsum porttitor dui, consequat fringilla nulla lectus non elit. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 12')),
                'meta_description' => strip_tags('Blog Post 12'),
                'category_id' => 2,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Aenean sapien lectus',
                'slug' => Str::slug('Blog Post 13'),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pulvinar eu orci id pretium. Morbi blandit lorem non orci commodo ullamcorper. Morbi rhoncus nisl non ligula posuere malesuada. In sit amet eros feugiat, condimentum urna vel, ornare tortor. Donec quis tellus eleifend, vulputate augue sed, molestie ipsum. Aenean sapien lectus, laoreet vitae justo at, posuere faucibus justo. Nam auctor, magna at pretium luctus, nisi mi gravida arcu, suscipit ultrices velit nisi vel libero. Phasellus eget euismod tortor. Aliquam rhoncus felis sed magna scelerisque fringilla. Vestibulum at congue enim. Integer rutrum aliquam velit in dictum. Sed sed sollicitudin nisi, et scelerisque odio. Vestibulum quis dui in tellus commodo eleifend. Suspendisse et quam purus. Donec at massa feugiat leo commodo commodo. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 13')),
                'meta_description' => strip_tags('Blog Post 13'),
                'category_id' => 3,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Phasellus eget euismod tortor',
                'slug' => Str::slug('Blog Post 14'),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pulvinar eu orci id pretium. Morbi blandit lorem non orci commodo ullamcorper. Morbi rhoncus nisl non ligula posuere malesuada. In sit amet eros feugiat, condimentum urna vel, ornare tortor. Donec quis tellus eleifend, vulputate augue sed, molestie ipsum. Aenean sapien lectus, laoreet vitae justo at, posuere faucibus justo. Nam auctor, magna at pretium luctus, nisi mi gravida arcu, suscipit ultrices velit nisi vel libero. Phasellus eget euismod tortor. Aliquam rhoncus felis sed magna scelerisque fringilla. Vestibulum at congue enim. Integer rutrum aliquam velit in dictum. Sed sed sollicitudin nisi, et scelerisque odio. Vestibulum quis dui in tellus commodo eleifend. Suspendisse et quam purus. Donec at massa feugiat leo commodo commodo. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 14')),
                'meta_description' => strip_tags('Blog Post 14'),
                'category_id' => 3,
                'lang' => 'tr',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array(
                'title' => 'Vestibulum at congue enim',
                'slug' => Str::slug('Blog Post 14'),
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pulvinar eu orci id pretium. Morbi blandit lorem non orci commodo ullamcorper. Morbi rhoncus nisl non ligula posuere malesuada. In sit amet eros feugiat, condimentum urna vel, ornare tortor. Donec quis tellus eleifend, vulputate augue sed, molestie ipsum. Aenean sapien lectus, laoreet vitae justo at, posuere faucibus justo. Nam auctor, magna at pretium luctus, nisi mi gravida arcu, suscipit ultrices velit nisi vel libero. Phasellus eget euismod tortor. Aliquam rhoncus felis sed magna scelerisque fringilla. Vestibulum at congue enim. Integer rutrum aliquam velit in dictum. Sed sed sollicitudin nisi, et scelerisque odio. Vestibulum quis dui in tellus commodo eleifend. Suspendisse et quam purus. Donec at massa feugiat leo commodo commodo. ',

                'meta_keywords' => str_replace(' ', ', ', strtolower('Blog Post 14')),
                'meta_description' => strip_tags('Blog Post 14'),
                'category_id' => 5,
                'lang' => 'en',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
        ));
    }
}
