<?php namespace App\Repositories\Student;

use Illuminate\Database\Eloquent\Model;

class Student extends Model implements StudentInterface{

	protected $fillable = ['name', 'grade', 'desired_tutor', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Repositories\Tag\Tag');
    }

    public function tutors()
    {
        return $this->belongsToMany('App\Repositories\Tutor\Tutor');
    }

    public function schools()
    {
        return $this->belongsToMany('App\Repositories\School\School');
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Repositories\Lesson\Lesson');
    }

}
