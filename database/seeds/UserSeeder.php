<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name'=>'orlando',
                'email'=>'orlando@gmail.com',
                'phone'=>'123',
                'role'=>'admin',
                'password'=>bcrypt('orl123'),

            ],
            [
                'id'=>'2',
                'name'=>'tes',
                'email'=>'tes@gmail.com',
                'phone'=>'1234',
                'role'=>'user',
                'password'=>bcrypt('tes123'),

            ],
        ];
        foreach ($data as $d) {
            $new=new User();
            $new->id=$d['id'];
            $new->name=$d['name'];
            $new->email=$d['email'];
            $new->phone=$d['phone'];
            $new->role=$d['role'];
            $new->password=$d['password'];
            $new->save();
        }
    }
}
