<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Article\ArticleInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller {

	protected $tags;
	protected $articles;

	function __construct(TagInterface $tags, ArticleInterface $articles)
	{
		$this->tags = $tags;
		$this->articles = $articles;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = $this->articles->all();
		return view('back.articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('back.articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$article = $this->articles->create($request->all());
		Auth::user()->articles()->save($article);
		$tags = $request->input('tag_list');
		$article->tags()->attach($tags);
		return redirect('/backend/articles');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = $this->articles->findOrFail($id);
		return view('back.articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = $this->articles->findOrFail($id);
		return view('back.articles.edit', compact('article'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$article = $this->articles->findOrFail($id);
		$article->update($request->all());
		$tags = $request->input('tag_list');
		$article->tags()->sync((array) $tags);
		return redirect('/backend/articles');
	}

	/**
	 * Delete page for the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function getDelete($id)
	{
		$article = $this->articles->findOrFail($id);
		return view('back.articles.delete', compact('article'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = $this->articles->findOrFail($id);
		$article->delete();
		return redirect('/backend/articles');
	}

}
