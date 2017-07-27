<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nature = new App\Section;
        $nature->title = 'nature';
        $nature->description = 'Beautiful nature views from worldwide';
        $nature->save();

        $animals = new App\Section;
        $animals->title = 'animals';
        $animals->description = 'Enjoy works with animals of talanted masters from worldwide';
        $animals->save();

        $city = new App\Section;
        $city->title = 'city';
        $city->description = 'Great city`s photos';
        $city->save();

        $cars = new App\Section;
        $cars->title = 'cars';
        $cars->description = 'Men`s weakness';
        $cars->save();

        $girls = new App\Section;
        $girls->title = 'girls';
        $girls->description = 'Men`s weakness';
        $girls->save();

        $beach = new App\Section;
        $beach->title = 'beach';
        $beach->description = 'Beautiful summer landscapes';
        $beach->save();

        $extreme = new App\Section;
        $extreme->title = 'extreme';
        $extreme->description = 'Hair looks swell';
        $extreme->save();
    }
}
