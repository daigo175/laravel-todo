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

    /**
     * 状態が未着手、着手中、完了のいずれかでないとバリデーションエラーとなること
     */
    public function test_status_is_not_allowed_other_than_not_started_in_progress_and_completed(): void
    {
        $response = $this->post('/folders/1/tasks/',[
            'title' => 'anyTask',
            'status' => 'invalidStatus',
            'due_date' => now()->addDays(1)->format('Y/m/d'),
        ]);

        $response->assertInvalid([
            'status' => '状態は未着手、着手中、完了のいずれかを設定してください'
        ]);
    }
}
