<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Tag\TagInterface;
use App\Repositories\Coupon\CouponInterface;
use App\Repositories\School\SchoolInterface;
use Illuminate\Http\Request;

class CouponsController extends Controller {
	protected $tags;
	protected $coupons;
	protected $schools;

	function __construct(TagInterface $tags, CouponInterface $coupons, SchoolInterface $schools)
	{
		$this->tags = $tags;
		$this->coupons = $coupons;
		$this->schools = $schools;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$coupons = $this->coupons->all();
		return view('back.coupons.index', compact('coupons'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$school_names = $this->getSchoolName();
		return view('back.coupons.create', compact('school_names'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//calculating discount
		$data = $request->all();
		$discount = 100 * $request->input('coupon_price')/$request->input('original_price');
		$data = array_add($data, 'discount', $discount);
		$school_name = $request->input('school_names');
		$school = $this->schools->findOrFail($school_name[0]+1);
		$coupon = $this->coupons->create($data);
		$school->coupons()->save($coupon);
		$tags = $request->input('tag_list');
		$coupon->tags()->attach($tags);
		$coupon->school()->associate($school);
		return redirect('/backend/coupons');
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
		$coupon = $this->coupons->findOrFail($id);
		$school_name = $coupon->school->name;
		return view('back.coupons.edit', compact('coupon', 'school_name'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$coupon = $this->coupons->findOrFail($id);
		$data = $request->all();
		$discount = 100 * $request->input('coupon_price')/$request->input('original_price');
		$data = array_add($data, 'discount', $discount);
		$coupon->update($data);
		$tags = $request->input('tag_list');
		$coupon->tags()->sync((array) $tags);
		return redirect('/backend/coupons');
	}

	public function getDelete($id)
	{
		$coupon = $this->coupons->findOrFail($id);
		return view('back.coupons.delete', compact('coupon'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$coupon = $this->coupons->findOrFail($id);
		$coupon->delete();
		return redirect('/backend/coupons');
	}

	public function getSchoolName()
	{
		$schools = $this->schools->all()->toArray();
		$names = array_fetch($schools, 'name');
		return $names;
	}

}
