<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Dto\Tasks\TaskStoreDto;
use App\Traits\ErrorResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreTaskRequest extends FormRequest
{
    use ErrorResponseTrait;

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'importance' => 'in:high,middle,low',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => trans('api.title.required'),
            'title.max' => trans('api.title.max'),
            'importance' => trans('api.importance'),
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator): void
    {
        $this->makeJsonResponse($validator);
    }

    /**
     * @return TaskStoreDto
     */
    public function validatedDTO(): TaskStoreDto
    {
        return new TaskStoreDto($this->validated());
    }
}
