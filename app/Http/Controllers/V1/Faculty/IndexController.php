<?php

namespace App\Http\Controllers\V1\Faculty;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Services\V1\Faculty\facultyService;

class IndexController extends Controller
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
     * Return the list of facultys
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $facultys = $this->facultyService->index();

        return $this->successResponse($facultys);
    }

    /**
     * Obtains and show one faculty
     * @return Illuminate\Http\Response
     */
    public function show($faculty_uuid)
    {
        $data['faculty_uuid'] = $faculty_uuid;
        $faculty = $this->facultyService->show($data);

        return $this->successResponse($faculty);
    }
}
