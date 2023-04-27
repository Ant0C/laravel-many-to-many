<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Laravel','Bootstrap','Vue','Vite','PHP'];

        foreach($technologies as $item_name){
            $item = new Technology();
            $item->name = $item_name;
            $item->slug = Str::slug($item_name);
            $item->save();

        }
    }
}
