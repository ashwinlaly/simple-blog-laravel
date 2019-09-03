<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	array(
        		"name" => "A",
        		"created_at" => date("Y-m-d H:i:s"),
        		"updated_at" => date("Y-m-d H:i:s")
        	),
        	array(
        		"name" => "B",
        		"created_at" => date("Y-m-d H:i:s"),
        		"updated_at" => date("Y-m-d H:i:s")
        	)
        ]);
    }
}
