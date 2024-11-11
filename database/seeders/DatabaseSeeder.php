<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 各テーブルを初期化
        \App\Models\User::truncate();
        \App\Models\Folder::truncate();
        \App\Models\Task::truncate();

        $this->call([
            UserSeeder::class,
            FolderSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
