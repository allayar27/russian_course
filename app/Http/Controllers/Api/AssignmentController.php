<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Services\Contracts\AssignmentContract;

class AssignmentController extends Controller
{
    public function index(Assignment $assignment, AssignmentContract $assignmentContract)
    {
        $this->authorize('viewAny', $assignment);
        return $assignmentContract->get();
    }

    public function show($id, Assignment $assignment, AssignmentContract $assignmentContract)
    {
        $this->authorize('view', $assignment);
        return $assignmentContract->show($id);
    }

    public function search($title, AssignmentContract $assignmentContract)
    {
        return $assignmentContract->search($title);
    }

    public function create(Assignment $assignment, AssignmentContract $assignmentContract)
    {
        $this->authorize('create', $assignment);
        return $assignmentContract->create();
    }

    public function update($id, Assignment $assignment, AssignmentContract $assignmentContract)
    {
        $this->authorize('edit', $assignment);
        return $assignmentContract->update($id);
    }

    public function destroy($id, Assignment $assignment, AssignmentContract $assignmentContract)
    {
        $this->authorize('delete', $assignment);
        return $assignmentContract->delete($id);
    }
}
