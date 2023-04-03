<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return UserCollection
     */
    public function index() 
    {
        return new UserCollection(User::paginate(25));
    }

    /**
     * Store a newly created user in storage.
     * 
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request) : Response
    {
        $request['password'] = Hash::make($request['password']);
        return response(
            User::create($request->all()), 
            201
        );
    }

    /**
     * Display the specified user.
     * 
     * @param User $user
     * @return UserResource
     */
    public function show(User $user) : UserResource
    {
        return new UserResource($user);
    }

    /**
     * Update the specified user in storage.
     * 
     * @param UserRequest $request
     * @param User $user
     * @return User
     */
    public function update(UserRequest $request, User $user) : User
    {
        $user->update($request->all());
        return $user;
    }

    /**
     * Remove the specified user from storage.
     * 
     * @param User $user
     * @return array
     */
    public function destroy(User $user) : array
    {
        $user->delete();
        return [];
    }

    public function login(Request $request) : Response
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $token = $request->user()->createToken($request->device_name);
            $success['name'] =  $user->name;
            $success['token'] = $token->plainTextToken;
   
            return response(
                $success
            );
        } 
        else{ 
            return response(
                'Unauthorised'
            );
        } 
    }
}
