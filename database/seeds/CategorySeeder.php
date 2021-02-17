<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'name'=>'Beach',
            ],
            [
                'id'=>'2',
                'name'=>'Mountain',
            ],
        ];
        foreach ($data as $d) {
            $new=new Category();
            $new->id=$d['id'];
            $new->name=$d['name'];
            $new->save();
        }
    }
}
