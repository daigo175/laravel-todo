<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Folder;

class FolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 各Userに対して、Folderを2件ずつ作成する
        User::all()->each(function ($user) {
            Folder::factory()->count(2)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
