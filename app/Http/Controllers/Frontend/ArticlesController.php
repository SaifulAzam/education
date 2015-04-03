<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Article\ArticleInterface;
use App\Repositories\Comment\CommentInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller {

	protected $articles;
	protected $tags;
	protected $comments;

	function __construct(ArticleInterface $articles, TagInterface $tags, CommentInterface $comments)
	{
		$this->articles = $articles;
		$this->tags = $tags;
		$this->comments = $comments;

		$this->middleware('auth', ['only' => 'storeComment']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = $this->articles->paginate(5);
		$tags = $this->tags->all();
		return view('front.articles.index', compact('articles', 'tags'));
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

	public function storeComment($id, Request $request)
	{
		$article = $this->articles->findOrFail($id);
		$comment = $this->comments->create($request->all());

		Auth::user()->comments()->save($comment);

		$article->comments()->save($comment);

		flash()->overlay('评论成功！');

		return redirect()->back();
	}

	public function filterByTag($id)
	{
		$tag = $this->tags->findOrFail($id);
		$tags = $this->tags->all();
		$schools = $tag->articles()->paginate(5);
		return view('front.schools.index', compact('schools', 'tags'));
	}

}
