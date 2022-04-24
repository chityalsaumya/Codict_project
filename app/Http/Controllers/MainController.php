<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;


class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function save(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'phone_number'=> 'required|numeric|unique:admins',
            'password'=>'required|min:5|max:12',
            'confirmpassword'=>'required|same:password'
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone_number = $request->phone_number;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if($save){
            return back()->with('success','New User has been successfuly added'); 
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }

    }
    function check(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);

        $userInfo = Admin::where('email','=',$request->email)->first();

        if(!$userInfo){
            return back()->with('fail',"we do not recognize your email address");
        }else{
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser',$userInfo->id);
                return redirect(('admin/homepage'));
            }else{
                return back()->with('fail','Incorrect password');
            }
        }


    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    function homepage()
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
        return view('admin.homepage',$data);
    }

    function send(Request $request){
        
        $request->validate([
            'fname'=>'required',
            'class'=>'required',
            'section'=> 'required',
        
        ]);


        $message = new Message;
        $message->fname = $request->fname;
        $message->class = $request->class;
        $message->section = $request->section;
        $send = $message->save();

        
        $messageInfo = Message::where('fname','=',$request->fname)->first();

        if(!$messageInfo){
            return back()->with('fail',"we do not recognize your email address");
        }else{
            
                $request->session()->put('LoggedUser',$messageInfo->id);
                return redirect(('admin/profile'));
           
        }
       
           

        if($send){
            
            return redirect('/admin/profile')->with('success', 'Added');
       
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
      

    }

  
    function profile()
    {
        $data = ['LoggedUserInfo'=>Message::where('id','=',session('LoggedUser'))->first()];
        return view('admin.profile',$data);
    }

 

    public function isOnline($site = "https://youtube.com")
    {
        if(@fopen($site, 'r')){
            return true;
        }else{
            return false;
        }
    }
    
}
