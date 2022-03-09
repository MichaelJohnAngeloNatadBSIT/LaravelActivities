<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('posts')->insert([
            'caption' => 'This is a caption',
            'username' => 'reisdro22',
            'body-message' => 'this is a post',
        ]);
    }
}
