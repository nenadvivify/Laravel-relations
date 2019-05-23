<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Tag::class, 10)->create();
    }
}
