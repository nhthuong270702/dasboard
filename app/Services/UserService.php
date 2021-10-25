<?php
namespace App\Services;

use App\Http\Requests\UserUpdateRequest;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> ab87e36 ('update')
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
    //deleteall
    public function deleteall(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id', $ids)->delete();
    }
    //khoi phuc cac tep da xoa
    public function restore(Request $request)
    {
        User::onlyTrashed()->restore();
    }
}
