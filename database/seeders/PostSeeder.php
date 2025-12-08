<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->select('id', 'name')->get();

        foreach ($users as $user) {
            DB::table('posts')->insert([
                'userID'     => $user->id,
                'userName'   => $user->name,
                'title'      => 'Demo bài viết của ' . $user->name,
                'content'    => 'Nội dung demo cho bài viết của ' . $user->name,
                'level'      => ['dễ', 'trung bình', 'khó'][rand(0, 2)],
                'privacy'    => ['public', 'private'][rand(0, 1)],
                'createdAt'  => Carbon::now()->subDays(rand(0, 30)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
