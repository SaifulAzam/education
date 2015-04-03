<?php namespace App\Repositories\Article;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model implements ArticleInterface{

    protected $dates = ['published_at'];
    protected $fillable = ['title', 'body', 'published_at', 'picture', 'user_id'];

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>=', Carbon::now());
    }
    /*
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }
*/

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Repositories\Tag\Tag')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany('App\Repositories\Comment\Comment', 'owner');
    }

    public function school()
    {
        return $this->belongsTo('App\Repositories\School\School');
    }

}
