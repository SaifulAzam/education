<?php namespace App\Http\Controllers\Api;

/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 4/1/15
 * Time: 9:00 AM
 */

use App\Http\Requests;
use App\Repositories\Article\ArticleInterface;
use App\Repositories\Comment\CommentInterface;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends ApiController {

    protected $articles;
    protected $comments;

    function __construct(ArticleInterface $articles, CommentInterface $comments)
    {
        $this->articles = $articles;
        $this->comments = $comments;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->data = $this->articles->latest('published_at')->published()->paginate(5);
        return $this->paginate();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $article= $this->articles->find($id);
        if (!$article)
        {
            return $this->notFound('Article does not exist');
        }
        $this->data = $article;

        return $this->push();
    }
    /**
     * Post Comments
     *
     * @return Response
     */

    public function postComment($id, Request $request)
    {
        $article= $this->articles->find($id);
        if (!$article)
        {
            return $this->notFound('Article does not exist');
        }
        $comment = $this->comments->create($request->all());

        Auth::user()->comments()->save($comment);

        $article->comments()->save($comment);

        return $this->push(200, 20000, 'Comment Created');
    }
}