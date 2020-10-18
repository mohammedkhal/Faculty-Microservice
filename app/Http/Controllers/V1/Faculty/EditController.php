<?php

namespace App\Http\Controllers\V1\Faculty;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Faculty\FacultyService;

class EditController extends Controller
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
     * Update an existing faculty
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $faculty_uuid)
    {
        $rules = [
            'name' => 'required|max:100',
            'initial_date' => 'required|date',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['faculty_uuid'] = $faculty_uuid;

        $faculty = $this->facultyService->update($data);

        if ($faculty->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->successResponse($faculty);
    }

    /**
     * Remove an existing faculty
     * @return Illuminate\Http\Response
     */
    public function destroy($faculty_uuid)
    {
        $data['faculty_uuid'] = $faculty_uuid;

        $faculty = $this->facultyService->destroy($data);

        return $this->successResponse($faculty);
    }
}
