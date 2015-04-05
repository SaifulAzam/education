<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Repositories\Student\StudentInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;

class StudentsController extends Controller {

	protected $students;
	protected $tags;
	protected $users;

	function __construct(StudentInterface $students, TagInterface $tags, User $users)
	{
		$this->students = $students;
		$this->tags = $tags;
		$this->users = $users;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$students = $this->students->all();
		return view('back.students.index', compact('students'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$users = $this->users->studentNotComplete()->get();
		$usernames = $users->lists('username', 'id');
		return view('back.students.create', compact('usernames'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$student = $this->students->create($request->all());
		$user_id = $request->input('user_list');
		$user = $this->users->findOrFail($user_id[0]);
		$user->student()->save($student);
		$user->student_complete = '1';
		$user->save();
		$tags = $request->input('tag_list');
		$student->tags()->attach($tags);
		return redirect('/backend/students');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$student = $this->students->findOrFail($id);
		$username = $student->user->username;
		return view('back.students.edit', compact('student', 'username'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$student = $this->students->findOrFail($id);
		$student->update($request->all());
		$tags = $request->input('tag_list');
		$student->tags()->sync((array) $tags);
		return redirect('/backend/students');
	}

	public function getDelete($id)
	{
		$student = $this->students->findOrFail($id);
		return view('back.students.delete', compact('student'));
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$student = $this->students->findOrFail($id);
		$student->delete();
		return redirect('/backend/students');
	}

}
