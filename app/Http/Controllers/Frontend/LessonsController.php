<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Lesson\LessonInterface;
use App\Repositories\Tag\TagInterface;
use Auth;

class LessonsController extends Controller {

	protected $lessons;
	protected $tags;

	function __construct(LessonInterface $lessons, TagInterface $tags)
	{
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
		return view('front.lessons.index', compact('lessons'));
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
		return view('front.lessons.index', compact('lessons'));
	}


}
