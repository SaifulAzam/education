<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Lesson\LessonInterface;
use App\Repositories\Tutor\EducationInterface;
use App\Repositories\Tutor\JobInterface;
use App\Repositories\Tutor\TutorInterface;
use App\Repositories\Comment\CommentInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;
use Auth;
use Cache;

class TutorsController extends Controller {
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

		$this->middleware('auth', ['only' => ['create', 'store']]);
	}

	/**
	 * Navigation
	 *
	 * @return View
	 */

	public function getProfile($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		return view('front.tutors.profile', compact('tutor'));
	}

	public function getStudents($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		return view('front.tutors.students', compact('tutor'));
	}

	public function getComments($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		return view('front.tutors.comments', compact('tutor'));
	}

	public function getLessons($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		return view('front.tutors.lessons', compact('tutor'));
	}

	public function getSettings($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		return view('front.tutors.lessons', compact('tutor'));
	}

	/**
	 * Show the complete_info page
	 *
	 * @return Response
	 */

	public function create()
	{
		return view('auth.tutor_complete');
	}


	/**
	 * List all the tutors
	 *
	 * @return Response
	 */
	public function index()
	{
		$tutors = $this->tutors->paginate(5);
		return view('front.tutors.index', compact('tutors'));
	}

	/**
	 * Show individual tutor page
	 *
	 * @return Response
	 */

	public function show($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		Cache::put('tutor', $tutor, 10);
		return view('front.tutors.show', compact('tutor'));
	}

	/**
	 * After Registration as a tutor, store complete info data
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$tutor = $this->tutors->create($request->all());
		Auth::user()->tutor()->save($tutor);
		$tags = $request->input('tags');
		$tutor->tags()->attach($tags);
		Auth::user()->tutor_complete = 1;
		Auth::user()->save();
		return view('front.tutors.show', compact('tutor'));
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
		return view('front.tutors.index', compact('tutors'));
	}

	/**
	 * edit Social Page
	 *
	 * @return Response
	 */

	public function editSocial($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$tutor->weibo = $request->input('weibo');
		$tutor->weixin = $request->input('weixin');
		$tutor->qq = $request->input('qq');
		$tutor->save();
		return redirect()->back();
	}

	/**
	 * edit basic Info
	 *
	 * @return Response
	 */

	public function editBasic($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$tutor->occupation = $request->input('occupation');
		$tutor->capable_grade = $request->input('capable_grade');
		$tutor->bio = $request->input('bio');
		$tutor->save();
		return redirect()->back();
	}

	/**
	 * Show individual tutor page
	 *
	 * @return Response
	 */

	public function editTag($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$tags = $request->input('tag_list');
		$tutor->tags()->sync((array) $tags);
		return redirect()->back();
	}

	/**
	 * Show individual tutor page
	 *
	 * @return Response
	 */

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

	public function editPicture(Request $request)
	{
		$file = $request->file('thumbnail');
		$filename = $file->getClientOriginalName();
		$filename = '/image/' . time() . '-' . $filename;
		$file->move(public_path() . '/image', $filename);
		Auth::user()->photo = $filename;
		Auth::user()->save();
		return redirect()->back();
	}

	public function postLesson($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$lesson = $this->lessons->create($request->all());
		$tutor->lessons()->save($lesson);
		return redirect()->back();
	}

	public function deleteLesson($tutorId, $id)
	{
		$tutor = $this->tutors->findOrFail($tutorId);
		$lesson = $tutor->lessons()->findOrFail($id);
		$lesson->delete();
		return redirect()->back();
	}



}
