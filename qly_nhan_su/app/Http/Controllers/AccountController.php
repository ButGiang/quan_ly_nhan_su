<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Mail;
use Carbon\Carbon;
use App\Models\taikhoan;
use App\Http\Requests\ResetPassRequest;

class AccountController extends Controller {   

    public function index() {
        return view('Account.login', [
            'title' => '- Log in -'
        ]);
    }

    public function post_login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        // kiểm tra độ chính xác của tài khoản 
        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            // nếu đúng thông tin thì chuyển trang
            return redirect()->route('main');
        }

        // nếu sai thông tin thì hiện thông báo & trở lại
        Session::flash('error', 'Email hoặc Password không đúng!');
        return redirect()->back();
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getPass() {
        return view('Account.forgetPass', [
            'title' => 'Forget Password'
        ]);
    }

    public function post_getPass(Request $request) {
        $email = $request->input('email');
        $date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-y');
        $title_mail = 'Khôi phục mật khẩu cho tài khoản đồ ác thực tập '. $date;
        $user = taikhoan::where('email', '=', $email)->get();
        foreach($user as $item) {
            $user_id = $item->id;
        }

        if($user) {
            $count_user = $user->count();
            if($count_user == 0) {
                return redirect()->back()->with('error', 'Email này chưa được đăng ký tài khoản.');
            }
            else {
                $random_token = Str::random();
                $user = taikhoan::find($user_id);
                $user->user_token = $random_token;
                $user->save();  

                $link_reset_pass = url('/updatePass/'. $email. '/'. $random_token);
                $data = array(
                    'name' => $title_mail,
                    'body' => $link_reset_pass,
                    'email' => $email
                );
                
                Mail::send('Account.forgetPass_email', ['data' => $data], function($message) use ($title_mail, $data) {
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'], $title_mail);    
                });
                
                return redirect()->back()->with('success', 'Kiểm tra Email để đặt lại mật khẩu.');
            }
        }
    }

    public function updatePass($email, $token) {
        return view('Account.updatePass', [
            'title' => 'Update Password',
            'email' => $email,
            'token' => $token
        ]);
    }

    public function post_updatePass(Request $request) {
        $data = $request->all();
        $random_token = Str::random();
        $users = taikhoan::where('email', '=', $data['email'])->where('user_token', '=', $data['token'])->get();
        $count_user = $users->count();
        if($count_user > 0) {
            foreach($users as $user) {
                $user_id = $user->id;
            }
            $reset = taikhoan::find($user_id);
            $reset->password = Hash::make($data['password']);
            $reset->user_token = $random_token;
            $reset->save();
            
            if(Auth::check()) {
                Auth::logout();
            }

            return redirect('login')->with('success', 'Đã cập nhật mật khẩu mới.');
        }
        else {
            return redirect()->back()->with('error', 'Link đã quá hạn, vui lòng thử lại.');
        }
    }

}
