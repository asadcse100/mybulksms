<?php

use Illuminate\Database\Seeder;

class MasterNumbersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_numbers')->delete();
        
        \DB::table('master_numbers')->insert(array (            
            0 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'message_id' => NULL,
                'country' => 1,
                'number' => '12132823664',
                'messageLimit' => NULL,
                'messageRotation' => 100,
                'sms_hit' => NULL,
                'created_at' => '2020-03-04 12:35:13',
                'updated_at' => '2020-03-04 12:35:13',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'message_id' => NULL,
                'country' => 1,
                'number' => '12132823433',
                'messageLimit' => NULL,
                'messageRotation' => 100,
                'sms_hit' => NULL,
                'created_at' => '2020-03-04 12:35:26',
                'updated_at' => '2020-03-04 12:35:26',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'message_id' => NULL,
                'country' => 1,
                'number' => '12132823565',
                'messageLimit' => NULL,
                'messageRotation' => 100,
                'sms_hit' => NULL,
                'created_at' => '2020-03-04 12:35:37',
                'updated_at' => '2020-03-04 12:35:37',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'message_id' => NULL,
                'country' => 1,
                'number' => '12132823686',
                'messageLimit' => NULL,
                'messageRotation' => 100,
                'sms_hit' => NULL,
                'created_at' => '2020-03-04 12:35:50',
                'updated_at' => '2020-03-04 12:35:50',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'message_id' => NULL,
                'country' => 1,
                'number' => '12132823334',
                'messageLimit' => NULL,
                'messageRotation' => 100,
                'sms_hit' => NULL,
                'created_at' => '2020-03-04 12:36:02',
                'updated_at' => '2020-03-04 12:36:02',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}