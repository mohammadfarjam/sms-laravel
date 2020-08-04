<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\UserTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('Frontend.home.index');
    }


    public function save(Request $request)
    {
        $code = rand(100000, 999999);
        $new_user = new UserTest();
        $new_user->name = $request['name'];
        $new_user->phone = $request['phone'];
        $new_user->code_verify = $code;
        $new_user->save();



//        $sender = "1000596446";
//        $receptor = $request['phone'];
//        $message = " کد تایید اعتبار شما : $code ";
//        $api = new \Kavenegar \KavenegarApi("5A716F755653784C6E52712B4233646969464F3273426E39306A306262413354316D63634F3867756B70513D");
//        $api -> Send ( $sender,$receptor,$message);


        $id = $new_user->id;
        $this->verify($id);
        return redirect()->route('verify.code', [$id]);
    }

    public function verify($id)
    {
        return view('Frontend.home.verify_code', compact('id'));
    }


    public function verifycode(Request $request)
    {
//        return $request->all();
        $recive_code = $request['accept_code'];
        $id_user = $request['id'];
        $find_user = UserTest::findorfail($id_user);

        if ($find_user->active==1 && $recive_code = $find_user->code_verify){
            Session::flash('used_code','این کد قبلا استفاده شده است!!! ');
            return back();

        }else {

            if ($recive_code == $find_user->code_verify) {
                $find_user->active = '1';
                $find_user->save();
            } else {
                Session::flash('notmatch', 'کد وارد شده صیحیح نیست');
                return back();
            }
        }


    }
}
