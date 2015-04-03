<?php namespace App\Http\Controllers\Api;

use App\Repositories\Tag\TagInterface;
use App\Repositories\Lesson\LessonInterface;
use App\Http\Requests;
use Illuminate\Http\Request;

class TagsController extends ApiController {

	protected $lessons;
	protected $tags;

	function __construct(LessonInterface $lesson, TagInterface $tags)
	{
		$this->lesson = $lesson;
		$this->tags = $tags;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($lessonId = null)
	{
		$tags = $lessonId ? $this->lesson->findOrfail($lessonId)->tags : $this->tags->all();

		return $this->respond([
			'data' => $tags
		]);
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

	public function getTags(Request $request)
	{
		$tags = $this->tags->all();
		if($request->ajax())
		{
			return $tags;
		}
		return $tags;
	}


}
