<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' =>  'cotton'
            ],
            [
                'name' =>  'silk'
            ],
            [
                'name' =>  'Velvet'
            ],
            [
                'name' =>  'denim'
            ],
            [
                'name' =>   'fur'
            ],
          
        ];


      DB::table('categories')->insert($categories);
    }
}
