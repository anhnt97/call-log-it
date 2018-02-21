<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name' => 'required | min:8',
			'deadline' => 'required',
			'id_part' => 'required',
			'id_team' => 'required',
		];
	}

	public function messages() {
		return [
			'name.required' => 'Vui lòng nhập tên công việc',
			'deadline.required' => 'Vui lòng chọn ngày hết hạn',
			'name.min' => 'Tên công việc phải ít nhất 8 kí tự',
			'id_part.required' => 'Vui lòng chọn bộ phận',
			'id_team.required' => 'Vui lòng chọn nhóm thực hiện',

		];
	}
}
