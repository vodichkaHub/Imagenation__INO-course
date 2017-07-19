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
        $nature->name = 'nature';
        $nature->description = 'Beautiful nature views from worldwide';
        $nature->save();

        $animals = new App\Section;
        $animals->name = 'animals';
        $animals->description = 'Enjoy works with animals of talanted masters from worldwide';
        $animals->save();

        $city = new App\Section;
        $city->name = 'city';
        $city->description = 'Great city`s photos';
        $city->save();

        $cars = new App\Section;
        $cars->name = 'cars';
        $cars->description = 'Men`s weakness';
        $cars->save();

        $girls = new App\Section;
        $girls->name = 'girls';
        $girls->description = 'Men`s weakness';
        $girls->save();

        $beach = new App\Section;
        $beach->name = 'beach';
        $beach->description = 'Beautiful summer landscapes';
        $beach->save();

        $extreme = new App\Section;
        $extreme->name = 'extreme';
        $extreme->description = 'Hair looks swell';
        $extreme->save();
    }
}
