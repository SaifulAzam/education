<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\School\SchoolInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;

class SchoolsController extends Controller {

	protected $schools;
	protected $tags;

	function __construct(SchoolInterface $schools, TagInterface $tags)
	{
		$this->schools = $schools;
		$this->tags = $tags;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$schools = $this->schools->all();
		return view('back.schools.index', compact('schools'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('back.schools.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$school = $this->schools->create($request->all());
		$tags = $request->input('tag_list');
		$school->tags()->attach($tags);
		return redirect('/backend/schools');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$school = $this->schools->findOrFail($id);
		return view('back.schools.edit', compact('school'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$school = $this->schools->findOrFail($id);
		$school->update($request->all());
		$tags = $request->input('tag_list');
		$school->tags()->sync((array) $tags);
		return redirect('/backend/schools');
	}

	public function getDelete($id)
	{
		$school = $this->schools->findOrFail($id);
		return view('back.schools.delete', compact('school'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$school = $this->schools->findOrFail($id);
		$school->delete();
		return redirect('/backend/schools');
	}

}
