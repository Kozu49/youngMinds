<?php

namespace App\Repository\Configurations;

use App\Models\Configuration\Department;

class DepartmentRepository
{

    /**
     * @var Department
     */
    private $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    public function all()
    {
        $department = $this->department->orderBy('department_name', 'ASC')->get();
        return $department;
    }

    public function findById($id)
    {
        $department = $this->department->find($id);
        return $department;
    }
}
