<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
			'title' => ['required', 'string', 'min:3', 'max:199'],
			'category_id' => ['required', 'integer', 'min:1'],
			'status' => ['required'],
			'image' => ['sometimes'],
			'description' => ['required']
		];
    }

    public function messages()
	{
		return [
			'required' => 'Нужно заполнить поле :attribute'
		];
	}

	public function attributes()
	{
		return [
			'title' => 'заголовок'
		];
	}
}
