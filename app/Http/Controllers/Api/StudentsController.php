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

    public function index()
    {
        $owner = Input::get('owner');
        if(empty($owner))
        {
            return $this->respondWithError('Empty Owner');
        }
        $owner = Crypt::decrypt($owner);
        list($owner_type, $owner_id) = explode('.', $owner);
        $owner = $owner_type::findOrFail($owner_id);
        $this->data = $owner->students()->latest('created_at')->paginate(5);
        return $this->paginate();
    }

    /**
     * After Registration as a student, store complete info data
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
