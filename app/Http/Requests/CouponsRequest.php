<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CouponsRequest extends Request {

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
			'tutor_id' 			=> 'required_without:subject_id, school_id',
			'subject_id'		=> 'required_without:tutor_id, school_id',
			'school_id'			=> 'required_without:tutor_id, subject_id',
			'title'				=> 'required|max:255',
			'body'				=> 'required',
			'original_price'	=> 'required|integer|min:0',
			'coupon_price'		=> 'required|integer|max:original_price',
			'class_count'		=> 'required|integer|min:10',
			'class_type'		=> 'required',
			'discount'			=> 'required',
		];
	}

}
