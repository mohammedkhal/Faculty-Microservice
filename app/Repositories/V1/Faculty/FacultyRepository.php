<?php

namespace App\Repositories\V1\Faculty;

use App\Models\V1\Faculty;
use App\Repositories\Repository;

class FacultyRepository extends Repository
{
    /**
     * Create a new Faculty instance.
     * @return object
     */
    public function getModel()
    {
        return new Faculty;
    }

    /**
     * Return the list of faculty
     * @return App\Models\V1\faculty
     */
    public function index()
    {
        $faculty = $this->getModel();

        $faculty = $faculty->whereStatus(Faculty::STATUS_ACTIVE)->get();

        return $faculty;
    }

    /**
     * Update an existing faculty
     * @return App\Models\V1\Faculty
     */
    public function update($data)
    {
        $faculty = $this->getModel();

        $faculty = $faculty->findOrFail($data['faculty_uuid'])->first();

        $faculty->name = $data['name'];
        $faculty->initial_date = $data['initial_date'];

        $faculty->save();

        return $faculty;
    }

    /**
     * Remove an existing faculty
     * @return App\Models\V1\Faculty
     */
    public function destroy($data)
    {
        $faculty = $this->getModel();

        $faculty = $faculty->findOrFail($data['faculty_uuid'])->first();
        $faculty->status = Faculty::STATUS_INACTIVE;

        $faculty->save();

        return $faculty;
    }

    /**
     * Create one new faculty
     * @return App\Models\V1\Faculty
     */
    public function store($data)
    {
        $faculty = $this->getModel();
       
        $faculty->name = $data['name'];
        $faculty->initial_date = $data['initial_date'];

        $faculty->save();

        return $faculty;
    }

    /**
     * Obtains and show one faculty
     * @return App\Models\V1\Faculty
     */
    public function show($data)
    {
        $faculty = $this->getModel();

        $faculty = $faculty->findOrFail($data['faculty_uuid'])->first();

        return $faculty;
    }
}
