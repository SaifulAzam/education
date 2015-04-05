<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Lesson\LessonInterface;
use App\Repositories\School\SchoolInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class SchoolsController extends Controller {


	protected $schools;
	protected $lessons;
	protected $tags;
	//protected $error;

	function __construct(SchoolInterface $schools, LessonInterface $lessons, TagInterface $tags)
	{
		$this->schools = $schools;
		$this->lessons = $lessons;
		$this->tags = $tags;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$schools = $this->schools->paginate(5);
		return view('front.schools.index', compact('schools'));
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


	public function filterByLocation($location)
	{
		$schools = $this->schools->location($location)->paginate(5);
		return view('front.schools.index', compact('schools'));
	}

	public function sortBy($condition)
	{
		$schools = $this->schools->latest($condition)->paginate(5);
		return view('front.schools.index', compact('schools'));
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
		return view('front.schools.index', compact('schools'));
	}

	public function filterByTag($id)
	{
		$tag = $this->tags->findOrFail($id);
		$schools = $tag->schools()->paginate(5);
		return view('front.schools.index', compact('schools'));
	}

	public function getProfile($id)
	{
		$school = $this->schools->findOrFail($id);
		return view('front.schools.profile', compact('school'));
	}

	public function getStudents($id)
	{
		$school = $this->schools->findOrFail($id);
		return view('front.schools.students', compact('school'));
	}

	public function getComments($id)
	{
		$school = $this->schools->findOrFail($id);
		return view('front.schools.comments', compact('school'));
	}

	public function getLessons($id)
	{
		$school = $this->schools->findOrFail($id);
		return view('front.schools.lessons', compact('school'));
	}

	public function getTutors($id)
	{
		$school = $this->schools->findOrFail($id);
		return view('front.schools.tutors', compact('school'));
	}

	/**
	 * edit Social Page
	 *
	 * @return Response
	 */

	public function editSocial($id, Request $request)
	{
		$school = $this->schools->findOrFail($id);
		$school->phone = $request->input('phone');
		$school->email = $request->input('email');
		$school->weibo = $request->input('weibo');
		$school->weixin = $request->input('weixin');
		$school->qq = $request->input('qq');
		$school->save();
		return redirect()->back();
	}


	/**
	 * edit basic Info
	 *
	 * @return Response
	 */

	public function editBasic($id, Request $request)
	{
		$school = $this->schools->findOrFail($id);
		$school->name = $request->input('name');
		$school->founding_time = $request->input('founding_time');
		$school->address = $request->input('address');
		$school->location = $request->input('location');
		$school->student_count = $request->input('student_count');
		$school->save();
		return redirect()->back();
	}

	/**
	 * Show individual school page
	 *
	 * @return Response
	 */

	public function editTag($id, Request $request)
	{
		$school = $this->schools->findOrFail($id);
		$tags = $request->input('tag_list');
		$school->tags()->sync((array) $tags);
		return redirect()->back();
	}


	public function editPicture($id, Request $request)
	{
		$school = $this->schools->findOrFail($id);
		$file = $request->file('thumbnail');
		$filename = $file->getClientOriginalName();
		$filename = '/image/' . time() . '-' . $filename;
		$file->move(public_path() . '/image', $filename);
		$school->photo = $filename;
		$school->save();
		return redirect()->back();
	}

	public function postLesson($id, Request $request)
	{
		$school = $this->schools->findOrFail($id);
		$lesson = $this->lessons->create($request->all());
		$school->lessons()->save($lesson);
		return redirect()->back();
	}

	public function deleteLesson($schoolId, $id)
	{
		$school = $this->schools->findOrFail($schoolId);
		$lesson = $school->lessons()->findOrFail($id);
		$lesson->delete();
		return redirect()->back();
	}

}
