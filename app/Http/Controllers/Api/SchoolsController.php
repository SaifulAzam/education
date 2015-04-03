<?php namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Repositories\School\SchoolInterface;
use App\Repositories\Comment\CommentInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class SchoolsController extends ApiController {

	protected $schools;
	protected $comments;
	protected $tags;
	//protected $error;

	function __construct(SchoolInterface $schools, CommentInterface $comments, TagInterface $tags)
	{
		$this->schools = $schools;
		$this->comments = $comments;
		$this->tags = $tags;

		$this->middleware('auth', ['only' => 'postComment']);

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data = $this->schools->paginate(5);
		return $this->paginate();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$school= $this->schools->find($id);
		if (!$school)
		{
			return $this->notFound('School does not exist');
		}
		$this->data = $school;
		return $this->push();
	}

	/**
	 * Post Comments
	 *
	 * @return Response
	 */

	public function postComment($id, Request $request)
	{
		$school= $this->schools->find($id);
		if (!$school)
		{
			return $this->notFound('School does not exist');
		}
		$comment = $this->comments->create($request->all());

		Auth::user()->comments()->save($comment);

		$school->comments()->save($comment);

		return $this->push(200, 20000, 'Comment Created');
	}

}
