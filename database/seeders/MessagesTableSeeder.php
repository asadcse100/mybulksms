<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('messages')->delete();
        
        \DB::table('messages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'number_id' => NULL,
                'messagesequence' => 100,
                'messagerotation' => 50,
                'messagebody' => 'Test Message',
                'sms_hit' => 1,
                'created_at' => '2020-03-03 14:52:08',
                'updated_at' => '2020-03-03 22:33:28',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'number_id' => NULL,
                'messagesequence' => NULL,
                'messagerotation' => 50,
                'messagebody' => 'Test Message 2',
                'sms_hit' => NULL,
                'created_at' => '2020-03-04 12:41:03',
                'updated_at' => '2020-03-04 12:41:03',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'number_id' => NULL,
                'messagesequence' => NULL,
                'messagerotation' => 50,
                'messagebody' => 'Test Message 3',
                'sms_hit' => NULL,
                'created_at' => '2020-03-04 12:41:38',
                'updated_at' => '2020-03-04 12:41:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}