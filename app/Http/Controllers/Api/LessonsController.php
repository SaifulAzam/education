<?php namespace App\Http\Controllers\Api;

use App\Http\Requests\LessonsRequest;
use App\Repositories\Comment\CommentInterface;
use App\Repositories\Lesson\LessonInterface;
use App\Repositories\School\SchoolInterface;
use App\Repositories\Subject\SubjectInterface;
use App\Repositories\Tutor\TutorInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Auth;

class LessonsController extends ApiController {

	protected $lessons;
	protected $schools;
	protected $tutors;
	protected $subjects;
	protected $comments;

	function __construct(LessonInterface $lessons, SchoolInterface $schools, TutorInterface $tutors, SubjectInterface $subjects, CommentInterface $comments)
	{
		$this->lessons = $lessons;
		$this->schools = $schools;
		$this->tutors = $tutors;
		$this->subjects = $subjects;
		$this->comments = $comments;

		$this->middleware('auth', ['only' => 'store']);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data = $this->lessons->latest('published_at')->published()->paginate(10);
		return $this->paginate();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(LessonsRequest $request)
	{
		$lesson = $this->lessons->create($request->all());
		$tags = $request->input('tags');
		$lesson->tags()->attach($tags);

		$tutor_id = $request->input('tutor_id');
		if($tutor_id)
		{
			$tutor = $this->tutors->find($tutor_id);
			if (!$tutor)
			{
				return $this->notFound('Tutor does not exist');
			}
			$subject_id = $request->input('subject_id');
			if($subject_id)
			{
				$subject = $this->subjects->find($subject_id);
				if(!$subject)
				{
					return $this->notFound('Subject does not exist');
				}
				$subject->lessons()->save($lesson);
			}
			$tutor->lessons()->save($lesson);
		}

		$school_id = $request->input('school_id');
		if($school_id)
		{
			$school = $this->schools->find($school_id);
			if(!$school)
			{
				return $this->notFound('School does not exist');
			}
			$subject_id = $request->input('subject_id');
			if($subject_id)
			{
				$subject = $this->subjects->find($subject_id);
				if(!$subject)
				{
					return $this->notFound('Subject does not exist');
				}
				$subject->lessons()->save($lesson);
			}
			$school->lessons()->save($lesson);
		}
		return $this->push(200, 20000, 'Lesson Created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lesson = $this->lessons->find($id);

		if (!$lesson)
		{
			return $this->notFound('Lesson does not exist');
		}

		$this->data = $lesson;
		return $this->push();
	}

	/**
	 * Update an existing resource in storage.
	 *
	 * @return Response
	 */
	public function update($id, LessonsRequest $request)
	{
		$lesson = $this->lessons->find($id);
		if (!$lesson)
		{
			return $this->notFound('Lesson does not exist');
		}
		$lesson->update($request->all());
		$tags = $request->input('tags');
		$lesson->tags()->sync((array) $tags);

		return $this->push(200, 20000, 'Lesson Updated');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$lesson = $this->lessons->find($id);
		if (!$lesson)
		{
			return $this->notFound('Lesson does not exist');
		}
		$lesson->delete();
		return $this->push(200, 20000, 'Lesson Deleted');
	}

	/**
	 * Post Comments
	 *
	 * @return Response
	 */

	public function postComment($id, Request $request)
	{
		$lesson = $this->lessons->find($id);
		if (!$lesson)
		{
			return $this->notFound('Lesson does not exist');
		}
		$comment = $this->comments->create($request->all());

		Auth::user()->comments()->save($comment);

		$lesson->comments()->save($comment);

		return $this->push(200, 20000, 'Comment Created');
	}

}
