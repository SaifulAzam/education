<?php namespace App\Repositories\Tutor;

use Illuminate\Database\Eloquent\Model;

class Education extends Model implements EducationInterface {

	//

    protected $fillable = ['position', 'school_name', 'starting_time', 'ending_time'];

    public function tutor()
    {
        return $this->belongsTo('App\Repositories\Tutor\Tutor');
    }

}
