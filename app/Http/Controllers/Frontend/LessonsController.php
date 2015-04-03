<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Lesson\LessonInterface;
use App\Repositories\Comment\CommentInterface;
use App\Repositories\Tag\TagInterface;
use Auth;

class LessonsController extends Controller {

	protected $lessons;
	protected $comments;
	protected $tags;

	function __construct(LessonInterface $lessons, CommentInterface $comments, TagInterface $tags)
	{
		$this->comments = $comments;
		$this->lessons = $lessons;
		$this->tags = $tags;

		$this->middleware('auth', ['only' => 'storeComment']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lessons = $this->lessons->latest('published_at')->published()->paginate(5);
		$tags = $this->tags->all();
		return view('front.lessons.index', compact('lessons', 'tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeComment($id, Request $request)
	{
		$lesson = $this->lessons->findOrFail($id);
		$comment = $this->comments->create($request->all());
		Auth::user()->comments()->save($comment);
		$lesson->comments()->save($comment);
		flash()->overlay('评论成功！');

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lesson = $this->lessons->findOrFail($id);
		return view('front.lessons.show', compact('lesson'));
	}

	public function filterByTag($tagId)
	{
		$tag = $this->tags->findOrFail($tagId);
		$lessons = $tag->lessons()->paginate(5);
		$tags = $this->tags->all();
		return view('front.lessons.index', compact('lessons', 'tags'));
	}


}
