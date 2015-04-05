<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Article\ArticleInterface;
use App\Repositories\Tag\TagInterface;


class ArticlesController extends Controller {

	protected $articles;
	protected $tags;

	function __construct(ArticleInterface $articles, TagInterface $tags)
	{
		$this->articles = $articles;
		$this->tags = $tags;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = $this->articles->paginate(5);
		return view('front.articles.index', compact('articles'));
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
		return view('front.articles.show', compact('article'));
	}


	public function filterByTag($id)
	{
		$tag = $this->tags->findOrFail($id);
		$articles = $tag->articles()->paginate(5);
		return view('front.articles.index', compact('articles'));
	}

}
