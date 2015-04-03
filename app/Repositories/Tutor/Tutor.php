<?php namespace App\Repositories\Tutor;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model implements TutorInterface {

    protected $fillable = ['bio', 'occupation', 'name', 'student_count', 'capable_grade', 'user_id', 'weibo', 'weixin', 'qq'];

    public function user()
    {
        return $this->belongsTo('App\User');
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

    public function students()
    {
        return $this->belongsToMany('App\Repositories\Student\Student');
    }

    public function school()
    {
        return $this->belongsTo('App\Repositories\School\School');
    }

    public function coupons()
    {
        return $this->hasMany('App\Repositories\Coupon\Coupon');
    }

    public function jobs()
    {
        return $this->hasMany('App\Repositories\Tutor\Job');
    }

    public function educations()
    {
        return $this->hasMany('App\Repositories\Tutor\Education');
    }




}
