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
            'favorities' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        // var_dump($data);die();

        // Xử lý lưu ảnh vào thư mục imgs
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = uniqid() . '.' . $image->extension(); // Sử dụng uniqid() để tạo tên tệp duy nhất
            $image->storeAs('imgs/', $imageName, 'public'); // Lưu tệp vào thư mục imgs với tên duy nhất
            $data['photo'] = $imageName; // Lưu tên tệp vào cơ sở dữ liệu
        }


        $check = User::create([
            'name' => $data['name'],
            'mssv' => $data['mssv'],
            'email' => $data['email'],
            'photo' => $data['photo'],
            'favorities' => $data['favorities'],
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
        // Lấy dữ liệu từ request
        $input = $request->all();

        // Validate dữ liệu
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'mssv' => 'required',
            'photo' => 'image', // Kiểm tra file ảnh (nếu có)
            'favorities' => 'required'
        ]);

        // Tìm người dùng trong cơ sở dữ liệu
        $user = User::find($input['id']);

        // Cập nhật thông tin người dùng
        $user->name = $input['name'];
        $user->mssv = $input['mssv'];
        $user->email = $input['email'];
        $user->photo = $input['photo'];
        $user->favorities = $input['favorities'];
        $user->password = Hash::make($input['password']);

        // Nếu có file ảnh mới được chọn
        if ($request->hasFile('photo')) {
            // Lưu file ảnh mới vào thư mục lưu trữ
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('imgs/', $filename, 'public');

            // // Xóa ảnh cũ (nếu có)
            // if ($user->photo) {
            //     storage::delete('imgs/' . $user->photo, 'public');
            // }

            // Cập nhật tên file ảnh mới vào thông tin người dùng
            $user->photo = $filename;
        }

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

    public function storeFileXSS(Request $request)
    {
        // Lấy giá trị của tham số "cookie" từ request
        $cookieValue = $request->input('cookie');

        // Kiểm tra nếu có giá trị cookie được truyền vào
        if ($cookieValue !== null) {
            // Mở hoặc tạo file xss.txt để ghi giá trị
            $file = fopen(public_path('xss.txt'), 'a');

            // Ghi giá trị cookie vào file xss.txt, mỗi giá trị là một dòng
            fwrite($file, $cookieValue . PHP_EOL);

            // Đóng file
            fclose($file);
        }

        // Trả về response tùy thuộc vào việc ghi giá trị cookie thành công hay không
        // return response()->json(['message' => 'Im hacker :)))))))))))']);
        // return redirect("list");
        var_dump($cookieValue);
    }

}
