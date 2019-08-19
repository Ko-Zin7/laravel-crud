<?php

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DatabaseSeeder::class);
        DB::table('posts')->insert([
          'title' => Str::random(10),
          'body'=>Str::random(10).'@email.com',
          'category_id' =>Int::random(10),

        ]);

        // $faker=Faker::create();
        // for ($i=0; $i <10 ; $i++) {
        //   // code...
        //   $post=new App\Post();
        //   $post->title=$faker->sentence;
        //   $post->body=$faker->paragraph;
        //   $post->category_id=$faker->rand(1,3);
        //   $post->save();
        }

    }
}
