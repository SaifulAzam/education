<?php namespace App\Repositories\School;

use Illuminate\Database\Eloquent\Model;

class SchoolRating extends Model implements SchoolRatingInterface{

    protected $fillable = ['user_id', 'school_id', 'level', 'overall', 'environment', 'attitude', 'price'];

    public function school()
    {
        return $this->belongsTo('App\Repositories\School\School')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeGood($query)
    {
        return $query->where('level', '=', 'good');
    }
}
