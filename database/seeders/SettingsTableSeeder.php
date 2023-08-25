<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'bwBaseUrl' => '163.172.233.88:8001',
                'bwUserName' => 'TrustITOneWay',
                'bwPassword' => '1f75lgmf',
                'created_at' => '2020-03-03 21:29:12',
                'updated_at' => '2020-03-03 21:29:12',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}