<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = factory(App\User::class, 1)->create()->each(function ($u) {
            $u->articles()->save(factory(App\Article::class)->make());
            $u->articles()->save(factory(App\Article::class)->make());
            $u->articles()->save(factory(App\Article::class)->make());
        });
    }
}
