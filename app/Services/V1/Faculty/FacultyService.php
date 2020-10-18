<?php

namespace App\Services\V1\Faculty;

use App\Repositories\V1\Faculty\FacultyRepository;

class FacultyService
{
    private $facultyRepository;

    /**
     * Create a new Repository instance.
     * @return void
     */
    public function __construct(FacultyRepository $facultyRepository)
    {
        $this->facultyRepository = $facultyRepository;
    }

    /**
     * Return the list of facultys
     * @return App\Models\V1\Faculty
     */
    public function index()
    {
        return $this->facultyRepository->index();
    }

    /**
     * Update an existing faculty
     * @return App\Models\V1\Faculty
     */
    public function update($data)
    {
        return $this->facultyRepository->update($data);
    }

    /**
     * Remove an existing faculty
     * @return App\Models\V1\Faculty
     */
    public function destroy($data)
    {
        return $this->facultyRepository->destroy($data);
    }

    /**
     * Create one new faculty
     * @return App\Models\V1\Faculty
     */
    public function store($data)
    {
        return $this->facultyRepository->store($data);
    }

    /**
     * Obtains and show one faculty
     * @return App\Models\V1\Faculty
     */
    public function show($data)
    {
        return $this->facultyRepository->show($data);
    }
}
