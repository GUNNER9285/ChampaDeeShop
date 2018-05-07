<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sales')->delete();
        
        \DB::table('sales')->insert(array (
            0 => 
            array (
                'id' => 1,
                'bill_id' => 1,
                'product_id' => 3,
                'amount' => 2,
                'totalprice' => 258,
                'created_at' => '2018-05-06 22:07:37',
                'updated_at' => '2018-05-06 22:07:37',
            ),
            1 => 
            array (
                'id' => 2,
                'bill_id' => 1,
                'product_id' => 5,
                'amount' => 1,
                'totalprice' => 120,
                'created_at' => '2018-05-06 22:07:38',
                'updated_at' => '2018-05-06 22:07:38',
            ),
            2 => 
            array (
                'id' => 3,
                'bill_id' => 1,
                'product_id' => 6,
                'amount' => 2,
                'totalprice' => 320,
                'created_at' => '2018-05-06 22:07:38',
                'updated_at' => '2018-05-06 22:07:38',
            ),
            3 => 
            array (
                'id' => 6,
                'bill_id' => 3,
                'product_id' => 10,
                'amount' => 1,
                'totalprice' => 150,
                'created_at' => '2018-05-06 22:25:28',
                'updated_at' => '2018-05-06 22:25:28',
            ),
            4 => 
            array (
                'id' => 7,
                'bill_id' => 3,
                'product_id' => 9,
                'amount' => 1,
                'totalprice' => 450,
                'created_at' => '2018-05-06 22:25:28',
                'updated_at' => '2018-05-06 22:25:28',
            ),
            5 => 
            array (
                'id' => 8,
                'bill_id' => 4,
                'product_id' => 13,
                'amount' => 1,
                'totalprice' => 25,
                'created_at' => '2018-05-06 22:41:06',
                'updated_at' => '2018-05-06 22:41:06',
            ),
            6 => 
            array (
                'id' => 9,
                'bill_id' => 4,
                'product_id' => 4,
                'amount' => 1,
                'totalprice' => 49,
                'created_at' => '2018-05-06 22:41:06',
                'updated_at' => '2018-05-06 22:41:06',
            ),
            7 => 
            array (
                'id' => 10,
                'bill_id' => 5,
                'product_id' => 9,
                'amount' => 1,
                'totalprice' => 450,
                'created_at' => '2018-05-07 00:26:53',
                'updated_at' => '2018-05-07 00:26:53',
            ),
            8 => 
            array (
                'id' => 11,
                'bill_id' => 5,
                'product_id' => 12,
                'amount' => 1,
                'totalprice' => 1000,
                'created_at' => '2018-05-07 00:26:53',
                'updated_at' => '2018-05-07 00:26:53',
            ),
            9 => 
            array (
                'id' => 12,
                'bill_id' => 6,
                'product_id' => 13,
                'amount' => 2,
                'totalprice' => 50,
                'created_at' => '2018-05-07 19:54:58',
                'updated_at' => '2018-05-07 19:54:58',
            ),
        ));
        
        
    }
}