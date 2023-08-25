<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'USA',
                'status' => 3,
                'created_at' => '2020-02-29 10:34:09',
                'updated_at' => '2020-02-29 10:34:09',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Canada',
                'status' => 3,
                'created_at' => '2020-02-29 10:57:08',
                'updated_at' => '2020-02-29 10:57:08',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}