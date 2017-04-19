<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tag::create([

            'name' => '人世间',
            'description' => '世间事，人世间。'
        ]);

        $tag = Tag::create([

            'name' => '技术',
            'description' => 'technology'
        ]);

        Tag::create([
            'name' => 'Laravel',
            'description' => 'laravel technology',
            'fid' => $tag->id
        ]);

    }
}
