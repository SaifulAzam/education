<?php namespace App\Repositories\Coupon;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model implements CouponInterface {

	protected $dates = ['published_at'];
	protected $fillable = [
		'owner_id', 'owner_type', 'title', 'body', 'original_price',
		'coupon_price', 'class_count', 'class_type',
		'discount', 'photo', 'published_at'
	];

	public function school()
	{
		return $this->belongsTo('App\Repositories\School\School');
	}

	public function tutor()
	{
		return $this->belongsTo('App\Repositories\Tutor\Tutor');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Repositories\Tag\Tag');
	}

	public function comments()
	{
		return $this->morphMany('App\Repositories\Comment\Comment', 'owner');
	}
	
	public function lessons()
	{
		return $this->hasMany('App\Repositories\Lesson\Lesson');
	}

}
