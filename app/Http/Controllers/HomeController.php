<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Docter;
use App\Models\Appointment;


class HomeController 
{

    public function index(){
        
        
        if(Auth::id()){
            return redirect('home');
        }
        else
        {
                $docters = Docter::all();
            
                return view('user.home', compact('docters'));
        }
    }

    public function redirect(){
        if(Auth::id())
        {
            if(Auth::user()->usertype == '0')
            {
                $docters = Docter::all();
                return view('user.home', compact('docters'));
            }else{

                return view('admin.home');
            }
        }
        else
        {
            return 'helo world';
            return redirect()->back();
        }
    }

    public function appointment(){
        $data = new Appointment;

        $data->name = request()->name;

        $data->email = request()->email;

        $data->phone = request()->phone;

        $data->docter = request()->docter;

        $data->date = request()->date;

        $data->message = request()->message;

        $data->status = 'in Progress';

        if(Auth::id())
        {

            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Your appointment Added Successfully. Our team will be Contact You Soon. Thank you for choosing Us...!');
    }

    public function myappointment(){

        $userid = Auth::user()->id;

        $appointment = Appointment::where('user_id',$userid)->get();
        return view('user.myappointment',compact('appointment'));
    }

    public function cancelappointment($id){
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back()->with('message','Your appointment Deleted Successfully...!');

    }
}
