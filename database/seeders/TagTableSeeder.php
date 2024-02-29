<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tag;
use App\Models\Event;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag :: factory()
        -> count(5)
        -> create()
        -> each(function($tag) {

            $events = Event::inRandomOrder()->limit(rand(1, 100))->get();
            $tag -> events()->attach($events);
            $tag -> save();
        }); 
    }
}
