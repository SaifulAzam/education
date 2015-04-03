<?php namespace App\Http\Controllers\Api;

/**
 * Created by PhpStorm.
 * User: Tian
 * Date: 4/1/15
 * Time: 9:53 AM
 */

use App\Http\Requests;
use App\Repositories\Article\ArticleInterface;
use App\Repositories\Comment\CommentInterface;
use App\Repositories\Coupon\CouponInterface;
use App\Repositories\Lesson\LessonInterface;
use App\Repositories\School\SchoolInterface;
use App\Repositories\Tutor\TutorInterface;
use Illuminate\Http\Request;
use Auth;

class CommentsController extends ApiController {

    protected $comments;
    protected $lessons;
    protected $schools;
    protected $tutors;
    protected $articles;
    protected $coupons;

    function __construct(CommentInterface $comments, LessonInterface $lessons, SchoolInterface $schools,
                         TutorInterface $tutors, ArticleInterface $articles, CouponInterface $coupons)
    {
        $this->comments = $comments;
        $this->lessons = $lessons;
        $this->schools = $schools;
        $this->tutors = $tutors;
        $this->articles = $articles;
        $this->coupons = $coupons;
    }

    public function index()
    {
        $this->data = $this->comments->paginate(10);
        return $this->paginate();
    }

    public function store(Request $request)
    {
        $comment = $this->comments->create($request->all());
        $tags = $request->input('tags');
        $comment->tags()->attach($tags);

        return $this->respondCreated('created');
    }

    public function destroy($id)
    {
        $comment = $this->comments->findOrFail($id);
        $comment->delete();

        return $this->respondDeleted('deleted');
    }


}