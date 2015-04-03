<?php namespace App\Repositories\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class School extends Model implements SchoolInterface{

	protected $fillable = [
                        'name',
                        'phone',
                        'email',
                        'admin_count',
                        'bio',
                        'founding_time',
                        'overall',
                        'good_count',
                        'average_count',
                        'bad_count',
                        'viewer_count',
                        'address',
                        'location',
                        'tutor_count',
                        'student_count'  ];

    public function tags()
    {
        return $this->belongsToMany('App\Repositories\Tag\Tag');
    }

    public function comments()
    {
        return $this->morphMany('App\Repositories\Comment\Comment', 'owner');
    }

    public function ratings()
    {
        return $this->hasMany('App\Repositories\School\SchoolRating');
    }

    public function coupons()
    {
        return $this->hasMany('App\Repositories\Coupon\Coupon');
    }

    public function students()
    {
        return $this->belongsToMany('App\Repositories\Student\Student');
    }

    public function tutors()
    {
        return $this->hasMany('App\Repositories\Tutor\Tutor');
    }

    public function articles()
    {
        return $this->hasMany('App\Repositories\Article\Article');
    }

    public function lessons()
    {
        return $this->hasMany('App\Repositories\Lesson\Lesson');
    }

    public function scopeRating($query)
    {
        $query->where('tutor_count', '>', 0);
    }

    public function scopeTime($query, $year)
    {
        $query->where('founding_time', '>=', $year);
    }

    public function scopeLocation($query, $location)
    {
        $query->where('location', '=', $location);
    }

}

