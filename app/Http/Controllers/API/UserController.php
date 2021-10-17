<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\View;
use App\Services\UserService;

class UserController extends Controller
{
    public $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;

    }
    public function getRegister()
    {
        return view('register');
    }
    public function register(UserRegister $request)
    {
        $validated = $request->validated();
        $password = $validated['password'];
        $validated["password"] = bcrypt($validated["password"]);
        $user = User::create($validated);
        return redirect()->back()->with('thongbao',"Đăng kí không thành công.");
    }
    /**
     * login api
     */
    public function getlogin(){
        return view('login');
    }

    public function login(UserLogin $request){
        $validated = $request->validated();

        if(Auth::attempt($validated)){
            return redirect('/dashboard');
        }else{
            return redirect()->route('login')->with('thongbao',"Email hoặc mật khẩu không đúng.");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return View::make('pages.user.list', compact('users'));
    }
    public function create()
    {
        return View::make('pages.user.add');
    }
    public function show($id)
    {
        $user = $this->user->getUserById($id);
        return View::make('pages.user.update', compact('user'));
    }
     //cap nhat
     public function update(UserUpdate $request, $id)
     {
         $this->user->updateUser($request, $id);
         return redirect()->route('user.list');
     }
    public function detroy($id)
    {
        $this->user->deleteUser($id);

        return redirect()->route('user.list');
    }

}
