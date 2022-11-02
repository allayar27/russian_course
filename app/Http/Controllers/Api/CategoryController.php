<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $this->authorize('viewAny', $category);
        return new CategoryCollection(Category::orderBy('created_at', 'DESC')->get());
    }

    public function show($id, Category $category)
    {
        $this->authorize('view', $category);
        $category = Category::findOrFail($id);
        return response([new CategoryResource($category)],200);
    }



    public function create(CategoryRequest $request, Category $category){
        $this->authorize('create', $category);
        $validated = $request->validated();
        $create = Category::create($validated);
        return response([$create],201);
    }

    public function update(CategoryRequest $request, $id, Category $category)
    {
        $this->authorize('edit', $category);
        $validated = $request->validated();
        $update = Category::where('id', $id)->update($validated);
        if ($update){
            return response([
                'message' => 'updated successfully!'
            ],200);
        }

    }

    public function destroy($id, Category $category)
    {
        $this->authorize('delete', $category);
        $delete= Category::where('id', $id)->delete();
        if($delete){
            return response([
                'message' => 'deleted'
            ], 200);
        }

    }
}
