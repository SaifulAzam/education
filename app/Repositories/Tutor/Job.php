<?php namespace App\Repositories\Tutor;

use Illuminate\Database\Eloquent\Model;

class Job extends Model implements JobInterface{

	protected $fillable = ['position', 'company_name', 'starting_time', 'ending_time'];

    public function tutor()
    {
        return $this->belongsTo('App\Repositories\Tutor\Tutor');
    }

}
