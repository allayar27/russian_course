<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdditionalRequest;
use App\Http\Resources\AdditionalCollection;
use App\Http\Resources\AdditionalResource;
use App\Models\Additional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdditionalController extends Controller
{
    public function index(Additional $additional)
    {
        $this->authorize('viewAny', $additional);
        return new AdditionalCollection(Additional::orderBy('created_at', 'DESC')->get());
    }

    public function show($id, Additional $additional)
    {
        $this->authorize('view', $additional);
        $add = Additional::findOrFail($id);
        return response([new AdditionalResource($add)],200);
    }

    public function create(AdditionalRequest $request, Additional $additional)
    {
        $this->authorize('create', $additional);

        $validated = $request->validated();
        if ($request->hasFile('media')) {
            $media = $request->file('media')->getClientOriginalName();
        }
        Storage::putFileAs('/public', $request->file('media'), $media);
        $validated['media'] = $media;

        $create = Additional::create($validated);
        if($create){
            return response([
                $create
            ],201);
        }

    }

    public function update(AdditionalRequest $request, $id, Additional $additional)
    {
        $this->authorize('edit', $additional);

        $validated = $request->validated();
        if ($request->hasFile('media')) {
            $media = $request->file('media')->getClientOriginalName();
        }
        Storage::putFileAs('/public', $request->file('media'), $media);
        $validated['media'] = $media;

        $update = Additional::where('id', $id)->update($validated);
        if ($update){
            return response([
                'message' => 'updated successfully!'
            ],200);
        }

    }

    public function destroy($id, Additional $additional)
    {
        $this->authorize('delete', $additional);
        $delete = Additional::where('id', $id)->delete();
        if ($delete){
            return response([
                'message' => 'deleted succesfully!'
            ],200);
        }

    }
}
