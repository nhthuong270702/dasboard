<?php
namespace App\Services;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UserService
{
    protected $user = null;

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    //sua
    public function updateUser(UserUpdateRequest $request,$id){
        $user = User::find($id);
        return $user->update($request->validated());
    }

    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}
