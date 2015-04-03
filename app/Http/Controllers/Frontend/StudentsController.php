<?php namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Student\StudentInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;
use Auth;

class StudentsController extends Controller {
    protected $tags;
    protected $students;

    function __construct(StudentInterface $students, TagInterface $tags)
    {
        $this->students = $students;
        $this->tags = $tags;

        $this->middleware('auth', ['on' => ['create', 'store']]);
    }

    /**
     * Show the complete_info page
     *
     * @return Response
     */

    public function create()
    {
        $tag = $this->tags->lists('name', 'id');
        return view('auth.student_complete', compact('tag'));
    }

    /**
     * After Registration as a tutor, store complete info data
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $student = $this->students->create($request->all());
        $tmp = Auth::user()->student()->save($student);
        Auth::user()->student_complete = 1;
        Auth::user()->save();
        $tags = $request->input('subject');
        $tmp->tags()->attach($tags);

        return redirect('/home');
    }

}
