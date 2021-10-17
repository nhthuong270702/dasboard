<?php
namespace App\Services;

use App\Http\Requests\UserUpdate;
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
    public function updateUser(UserUpdate $request,$id){
        $user = User::find($id);
        return $user->update($request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]));
    }

    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}
