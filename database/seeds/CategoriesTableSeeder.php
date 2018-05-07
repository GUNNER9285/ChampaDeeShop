<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'กระบอกน้ำ',
                'created_at' => '2018-05-04 17:18:47',
                'updated_at' => '2018-05-04 17:18:47',
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'แก้ว',
                'created_at' => '2018-05-04 17:18:55',
                'updated_at' => '2018-05-04 17:18:55',
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'เสื้อ',
                'created_at' => '2018-05-04 17:19:01',
                'updated_at' => '2018-05-04 17:19:01',
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'กล้วยตาก',
                'created_at' => '2018-05-05 23:07:55',
                'updated_at' => '2018-05-05 23:07:55',
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 'กระเป๋า',
                'created_at' => '2018-05-07 19:20:43',
                'updated_at' => '2018-05-07 19:20:43',
            ),
        ));
        
        
    }
}