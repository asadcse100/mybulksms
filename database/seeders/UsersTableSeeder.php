<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Asad',
                'email' => 'ronydiu1@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$a42Trl53ZKzOI/Il9hqKjev3OZwhfiNxIK3RyN6uLw8NgxMgo/Bpi',
                'remember_token' => NULL,
                'created_at' => '2020-03-03 09:54:23',
                'updated_at' => '2020-03-03 09:54:23',
            ),
        ));
        
        
    }
}