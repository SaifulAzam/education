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
	public function index()
	{
		$this->data = $this->tags->all();
		return $this->push();
	}

	/**
	 * Store the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function store($id)
	{
		//
	}



}
