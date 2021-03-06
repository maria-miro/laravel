<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\Http\Models\Article::class, 20)->create()->each(function($article) {
        			
			$commentsCount = mt_rand(0,10);
			for ($i = 0; $i <= $commentsCount; $i++) {
				$article->comments()->save(factory(App\Http\Models\Comment::class)->make());
			}
			
			$tagsCount = mt_rand(0,5);
			$tags = [];
			while (count($tags) < $tagsCount) {
				$tag = mt_rand(1,5);
				if(!in_array($tag, $tags)){
					$tags[] = $tag;
				}	
			}
 			$article->tags()->attach($tags);        			
    	});
    }
}
