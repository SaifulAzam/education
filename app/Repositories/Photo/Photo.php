<?php namespace App\Repositories\Photo;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model implements PhotoInterface{

	//
    protected $fillable = ['title','url'];

}
