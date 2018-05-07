<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bills')->delete();
        
        \DB::table('bills')->insert(array (
            0 => 
            array (
                'id' => 1,
                'status' => 3,
                'amount' => 698,
                'user_id' => 2,
                'imgPath' => '/img/bills/20180506-221012bill.jpg',
                'address' => 'ส่วนของที่อยู่',
                'trackNo' => 'EE123456789XX',
                'created_at' => '2018-05-06 22:07:37',
                'updated_at' => '2018-05-06 22:10:30',
            ),
            1 => 
            array (
                'id' => 3,
                'status' => 3,
                'amount' => 600,
                'user_id' => 3,
                'imgPath' => '/img/bills/20180506-222555bill2.jpg',
                'address' => 'โลกใหม่',
                'trackNo' => 'EE123456789XX',
                'created_at' => '2018-05-06 22:25:28',
                'updated_at' => '2018-05-06 22:36:33',
            ),
            2 => 
            array (
                'id' => 4,
                'status' => 3,
                'amount' => 74,
                'user_id' => 3,
                'imgPath' => '/img/bills/20180506-224630bill3.jpg',
                'address' => 'โลกใหม่',
                'trackNo' => 'EE123456789XX',
                'created_at' => '2018-05-06 22:41:06',
                'updated_at' => '2018-05-07 00:38:08',
            ),
            3 => 
            array (
                'id' => 5,
                'status' => 3,
                'amount' => 1450,
                'user_id' => 2,
                'imgPath' => '/img/bills/20180507-002831bill3.jpg',
                'address' => 'testAddress 01 02 03 04 05 06 07 08 09',
                'trackNo' => 'EE12345678XYZ',
                'created_at' => '2018-05-07 00:26:53',
                'updated_at' => '2018-05-07 19:53:42',
            ),
            4 => 
            array (
                'id' => 6,
                'status' => 1,
                'amount' => 50,
                'user_id' => 5,
                'imgPath' => '/img/bills/20180507-195532bill3.jpg',
                'address' => 'Bangkok Bangbon',
                'trackNo' => NULL,
                'created_at' => '2018-05-07 19:54:58',
                'updated_at' => '2018-05-07 19:55:32',
            ),
        ));
        
        
    }
}