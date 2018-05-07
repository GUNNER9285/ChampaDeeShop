<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user')->delete();
        
        \DB::table('user')->insert(array (
            0 => 
            array (
                'id' => 1,
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'aa15cdc864379cbf3901a4f9419645b4',
                'address' => 'Admin',
                'created_at' => '2018-05-06 21:34:45',
                'updated_at' => '2018-05-06 21:34:45',
            ),
            1 => 
            array (
                'id' => 2,
                'firstname' => 'ส่วนของชื่อจริง',
                'lastname' => 'ส่วนของนามสกุล',
                'username' => 'ส่วนของชื่อผู้ใช้งาน',
                'email' => 'email@gmail.com',
                'password' => '25f9e794323b453885f5181f1b624d0b',
                'address' => 'ส่วนของที่อยู่',
                'created_at' => '2018-05-06 21:45:51',
                'updated_at' => '2018-05-06 21:45:51',
            ),
            2 => 
            array (
                'id' => 3,
                'firstname' => 'กันเอ็ม',
                'lastname' => 'ดรีมนนท์',
                'username' => 'กันเอ็มดรีมนนท์',
                'email' => 'gmdn@hotmail.com',
                'password' => '25f9e794323b453885f5181f1b624d0b',
                'address' => 'โลกใหม่',
                'created_at' => '2018-05-06 21:54:05',
                'updated_at' => '2018-05-06 21:54:05',
            ),
            3 => 
            array (
                'id' => 4,
                'firstname' => 'ชื่อ',
                'lastname' => 'นามสกุล',
                'username' => 'ชื่อผู้ใช้งาน',
                'email' => 'ggwp@hotmail.com',
                'password' => '25f9e794323b453885f5181f1b624d0b',
                'address' => 'ตำบล สนามจันทร์ อำเภอเมืองนครปฐม นครปฐม 73000',
                'created_at' => '2018-05-07 18:53:32',
                'updated_at' => '2018-05-07 18:53:32',
            ),
            4 => 
            array (
                'id' => 5,
                'firstname' => 'Witthawit',
                'lastname' => 'Kultummayotin',
                'username' => 'M_KUNNNN',
                'email' => 'kultummayotin_w@silpakorn.edu',
                'password' => 'ba60ac1de1657380e6d039a1ed0a5df0',
                'address' => 'Bangkok Bangbon',
                'created_at' => '2018-05-07 19:29:12',
                'updated_at' => '2018-05-07 19:29:12',
            ),
        ));
        
        
    }
}