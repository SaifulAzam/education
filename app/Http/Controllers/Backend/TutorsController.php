<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Tag\TagInterface;
use App\Repositories\Tutor\TutorInterface;
use App\User;
use Illuminate\Http\Request;

class TutorsController extends Controller {

	protected $tutors;
	protected $tags;
	protected $users;

	function __construct(TutorInterface $tutors, TagInterface $tags, User $users)
	{
		$this->tags = $tags;
		$this->tutors = $tutors;
		$this->users = $users;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tutors = $this->tutors->all();
		return view('back.tutors.index', compact('tutors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$users = $this->users->tutorNotComplete()->get();
		$usernames = $users->lists('username', 'id');
		return view('back.tutors.create', compact('usernames'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$tutor = $this->tutors->create($request->all());
		$user_id = $request->input('user_list');
		$user = $this->users->findOrFail($user_id[0]);
		$user->tutor()->save($tutor);
		$user->tutor_complete = 1;
		$user->save();
		$tags = $request->input('tag_list');
		$tutor->tags()->attach($tags);
		return redirect('/backend/tutors');
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
		$tutor = $this->tutors->findOrFail($id);
		$username = $tutor->user->username;
		return view('back.tutors.edit', compact('tutor', 'username'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$tutor = $this->tutors->findOrFail($id);
		$tutor->update($request->all());
		$tags = $request->input('tag_list');
		$tutor->tags()->sync((array) $tags);
		return redirect('/backend/tutors');
	}

	public function getDelete($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		return view('back.tutors.delete', compact('tutor'));
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tutor = $this->tutors->findOrFail($id);
		$tutor->delete();
		return redirect('/backend/tutors');
	}

}
