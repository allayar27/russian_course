<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResponseRequest;
use App\Http\Resources\ResponseCollection;
use App\Http\Resources\ResponseItemResource;
use App\Http\Resources\ResponseResource;
use App\Models\Assignment;
use App\Models\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ResponseController extends Controller
{
    public function index(Response $response)
    {
        $this->authorize('viewAny',$response);
        return new ResponseCollection(Response::orderBy('created_at', 'DESC')->get());
    }

    public function show($id)
    {
        $response = Response::findOrFail($id);
        $this->authorize('view', $response);
        return response([new ResponseResource($response)],200);
    }



    public function store(ResponseRequest $request, Response $response)
    {
        $this->authorize('create', $response);

        $validated = $request->validated();
        if($request->file('file')){
            $fileName = $request->file('file')->getClientOriginalName();

        }
        Storage::putFileAs('/public', $request->file('file'), $fileName);
        $validated['file'] = $fileName;
        $create = Response::create($validated);
        if ($create){
            return \response([$create],201);
        }

    }

    public function update(ResponseRequest $request, $id)
    {
        $response = Response::find($id);
        $this->authorize('update', $response);

        $validated = $request->validated();
        if ($request->has('file')){
            $fileName = $request->file('file')->getClientOriginalName();
        }
        Storage::putFileAs('/public', $request->file('file'), $fileName);

        $validated['file'] = $fileName;

        $update = Response::where('id', $id)->update($validated);

        return \response([
            'message' => 'updated successfully!'
        ],200);

    }

    public function destroy($id)
    {
       $response = Response::findOrFail($id);
        $this->authorize('delete', $response);
        $delete = Response::where('id', $id)->delete();
        if ($delete){
            return \response([
                'message' => 'response deleted successfully!'
            ],200);
        }

    }
}
