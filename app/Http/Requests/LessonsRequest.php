<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LessonsRequest extends Request {

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
			'tutor_id' 		=> 'required_without:subject_id, school_id',
			'subject_id'	=> 'required_without:tutor_id, school_id',
			'school_id'		=> 'required_without:tutor_id, subject_id',
			'title'			=> 'required|max:255',
			'body'			=> 'required',
			'price'			=> 'required|integer|min:0',
			'class_count'	=> 'required|integer|min:0',
			'class_type'	=> 'required',
			'published_at'	=> 'date',
		];
	}

}
