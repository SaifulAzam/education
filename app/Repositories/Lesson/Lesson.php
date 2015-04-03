<?php namespace App\Repositories\Lesson;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lesson extends Model implements LessonInterface {

    protected $dates = ['published_at'];
    protected $fillable = [
        'title', 'body', 'published_at', 'photo', 'tutor_id', 'school_id', 'subject_id', 'class_count', 'class_type', 'price'
    ];


    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>=', Carbon::now());
    }

    public function tutor()
    {
        return $this->belongsTo('App\Repositories\Tutor\Tutor');
    }

    public function school()
    {
        return $this->belongsTo('App\Repositories\School\School');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Repositories\Tag\Tag');
    }

    public function comments()
    {
        return $this->morphMany('App\Repositories\Comment\Comment', 'owner');
    }

    public function students()
    {
        return $this->belongsToMany('App\Repositories\Student\Student');
    }

    public function coupon()
    {
        return $this->belongsTo('App\Repositories\Coupon\Coupon');
    }

/*
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }
*/
}
