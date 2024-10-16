<?php

namespace Tests\Feature;

use Database\Seeders\FolderSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    // 各テストの前にシーダーを実行する
    protected $seeder = FolderSeeder::class;

    /**
     * 過去日付を入力するとバリデーションエラーとなること
     */
    public function test_input_due_date_past_dates_are_not_allowed(): void
    {
        $response = $this->post('/folders/1/tasks/',[
            'title' => 'anyTask',
            'due_date' => '2023/10/15',
        ]);

        $response->assertInvalid([
            'due_date' => '期限は本日以降の日付を設定してください'
        ]);
    }
}
