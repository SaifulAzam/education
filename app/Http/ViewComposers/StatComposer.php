<?php namespace App\Http\ViewComposers;

use App\Repositories\Tag\TagInterface;
use Illuminate\Contracts\View\View;
use Cache;
use Auth;

/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 4/3/15
 * Time: 11:46 AM
 */
class StatComposer  {

    protected $tags;

    function __construct(TagInterface $tags)
    {
        $this->tags = $tags;
    }


    public function compose(View $view)
    {
        $view->with('tags', $this->tags->all());
        $view->with('tag_list', $this->tags->lists('name', 'id'));
        $view->with('currentUser', Auth::user());
    }

}