<?php

use Illuminate\Database\Seeder;

class TagPostPivotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $postIds = \App\Models\Post::pluck('id');
        $tagIds = \App\Models\Tag::pluck('id');

        for ($i=0; $i<20; $i++) {
            DB::table('tag_post')->insert([
                'tag_id' => random_int(1, count($tagIds)),
                'post_id' => random_int(1, count($postIds))
            ]);
        }
    }
}
