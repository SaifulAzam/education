<?php namespace App\Repositories\Comment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model implements CommentInterface{

	protected $fillable = ['body', 'author_name', 'author_id', 'parent_id', 'most_recent_child_id', 'owner_type', 'owner_id'];

    public function owner()
    {
        return $this->morphTo('owner');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Repositories\Comment\Comment', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Repositories\Comment\Comment', 'parent_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Repositories\Tag\Tag');
    }

    public function mostRecentChild()
    {
        return $this->belongsTo('App\Repositories\Comment\Comment', 'most_recent_child_id');
    }

    public function updateChildCount()
    {
        if($this->exists)
        {
            $this->child_count = $this->children()->count();
            $this->save();
        }
    }




}
