<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\TaskStatus;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:100'],
            'status' => [Rule::enum(TaskStatus::class)],
            'due_date' => ['required', 'date', 'after_or_equal:today'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title' => 'タスク名',
            'status' => '状態',
            'due_date' => '期限',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'due_date.after_or_equal' => '期限は本日以降の日付を設定してください',
            // (これは機能しない)'status.enum' => '状態は未着手、着手中、完了のいずれかを設定してください',
            // https://masteringlaravel.io/daily/2024-07-29-how-to-customize-the-message-for-enum-validation
            sprintf('status.%s', Enum::class) => '状態は未着手、着手中、完了のいずれかを設定してください',
        ];
    }
}
