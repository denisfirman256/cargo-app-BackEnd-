<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'id' => Uuid::uuid4()->getHex(),
        	'id_office' => 1,
        	'photo' => "photo.jpg",
        	'first_name' => "ihsan",
        	'last_name' => "karunia",
        	'no_telp' => "085862120205",
        	'email' => "ihsan@gmail.com",
        	'level' => "owner",
        	'status' => "online",
        	'password' => bcrypt("admin123")
        ]);
    }
}
