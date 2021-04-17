<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class users extends Controller
{


    public function user(Request $request)
    {
        $name = $request->input('first_name');
        $age= $request->input('age');
        $email=$request->input('email');
        $dob=$request->input('dob');
        return view('profilephp',['name'=>$name,'age'=>$age,'email'=>$email,'dob'=>$dob]);

    }
}
