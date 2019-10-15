<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
        	array(
        		"user_id" => 1,
        		"comments" => "hotel transylvania",
        		"status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
        	),
        	array(
        		"user_id" => 1,
        		"comments" => "Thor 2",
        		"status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
        	),
        	array(
        		"user_id" => 2,
        		"comments" => "Tom And Jerry",
        		"status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
        	),
        	array(
        		"user_id" => 2,
        		"comments" => "Jungle Book",
        		"status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
        	),
        	array(
        		"user_id" => 3,
        		"comments" => "Scooby Doo 2",
        		"status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
        	),
        	array(
        		"user_id" => 3,
        		"comments" => "Iron Man",
        		"status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
        	),
        	array(
        		"user_id" => 4,
        		"comments" => "Star War",
        		"status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
        	),
        	array(
        		"user_id" => 4,
        		"comments" => "Honey I shrunk the Kid",
        		"status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
        	),
        	array(
        		"user_id" => 4,
        		"comments" => "Jurassic Park",
        		"status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
        	),
        	array(
        		"user_id" => 4,
        		"comments" => "Jumanji",
        		"status" => 1,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
        	),
        ]);
    }
}
