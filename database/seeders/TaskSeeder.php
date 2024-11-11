<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Folder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 各Folderに対して、Taskを3件ずつ作成する
        Folder::all()->each(function ($folder) {
            Task::factory()->count(3)->create([
                'folder_id' => $folder->id,
            ]);
        });
    }
}
