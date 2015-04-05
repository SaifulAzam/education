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

}
