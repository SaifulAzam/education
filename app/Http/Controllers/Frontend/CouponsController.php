<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Comment\CommentInterface;
use App\Repositories\Coupon\CouponInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;

class CouponsController extends Controller {

	protected $coupons;
	protected $tags;
	protected $comments;

	function __construct(CouponInterface $coupons, TagInterface $tags, CommentInterface $comments)
	{
		$this->coupons = $coupons;
		$this->tags = $tags;
		$this->comments = $comments;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$coupons = $this->coupons->paginate(4);
		return view('front.coupons.index', compact('coupons'));
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

}
