<?php namespace App\Http\Controllers\Api;

use App\Http\Requests\CouponsRequest;
use App\Repositories\Comment\CommentInterface;
use App\Repositories\Coupon\CouponInterface;
use App\Repositories\School\SchoolInterface;
use App\Repositories\Subject\SubjectInterface;
use App\Repositories\Tag\TagInterface;
use App\Repositories\Tutor\TutorInterface;
use Illuminate\Http\Request;
use Auth;

class CouponsController extends ApiController {

	protected $coupons;
	protected $tags;
	protected $comments;
	protected $schools;
	protected $tutors;
	protected $subjects;

	function __construct(CouponInterface $coupons, TagInterface $tags, CommentInterface $comments,
						 SchoolInterface $schools, TutorInterface $tutors, SubjectInterface $subjects)
	{
		$this->coupons = $coupons;
		$this->tags = $tags;
		$this->comments = $comments;
		$this->tutors = $tutors;
		$this->schools = $schools;
		$this->subjects = $subjects;

		$this->middleware('auth', ['only' => 'store']);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data = $this->coupons->paginate(10);
		return $this->paginate();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$coupon = $this->coupons->findOrFail($id);
		return view('front.coupons.show', compact('coupon'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CouponsRequest $request)
	{
		$coupon = $this->coupons->create($request->all());
		$tags = $request->input('tags');
		$coupon->tags()->attach($tags);

		$tutor_id = $request->input('tutor_id');
		if($tutor_id)
		{
			$tutor = $this->tutors->find($tutor_id);
			if (!$tutor)
			{
				return $this->notFound('Tutor does not exist');
			}
			$subject_id = $request->input('subject_id');
			if($subject_id)
			{
				$subject = $this->subjects->find($subject_id);
				if(!$subject)
				{
					return $this->notFound('Subject does not exist');
				}
				$subject->coupons()->save($coupon);
			}
			$tutor->coupons()->save($coupon);
		}

		$school_id = $request->input('school_id');
		if($school_id)
		{
			$school = $this->schools->find($school_id);
			if(!$school)
			{
				return $this->notFound('School does not exist');
			}
			$subject_id = $request->input('subject_id');
			if($subject_id)
			{
				$subject = $this->subjects->find($subject_id);
				if(!$subject)
				{
					return $this->notFound('Subject does not exist');
				}
				$subject->coupons()->save($coupon);
			}
			$school->coupons()->save($coupon);
		}
		return $this->push(200, 20000, 'Coupon Created');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CouponsRequest $request)
	{
		$coupon = $this->coupons->find($id);
		if (!$coupon)
		{
			return $this->notFound('Coupon does not exist');
		}
		$coupon->update($request->all());
		$tags = $request->input('tags');
		$coupon->tags()->sync((array) $tags);

		return $this->push(200, 20000, 'Coupon Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$coupon = $this->coupons->find($id);
		if (!$coupon)
		{
			return $this->notFound('Coupon does not exist');
		}
		$coupon->delete();

		return $this->push(200, 20000, 'Coupon Deleted');
	}

	/**
	 * Post Comments
	 *
	 * @return Response
	 */

	public function postComment($id, Request $request)
	{
		$coupon = $this->coupons->find($id);
		if (!$coupon)
		{
			return $this->notFound('Coupon does not exist');
		}
		$comment = $this->comments->create($request->all());

		Auth::user()->comments()->save($comment);

		$coupon->comments()->save($comment);

		return $this->push(200, 20000, 'Comment Created');
	}

}
