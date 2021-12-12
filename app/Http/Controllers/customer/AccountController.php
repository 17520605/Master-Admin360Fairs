<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profileAuth = DB::table('profile')->where('userId', $user->id)->first();

        $users = \App\Models\User::where('type', '=', \App\Models\User::TYPE_SPEAKER) 
        ->orWhere('type', '=', \App\Models\User::TYPE_PARTNER) 
        ->orWhere('type', '=', \App\Models\User::TYPE_MASTERADMIN) 
        ->orWhere('type', '=', \App\Models\User::TYPE_TOURADMIN)->get();
        foreach ($users as $user) {
            $profile = DB::table('profile')->where('userId', $user->id)->first();
            $users->profile = $profile;
        }
        return view('customer.accounts.index',['users' => $users,'profile'=>$profile,'profileAuth'=>$profileAuth]);
    }

    public function saveCreate(Request $request)
    {   
        $name = $request->name;
        $contact = $request->contact;
        $email = $request->email;
        $type = $request->type;
        
        $check = $this->checkCreate($name,  $email, $contact ,$type);
        if($check['success'] == true){
            $profile = \App\Models\Profile::with('user')->where('email', $email)->first();
            if(!isset($profile )){ // chua có tài khoản
                // tao user
                $user = new \App\Models\User();
                $user->type =  $type;
                $user->email = $email;

                $user->isRequiredChangePassword = true;
                $user->save();
                // tao profile
                $profile = new \App\Models\Profile();
                $profile->userId = $user->id;
                $profile->name = $name;
                $profile->email = $email;
                $profile->contact = $contact;
                $profile->save();
            }

            return redirect('/clients');
        }
        
        return json_encode($check);
    }
    public function checkCreate($name, $email , $contact, $type)
    {   
        $check = [];
        $check['success'] = true;
        $check['errors'] = array();

        if($name == "" && $email == "" && $email == "" && $type == "" ){
            $check['errors'] = "Incorrect values or format";
            return $check;
        }

        if(!isset($name) || $name == "" || !isset($email) || $email == "" || !isset($contact) || $contact == "")
        {
            $check['errors'] = "Incorrect values or format";
            return $check;
        }
        return $check;
    }

}
