<?php namespace App\Http\Controllers\Api;

/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 4/1/15
 * Time: 9:53 AM
 */

use App\Http\Requests;
use App\Repositories\Comment\CommentInterface;
use Illuminate\Http\Request;
use Auth;
use Input;
use Log;
use Crypt;

class CommentsController extends ApiController {

    protected $comments;

    function __construct(CommentInterface $comments)
    {
        $this->comments = $comments;
        $this->middleware('auth', ['only' => ['store', 'destroy']]);
    }


    public function index()
    {
        $owner = Input::get('owner');
        $owner = Crypt::decrypt($owner);
        list($owner_type, $owner_id) = explode('.', $owner);
        $owner = $owner_type::findOrFail($owner_id);
        $this->data = $owner->comments()->latest('created_at')->paginate(5);
        return $this->paginate();

    }

    public function store(Request $request)
    {
        $owner = $request->input('owner');
        $owner = Crypt::decrypt($owner);
        list($owner_type, $owner_id) = explode('.', $owner);
        $data = [
            'owner_type'    => $owner_type,
            'owner_id'      => $owner_id,
            'body'          => $request->input('body'),
            'author_id'     => Auth::user()->id,
            'author_name'   => $request->input('author_name')
        ];
        $comment = $this->comments->fill($data);
        $comment->save();
        $tags = $request->input('tags');
        $comment->tags()->attach($tags);
        return $this->push(200, 20000, 'Comment Created');
    }

    public function destroy($id)
    {
        $comment = $this->comments->findOrFail($id);
        $comment->delete();

        return $this->respondDeleted('deleted');
    }


}