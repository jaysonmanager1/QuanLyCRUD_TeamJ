<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CrudUserController extends Controller
{
    /*
     *login page
     */
    public function login()
    {
        return view('auth.login');
    }
    /** User submit form login */
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    /** List of users */
    public function listUser()
    {
        if (Auth::check()) {
            $users = User::all();
            return view('auth.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    /**
     * Registration page
     */
    public function registration()
    {
        return view('auth.registration');
    }
    /**
     *Delete User
     */
    public function deleteUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }
    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mssv' => 'required',
            'email' => 'required|email|unique:users',
            'photo' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        // Xử lý lưu ảnh vào thư mục imgs
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = uniqid() . '.' . $image->extension(); // Sử dụng uniqid() để tạo tên tệp duy nhất
            $image->storeAs('imgs', $imageName, 'public'); // Lưu tệp vào thư mục imgs với tên duy nhất
            $data['photo'] = $imageName; // Lưu tên tệp vào cơ sở dữ liệu
        }


        $check = User::create([
            'name' => $data['name'],
            'mssv' => $data['mssv'],
            'email' => $data['email'],
            'photo' => $data['photo'],
            'password' => Hash::make($data['password'])
        ]);

        if ($check) {
            return redirect("registration")->with('Success', 'Đăng ký thành công');
        } else {
            return back()->withInput()->withErrors(['error' => 'Đã xảy ra lỗi khi đăng ký. Vui lòng thử lại.']);
        }
    }

    /** Update user detail */
    public function updateUser(Request $request)
    {
        // Lay id bang phuong thuc get
        $user_id = $request->get('id');
        // lenh tim id trong csdl ngan gon
        $user = User::find($user_id);
        // sau khi tim thay id theo phuong thuc tra ve
        // view va tao gia tri user
        return view('auth.update', ['user' => $user]);
    }

    public function postUpdateUser(Request $request)
    {
        // Kiểm tra dữ liệu
        $request->validate([
            'name' => 'required',
            'mssv' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Lấy id từ request
        $user_id = $request->get('id');

        // Tìm kiếm người dùng trong cơ sở dữ liệu
        $user = User::find($user_id);

        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            return redirect("list")->withError('User not found');
        }

        // Xử lý cập nhật ảnh vào thư mục imgs
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = uniqid() . '.' . $image->extension(); // Sử dụng uniqid() để tạo tên tệp duy nhất
            $image->storeAs('imgs', $imageName, 'public'); // Lưu tệp vào thư mục imgs với tên duy nhất
            $oldImage = $user->photo; // Lấy tên tệp ảnh cũ từ cơ sở dữ liệu
            $user->photo = $imageName; // Lưu tên tệp mới vào cơ sở dữ liệu
            // Xóa ảnh cũ sau khi đã cập nhật ảnh mới
            if ($oldImage) {
                Storage::disk('public')->delete('/storage/imgs/' . $oldImage);
            }
        }

        // Cập nhật thông tin người dùng
        $user->name = $request->get('name');
        $user->mssv = $request->get('mssv');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));

        // Lưu thông tin người dùng đã cập nhật
        $user->save();

        // Chuyển hướng về trang danh sách người dùng và hiển thị thông báo thành công
        return redirect("list")->withSuccess('User details have been updated');
    }

    /** View user detail */
    public function readUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('auth.read', ['user' => $user]);
    }
    // Signout
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        // Redirect to login page
        return redirect('login');
    }
}
