<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();
        $data["password"] =  bcrypt($request-> get('password'));
        if(User::create($data)){
            return redirect('login');
        }else{
            return back()->withInput()->with('thongbao1',"Mật khẩu và xác nhận mật khẩu không giống nhau.");
        }
    }
    /**
     * login api
     */
    public function getlogin(){
        return view('login');
    }
    public function login(UserLoginRequest $request){
        $validated = $request->validated();
        if(Auth::attempt($validated)){
            return redirect('/dashboard');
        }else{
            return back()->withInput()->with('thongbao','Email hoặc mật khẩu không đúng.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
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
     public function update(UserUpdateRequest $request, $id)
     {
         $this->user->updateUser($request, $id);
         return redirect()->route('user.list');
     }
    public function detroy($id)
    {
        $this->user->deleteUser($id);

        return redirect()->route('user.list');
    }
    //xoa cac checkbox
    public function deleteall(Request $request)
    {
        $this->user->deleteall($request);
        return response()->json(['success'=>'thanh cong']);
    }
    //khoi phuc cac tep da xoa
    public function restore(Request $request)
    {
        $this->user->restore($request);
        return redirect()->route('user.list');
    }
}
