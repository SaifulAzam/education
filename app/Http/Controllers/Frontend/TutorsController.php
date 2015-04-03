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

		$this->middleware('auth', ['only' => ['storeComment', 'create', 'store']]);
	}

	/**
	 * Show the complete_info page
	 *
	 * @return Response
	 */

	public function create()
	{
		$tag_can_teach = $this->tags->lists('name', 'id');
		return view('auth.tutor_complete', compact('tag_can_teach'));
	}

	/**
	 * After Registration as a tutor, store complete info data
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$tutor = $this->tutors->create($request->all());
		//dd($tutor);
		$tmp = Auth::user()->tutor()->save($tutor);
		$tags = $request->input('tag_can_teach');
		$tmp->tags()->attach($tags);
		Auth::user()->tutor_complete = 1;
		Auth::user()->save();
		return redirect('/home');
	}

	/**
	 * List all the tutors
	 *
	 * @return Response
	 */
	public function index()
	{
		$tutors = $this->tutors->paginate(5);
		$tags = $this->tags->all();
		return view('front.tutors.index', compact('tutors', 'tags'));
	}

	/**
	 * Show individual tutor page
	 *
	 * @return Response
	 */

	public function show($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		return view('front.tutors.show', compact('tutor'));
	}

	/**
	 * Store Comments
	 *
	 * @return Response
	 */

	public function storeComment($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$comment = $this->comments->create($request->all());
		Auth::user()->comments()->save($comment);
		$tutor->comments()->save($comment);
		flash()->overlay('评论成功！');
		return redirect()->back();
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

	public function getProfile($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		$tags = $this->tags->lists('name', 'id');
		return view('front.tutors.profile', compact('tutor', 'tags'));
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
		$tags = $this->tags->lists('name', 'id');
		return view('front.tutors.lessons', compact('tutor', 'tags'));
	}

	public function getSettings($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		return view('front.tutors.lessons', compact('tutor'));
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
