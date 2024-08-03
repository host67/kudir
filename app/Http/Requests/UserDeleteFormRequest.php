<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Dto\UserDeleteDTO;

class UserDeleteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'User ID is required',
            'id.integer' => 'User ID format must be integer',
            'id.exists' => 'User does not exist',
        ];
    }

    public function attributes(): array
    {
        return [
            'id' => 'User ID',
        ];
    }


    /**
     * Create a UserDeleteDTO from validated user ID.
     *
     * @return UserDeleteDTO
     */
    public function getUserDeleteDTO(): UserDeleteDTO
    {
        $validated = $this->validated();

        return new UserDeleteDTO(
            id: $validated['id'],
        );
    }
}
