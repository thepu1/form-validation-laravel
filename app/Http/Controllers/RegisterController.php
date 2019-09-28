<?php

namespace App\Http\Controllers;
use App\Register;
use Illuminate\Http\Request;


class RegisterController extends Controller
{


    protected function checkValidateRegister(Request $request){


        $this->validate($request,[
            'name' => 'required|regex:/(^([a-zA-Z _]+)(\d+)?$)/u|max:10|min:3',
            'email' => 'required',
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender' => 'required'
        ]);

    }
    public function register(Request $request){

       $this->checkValidateRegister($request);


        $image = $request->file('image');
        $image_ex = $image->getClientOriginalExtension();
        $imageName = date('YMDHis.').$image_ex;

        $directory = 'images/';

        $image->move($directory,$imageName);

        $register = new Register();
        $register->name     = $request->name;
        $register->email    = $request->email;
        $register->image    = $directory.$imageName;
        $register->gender   = $request->gender;
        $register->save();
        return redirect('/home')->with('message','Successfull Save');
    }
}
