<?php

use Illuminate\Database\Seeder;
use App\User;

class fill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->id = 1;
        $admin->name = 'Vadim';
        $admin->country = 'Russia';
        $admin->login = 'admin';
        $admin->email = 'vadinyaev@inbox.ru';
        $admin->password = bcrypt('admin');
        $admin->save();

        $Alexey = new User;
        $admin->id = 2;
        $Alexey->name = 'Alexey Titurov';
        $Alexey->country = 'Russia';
        $Alexey->login = 'titur';
        $Alexey->email = 'altit@gmail.com';
        $Alexey->avatar = '2.jpeg';
        $Alexey->password = bcrypt('titur1');
        $Alexey->save();

        $Josh = new User;
        $admin->id = 3;
        $Josh->name = 'Josh Pitsburg';
        $Josh->country = 'Canada';
        $Josh->login = 'jeshar';
        $Josh->avatar = '3.jpeg';
        $Josh->email = 'pitsburg@outlook.com';
        $Josh->password = bcrypt('pitsburg');
        $Josh->save();


    }
}
