<?php namespace App\Repositories\Tutor;

use Illuminate\Database\Eloquent\Model;

class TutorRating extends Model implements TutorRatingInterface{

    protected $fillable = ['level', 'overall', 'helpfulness', 'attitude', 'clarity', 'easiness'];

    public function tutor()
    {
        return $this->belongsTo('App\Repositories\Tutor\Tutor');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
