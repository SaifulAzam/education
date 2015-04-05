<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'nickname', 'username', 'cellphone', 'email',
		'password', 'gender', 'is_tutor', 'tutor_complete', 'student_complete', 'photo'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function articles()
	{
		return $this->hasMany('App\Repositories\Article\Article');
	}

	public function tutor()
	{
		return $this->hasOne('App\Repositories\Tutor\Tutor');
	}

	public function student()
	{
		return $this->hasOne('App\Repositories\Student\Student');
	}

	public function tags()
	{
		return $this->hasMany('App\Repositories\Tag\Tag');
	}

	public function lessons()
	{
		return $this->hasMany('App\Repositories\Lesson\Lesson');
	}

	public function roles()
	{
		return $this->belongsToMany('App\Repositories\Role\Role')->withTimestamps();
	}

	public function comments()
	{
		return $this->hasMany('App\Repositories\Comment\Comment', 'author_id');
	}

	public function isTutor($id)
	{
		if($this->id == $id)
		{
			return true;
		}
		return false;
	}

	public function isSchoolAdmin($name)
	{
		if($this->hasRole($name))
		{
			return true;
		}
		return false;
	}


	public function hasRole($name)
	{
		foreach ($this->roles as $role)
		{
			if ( $role->name == $name )
			{
				return true;
			}
		}
		return false;
	}

	public function assignRole($role)
	{
		$this->roles()->attach($role);
	}

	public function removeRole($role)
	{
		$this->roles()->detach($role);
	}

	public function scopeTutorComplete($query)
	{
		$query->where('tutor_complete', '=', 1);
	}
	public function scopeTutorNotComplete($query)
	{
		$query->where('tutor_complete', '=', 0);
	}

	public function scopeStudentNotComplete($query)
	{
		$query->where('student_complete', '=', 0);
	}

}
