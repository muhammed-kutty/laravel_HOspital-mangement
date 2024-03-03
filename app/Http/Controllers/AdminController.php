<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docter;
use App\Models\Appointment;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.adddocts');
    }

    public function upload_docts(){

        $docter = new Docter;

        $image = request()->file;
        $imagename=time().'.'.$image->getClientOriginalExtension(); 
        request()->file->move('docterimage',$imagename);
        $docter->image=$imagename;

        $docter->doct_name=request()->doct_name;
        $docter->phone=request()->phone_num;
        $docter->speciality=request()->speciality;
        $docter->room=request()->room;

        $docter->save();


        return  redirect()->back()->with('message','Docter added Successfully!!!');
    }

    public function showappointments(){

        $data = Appointment::all(); 
        return view('admin.showappointments',compact('data'));
    }

    public function approveappointments($id){
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();

        return  redirect()->back()->with('message','Appointment Approved Successfully!!!');

    }

    public function deleteappointments($id){
        $data = Appointment::find($id);
        $data->status = 'canceled';
        $data->save();
        return redirect()->back()->with('message','The Appointment Canceled Successfully...!');
    }

    public function docters(){

        $data = Docter::all();

        return view('admin.alldocters',compact('data'));
    }

    public function deletedocters($id){

        $data = Docter::find($id);
        if(!empty($data)){
            Storage::delete('docterimage/',$data->image);
        }
        $data->delete();
        return redirect()->back()->with('message','The Docter Deleted Successfully...!');

    }
    public function editdocters($id){

        $data = Docter::find($id);
        
        return view('admin.updatedocts',compact('data'));

    }

    public function updatedocters($id){
        $docter = Docter::find($id);

        if($docter->image){

            Storage::delete('docterimage/',$docter->image);

            $image = request()->file;
            $imagename=time().'.'.$image->getClientOriginalExtension(); 
            request()->file->move('docterimage',$imagename);
            $docter->image=$imagename;
        }elseif(request()->hasFile('file')){

            $image = request()->file;
            $imagename=time().'.'.$image->getClientOriginalExtension(); 
            request()->file->move('docterimage',$imagename);
            $docter->image=$imagename;
        }

        $docter->doct_name=request()->doct_name;
        $docter->phone=request()->phone_num;
        $docter->speciality=request()->speciality;
        $docter->room=request()->room;

       $docter->save();
       return redirect()->back()->with('message','The Docter Updated Successfully...!');


    }
}