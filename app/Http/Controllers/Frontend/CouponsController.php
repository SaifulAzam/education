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
		$coupons = $this->coupons->all();
		$tags = $this->tags->all();
		return view('front.coupons.index', compact('tags', 'coupons'));
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
