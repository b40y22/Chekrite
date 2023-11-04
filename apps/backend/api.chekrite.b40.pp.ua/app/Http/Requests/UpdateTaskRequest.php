<?php
declare(strict_types=1);

namespace App\Http\Requests;

use App\Dto\Tasks\TaskUpdateDto;
use App\Traits\ErrorResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateTaskRequest extends FormRequest
{
    use ErrorResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
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
            'id' => 'required|numeric',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'importance' => 'in:high,middle,low',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => trans('api.taskId.required'),
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
     * @return TaskUpdateDto
     */
    public function validatedDTO(): TaskUpdateDto
    {
        return new TaskUpdateDto($this->validated());
    }
}
