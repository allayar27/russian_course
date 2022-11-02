<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserItemResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('viewAny', $user);
        return new UserCollection(User::orderBy('created_at', 'DESC')->get());
    }

    public function show($id, User $user)
    {
        $this->authorize('view', $user);
        $user = User::findOrFail($id);
        return response([new UserResource($user)],200);
    }

    public function search($name){

        $result = User::where('name', 'LIKE', '%'. $name .'%')->get();

        if(count($result)){
            return response()->json($result);
        }
        else
        {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }

    public function create(UserRequest $request, User $user)
    {
        $this->authorize('create', $user);

        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $create = User::create($validated);
        if ($create){
            $create->assignRole('user');
            return \response([
                $create,
                'token' => $create->createToken('API Token')->plainTextToken,
            ],201);
        }
    }

    public function update(UserUpdateRequest $request, $id, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $update = User::where('id', $id)->update($validated);
        if(!$update){
            return \response('User id not found!',404);
        }
        return \response('Updated successfully!',200);
    }

    public function destroy($id, User $user)
    {
        $this->authorize('delete', $user);

        $delete = User::where('id', $id)->delete();
        if($delete){
            return \response([
                'message' => 'Deleted successfully!'
            ],200);
        }

    }
}
