<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use App\Models\Users;

class LoginController extends Controller {   

    public function index() {
        return view('Account.login');
    }

    public function check(Request $request) {
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

    public function recoverPass(Request $request) {
        $email = $request->input('email');
        $date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-y');
        $title_mail = 'Khôi phục mật khẩu cho tài khoản đồ ác thực tập '. $date;
        $user = Users::where('email', '=', $email)->get();
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
                $user = Users::find($user_id);
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

    public function updatePass() {
        return view('Account.updatePass');
    }

    public function post_updatePass(Request $request) {
        
    }
}
