<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\School\SchoolInterface;
use App\Repositories\Comment\CommentInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class SchoolsController extends Controller {


	protected $schools;
	protected $comments;
	protected $tags;
	//protected $error;

	function __construct(SchoolInterface $schools, CommentInterface $comments, TagInterface $tags)
	{
		$this->schools = $schools;
		$this->comments = $comments;
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
		$schools = $this->schools->paginate(5);
		$tags = $this->tags->all();
		return view('front.schools.index', compact('schools', 'tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$school = $this->schools->findOrFail($id);
		return view('front.schools.show', compact('school'));
	}

	public function storeComment($id, Request $request)
	{
		$school = $this->schools->findOrFail($id);
		$comment = $this->comments->create($request->all());

		Auth::user()->comments()->save($comment);

		$school->comments()->save($comment);

		flash()->overlay('评论成功！');

		return redirect()->back();
	}

	public function filterByLocation($location)
	{
		$schools = $this->schools->location($location)->paginate(5);
		$tags = $this->tags->all();
		return view('front.schools.index', compact('schools', 'tags'));
	}

	public function sortBy($condition)
	{
		$schools = $this->schools->latest($condition)->paginate(5);
		$tags = $this->tags->all();
		return view('front.schools.index', compact('schools', 'tags'));
	}

	public function filterByTime($time)
	{
		$year = Carbon::now()->year;
		$year = $year - $time;
		$schools = $this->schools->time($year)->paginate(5);
		if (is_null($schools)) {
			$error = 'no result found';
			return view('front.schools.index', compact('schools', 'error'));
		}
		$tags = $this->tags->all();
		return view('front.schools.index', compact('schools', 'tags'));
	}

	public function filterByTag($id)
	{
		$tag = $this->tags->findOrFail($id);
		$tags = $this->tags->all();
		$schools = $tag->schools()->paginate(5);
		return view('front.schools.index', compact('schools', 'tags'));
	}
}
