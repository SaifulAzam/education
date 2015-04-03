<?php namespace App\Repositories\Subject;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model implements SubjectInterface{

    protected $fillable = ['name'];


    public function lessons()
    {
        return $this->hasMany('App\Repositories\Lesson\Lesson');
    }

    public function coupons()
    {
        return $this->hasMany('App\Repositories\Coupon\Coupon');
    }


}
