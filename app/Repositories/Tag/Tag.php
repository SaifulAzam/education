<?php namespace App\Repositories\Tag;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model implements TagInterface {

	protected $fillable = ['name'];

	public function users()
	{
		return $this->belongsToMany('App\User');
	}

	public function lessons()
	{
		return $this->belongsToMany('App\Repositories\Lesson\Lesson');
	}

	public function students()
	{
		return $this->belongsToMany('App\Repositories\Student\Student');
	}

	public function tutors()
	{
		return $this->belongsToMany('App\Repositories\Tutor\Tutor');
	}

	public function schools()
	{
		return $this->belongsToMany('App\Repositories\School\School');
	}

	public function coupons()
	{
		return $this->belongsToMany('App\Repositories\Coupon\Coupon');
	}

	public function articles()
	{
		return $this->belongsToMany('App\Repositories\Article\Article');
	}

	public function comments()
	{
		return $this->belongsToMany('App\Repositories\Comments\Comments');
	}
}
