<?php namespace App\Http\Controllers\Api;

use App\Http\Requests\StudentsRequest;
use App\Repositories\Student\StudentInterface;
use App\Repositories\Tag\TagInterface;
use Illuminate\Http\Request;
use Auth;

class StudentsController extends ApiController {
    protected $tags;
    protected $students;

    function __construct(StudentInterface $students, TagInterface $tags)
    {
        $this->students = $students;
        $this->tags = $tags;

        $this->middleware('auth', ['on' => ['create', 'store']]);
    }

    /**
     * After Registration as a tutor, store complete info data
     *
     * @return Response
     */
    public function store(StudentsRequest $request)
    {
        $student = $this->students->create($request->all());
        Auth::user()->student()->save($student);
        Auth::user()->student_complete = 1;
        Auth::user()->save();
        $tags = $request->input('tags');
        $student->tags()->attach($tags);

        return $this->push(200, 20000, 'Student Profile Complete');
    }

}
