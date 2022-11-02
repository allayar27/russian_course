<?php

namespace App\Services;

use App\Http\Requests\AssignmentRequest;
use App\Http\Resources\AssignmentCollection;
use App\Http\Resources\AssignmentResource;
use App\Models\Assignment;
use App\Services\Contracts\AssignmentContract;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Storage;

class AssignmentService implements AssignmentContract
{
    use ApiResponser;

    public function get()
    {
        $assignment = Assignment::orderBy('created_at', 'DESC')->get();
        return new AssignmentCollection($assignment);
    }

    public function show($id)
    {
        $assignment = Assignment::findOrFail($id);
        return new AssignmentResource($assignment);
    }

    public function search($title)
    {
        $result = Assignment::where('title', 'LIKE', '%'. $title .'%')->get();

        if(count($result)){
            return $this->success($result,'found',200);
        }
        else {
            return $this->error('No Data not found',404);
        }
    }

    public function create()
    {
        $request = new AssignmentRequest();
        $validated = $request->validated();

        if ($request->has('file')){
            $file = $validated['title'].'.'.$request->file('file')->getClientOriginalExtension();
        }
        Storage::putFileAs('/public/files', $request->file('file'), $file);
        $validated['file'] = $file;
        $create = Assignment::create($validated);
        if (!$create){
            return $this->error('creating process is failed!',401);
        }
        return $this->success($create,'created successfully',201);

    }

    public function update($id)
    {
        $request = new AssignmentRequest();
        $validated = $request->validated();

        if ($request->has('file')){
            $file = $validated['title'].'.'.$request->file('file')->getClientOriginalExtension();
            $validated['file'] = $file;
        }
        $update = Assignment::where('id', $id)->update($validated);

        if(!$update) {
            return $this->error('not updated!',401);
        }
        return $this->success($update, 'updated successfully', 200);
    }

    public function delete($id)
    {
        $delete = Assignment::where('id', $id)->delete();
        if (!$delete) {
            return $this->error('not deleted!',401);
        }
        return $this->success($delete,'Assignment deleted successfully!',200);
    }
}
