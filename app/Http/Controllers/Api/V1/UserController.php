<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Filters\UserFilter;
use Illuminate\Http\Request;
use App\Http\Resources\V1\UserResource;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
            'success' => true,
            'message' => 'Successful operation',
            'data' => new UserResource($user)
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        return response()->json([
            'success' => true,
            'created' => new UserResource($user)
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $filter = new UserFilter();
        $queryItems = $filter->transform($request);
        $galery = User::where($queryItems)->get();

        if($galery->isEmpty())
        {
            return response()->json(['error'=> 'NO se encontraron datos'],404);

        }
        return response()->json(['data' => new UserResource($galery)],200);
    }

    public function showId($id)
    {
        $user = User::find($id);
        return response()->json([
            'success' => true,
            'data' => new UserResource($user)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user=  User::find($id);
        $user->user_name = $request->user_name;
        $user->user_telephone = $request->user_telephone;
        $user->user_email = $request->user_email;
        $user->user_birth_date =$request->user_birth_date;
        $user->user_status = $request->user_status;
        $user->user_photo = $request->user_photo;
        $user->save();

        return response()->json([
            'success' => true,
            'updated' =>  new UserResource($user)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return response()->json([
            'eliminated' => new UserResource($user),
            'success' => true
        ],200);
    }
}
