<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'id'=>'1',
                'user_id'=>'1',
                'category_id'=>'1',
                'title'=>'Miami Beach',
                'description'=>'It\'s a beach located in Miami, Florida',
                'image'=>'miami-beach.jpg',

            ],
            [
                'id'=>'2',
                'user_id'=>'2',
                'category_id'=>'2',
                'title'=>'Mount Rushmore',
                'description'=>'It\'s a mountain that has the carving of the previous president from the United States of America',
                'image'=>'mount-rushmore.jpg',

            ],
        ];
        foreach ($data as $d) {
            $new=new Article();
            $new->id=$d['id'];
            $new->user_id=$d['user_id'];
            $new->category_id=$d['category_id'];
            $new->title=$d['title'];
            $new->description=$d['description'];
            $new->image=$d['image'];
            $new->save();
        }
    }
}
