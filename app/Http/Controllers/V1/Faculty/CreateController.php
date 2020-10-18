<?php

namespace App\Http\Controllers\V1\Faculty;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Faculty\FacultyService;

class CreateController extends Controller
{
    use ApiResponser;
    private $facultyService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(FacultyService $facultyService)
    {
        $this->facultyService = $facultyService;
    }

    /**
     * Create one new author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'initial_date' => 'required|date',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $lecturer = $this->facultyService->store($data);

        return $this->successResponse($lecturer, Response::HTTP_CREATED);
    }
}
