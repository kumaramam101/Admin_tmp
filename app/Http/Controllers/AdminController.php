<?php

namespace App\Http\Controllers;
use App\Models\adminModel;
use Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminController extends Controller
{
    public function login(){
        $p['showHeader'] = false;
        $p['showSidebar'] = false;
        $p['showFooter'] = false;
        $p['body'] = 'Admin.login';
        return view('layout.index',$p);
    }
    public function dologin(Request $request)
    {
        //if(isset($_POST)){
            //print_r($_POST);die;
            $user = new adminModel;
            $tblName = "tbl_user";
            $wherekey = "tbl_user.email";
            $wherevalue = $_POST['email'];
            $pass = $_POST['pass'];
            $res = $user->getSingleData($tblName, $wherekey, $wherevalue); //print_r($res);die;
            if(count($res) > 0){
                if($res[0]->isTrashed == 1){
                    $data['status'] = 0;
                    $data['massage'] = "We couldn't find your account !!";
                }else{
                    if(Hash::check($pass, $res[0]->password)){
                        $session['id'] = $res[0]->uniquId;
                        $session['first_name'] = $res[0]->first_name;
                        $session['last_name'] = $res[0]->last_name;
                        $session['email'] = $res[0]->email;
                        $session['password'] = $res[0]->password;
                        $session['phone'] = $res[0]->phone;
                        $session['role'] = $res[0]->user_type;
                        session()->put($session);
                        $data['status'] = 1;
                        $data['massage'] = "You are Logedin successfully.";
                    }else{
                        $data['status'] = 2;
                        $data['massage'] = 'Your Password is Not Matched !!';
                    }
                }
            }else{
                $data['status'] = 0;
                $data['massage'] = "We couldn't find your account !!";
            }
            echo json_encode($data);
        //}
    }
    public function logout()
    {
        session()->forget('email');
        session()->flush();
        Session::flush();
        return redirect('');
    }
    public function users()
    {
        $users = new adminModel();
        $tblName = "tbl_user";
        $p['userlist'] = $users->getAlldata($tblName);
        $p['showHeader'] = true;
        $p['showSidebar'] = true;
        $p['showFooter'] = true;
        $p['body'] = 'Admin.users';
        return view('layout.index',$p);
    }
    public function addUser()
    {
        $p['showHeader'] = true;
        $p['showSidebar'] = true;
        $p['showFooter'] = true;
        $p['body'] = 'Admin.addUser';
        return view('layout.index',$p);
    }
    public function addSaveUser(Request $request)
    {
        $user = new adminModel;
        $tblName = 'tbl_user';
        if(isset($_POST['user_type'])){
            $dt['user_type'] = $_POST['user_type'];
        }
        if(isset($_POST['fname'])){
            $dt['first_name'] = $_POST['fname'];
        }
        if(isset($_POST['lname'])){
            $dt['last_name'] = $_POST['lname'];
        }
        if(isset($_POST['email'])){
            $dt['email'] = $_POST['email'];
        }
        if(isset($_POST['phone'])){
            $dt['phone'] = $_POST['phone'];
        }
        if(isset($_POST['pass'])){
            $dt['password'] = Hash::make($_POST['pass']);
        }
        $dt['createOn'] = Carbon::now();
        $dt['isTrashed'] = 0;
        //print_r($dt);die;
        $isregistered = $user->checkUser($tblName, $dt['email']); //print_r($isregistered);
        if(count($isregistered) > 0){
            $data['status'] = 0;
            $data['type'] = "email";
            $data['massage'] = "Email you have entered is already exist.";
        }else{
            $resp = $user->insertUser($tblName, $dt);
            if($resp !=0){
                $data['status'] = 1;
                $data['type'] = "email";
                $data['massage'] = "user registered successfully.";
            }else{
                $data['status'] = 0;
                $data['type'] = "email";
                $data['massage'] = "something want wrong !!";
            }
        }
        echo json_encode($data);

    }
    public function profile(){
        $user = new adminModel;
        $tblName = "tbl_user";
        $wherekey = "tbl_user.email";
        $wherevalue = Session::get('email');
        $p['userdata'] = $user->getSingleData($tblName, $wherekey, $wherevalue); //print_r($res);die;
        $p['countries'] = DB::table('countries as ct')->select('ct.id','ct.name', 'ct.phonecode')->get(); //print_r($res);die;
        $p['showHeader'] = true;
        $p['showSidebar'] = true;
        $p['showFooter'] = true;
        $p['body'] = 'Admin.profile';
        return view('layout.index',$p);
    }
    public function updateProfile(){
        if(isset($all_details)){
            //print_r($_POST);die;
        }
        $dt = new adminModel;
        if(isset($_POST['countryId'])){
            $tblName = "states";
            $wherekey = "states.country_id";
            $wherevalue = $_POST['countryId'];
            $states = $dt->getSingleData($tblName, $wherekey, $wherevalue);
            $data['states'] = '<option value="">Select your State</option>';
            foreach ($states as $row) {
                $data['states'] .= '<option value="'.$row->id.'">'.$row->name.'</option>';
            }
        }
        if(isset($_POST['state_id'])){
            $tblName = "cities";
            $wherekey = "cities.state_id";
            $wherevalue = $_POST['state_id'];
            $cities = $dt->getSingleData($tblName, $wherekey, $wherevalue);
            $data['cities'] = '<option value="">Select your City</option>';
            foreach ($cities as $row) {
                $data['cities'] .= '<option value="'.$row->id.'">'.$row->name.'</option>';
            }
        }

        if(isset($_POST['currentpass'])){
            $pass = Session::get('password');
            if (Hash::check($_POST['currentpass'], $pass)) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }
        }
        echo json_encode($data);
    }
}
