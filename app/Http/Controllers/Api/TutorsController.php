<?php namespace App\Http\Controllers\Api;

use App\Http\Requests\TutorsRequest;
use App\Repositories\Lesson\LessonInterface;
use App\Repositories\Tutor\EducationInterface;
use App\Repositories\Tutor\JobInterface;
use App\Repositories\Tutor\TutorInterface;
use App\Repositories\Comment\CommentInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;
use Auth;

class TutorsController extends ApiController {
	protected $tutors;
	protected $comments;
	protected $tags;
	protected $jobs;
	protected $educations;
	protected $lessons;

	function __construct(TutorInterface $tutors, CommentInterface $comments, TagInterface $tags, JobInterface $jobs, EducationInterface $educations, LessonInterface $lessons)
	{
		$this->tutors = $tutors;
		$this->comments = $comments;
		$this->tags = $tags;
		$this->jobs = $jobs;
		$this->educations = $educations;
		$this->lessons = $lessons;

		$this->middleware('auth', ['only' => ['postComment', 'create', 'store']]);
	}

	/**
	 * After Registration as a tutor, store complete info data
	 *
	 * @return Response
	 */
	public function store(TutorsRequest $request)
	{
		$tutor = $this->tutors->create($request->all());
		Auth::user()->tutor()->save($tutor);
		$tags = $request->input('tags');
		$tutor->tags()->attach($tags);
		Auth::user()->tutor_complete = 1;
		Auth::user()->save();
		return $this->push(200, 20000, 'Tutor Profile Completed');
	}

	/**
	 * List all the tutors
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data = $this->tutors->paginate(5);
		return $this->paginate();
	}

	/**
	 * Show individual tutor page
	 *
	 * @return Response
	 */

	public function show($id)
	{
		$tutor= $this->tutors->find($id);
		if (!$tutor)
		{
			return $this->notFound('Tutor does not exist');
		}
		$this->data = $tutor;
		return $this->push();
	}

	/**
	 * Post Comments
	 *
	 * @return Response
	 */

	public function postComment($id, Request $request)
	{
		$tutor= $this->tutors->find($id);
		if (!$tutor)
		{
			return $this->notFound('Tutor does not exist');
		}
		$comment = $this->comments->create($request->all());
		Auth::user()->comments()->save($comment);
		$tutor->comments()->save($comment);

		return $this->push(200, 20000, 'Comment Posted');
	}

	/**
	 * sort by Tags
	 *
	 * @return Response
	 */

	public function filterByTag($tagId)
	{
		$tag = $this->tags->findOrFail($tagId);
		$tutors = $tag->tutors()->paginate(5);
		$tags = $this->tags->all();
		return view('front.tutors.index', compact('tutors', 'tags'));
	}

	public function editSocial($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$tutor->weibo = $request->input('weibo');
		$tutor->weixin = $request->input('weixin');
		$tutor->qq = $request->input('qq');
		$tutor->save();
		return redirect()->back();
	}

	public function editTag($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$tags = $request->input('tag_list');
		$tutor->tags()->sync((array) $tags);
		return redirect()->back();
	}

	public function editJob($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$job = $this->jobs->create($request->all());
		$tutor->jobs()->save($job);
		return redirect()->back();
	}

	public function editEducation($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$education = $this->educations->create($request->all());
		$tutor->educations()->save($education);
		return redirect()->back();
	}

	public function deleteJob($tutorId, $id)
	{
		$tutor = $this->tutors->findOrFail($tutorId);
		$job = $tutor->jobs()->findOrFail($id);
		$job->delete();
		return redirect()->back();
	}

	public function deleteEducation($tutorId, $id)
	{
		$tutor = $this->tutors->findOrFail($tutorId);
		$education = $tutor->educations()->findOrFail($id);
		$education->delete();
		return redirect()->back();
	}

	public function editPicture($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$file = $request->file('thumbnail');
		$filename = $file->getClientOriginalName();
		$filename = time() . '-' . $filename;
		$file->move(public_path() . '/image', $filename);
		$tutor->thumbnail = $filename;
		$tutor->save();
		return redirect()->back();
	}




}
