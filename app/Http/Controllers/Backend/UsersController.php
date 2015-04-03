<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleInterface;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller {

	protected $users;
	protected $roles;

	function __construct(User $users, RoleInterface $roles)
	{
		$this->users = $users;
		$this->roles = $roles;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->users->all();
		return view('back.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles = $this->roles->lists('name', 'id');
		return view('back.users.create', compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$data = $request->all();
		$data['password'] = bcrypt($data['password']);
		$user = $this->users->create($data);
		$roles = $request->input('roles');
		$user->roles()->attach($roles);
		return redirect('/backend/users');
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
		$user = $this->users->findOrFail($id);
		$roles = $this->roles->lists('name', 'id');
		return view('back.users.edit', compact('user','roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$user = $this->users->findOrFail($id);
		$user->update($request->all());
		$roles = $request->input('roles');
		$user->roles()->sync((array) $roles);
		return redirect('/backend/users');
	}

	public function getDelete($id)
	{
		$user = $this->users->findOrFail($id);
		return view('back.users.delete', compact('user'));
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = $this->users->findOrFail($id);
		$user->delete();
		return redirect('/backend/users');
	}

}
