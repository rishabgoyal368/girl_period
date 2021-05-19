<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Admin;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {
        return view('Admin.index');
    }
    //----------------------------------update adminprofile------------------------------------------

    public function update(Request $request)
    {
        // return ($request->all());
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('admin.adminprofile');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $request->all();
            $validator =  Validator::make($data, [
                'name' =>  'required',
                'email' => 'required|email',
                'phone_number' => 'required|numeric',
                'image' => $data['id'] ? 'nullable' : 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }
            if ($request->image) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
                $data['profile_pic'] = $fileName;
            } else {
                $fileName = Admin::where('id', $request->id)->value('profile_pic');
                $data['profile_pic'] = $fileName;
            }
            // return $data;
            Admin::Updates($data);
            return redirect('/')->with(['success' => 'profile updated  successfully']);
        }
    }


    public function updatepassword(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('admin.adminpassword');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $request->all();
            $validator =  Validator::make($data, [
                'current_password' => 'required',
                'new_password' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }
            
            if (Hash::check($request->current_password, Auth::user()->password) == false) {
				$message = 'Current Passsword is not match';
				return redirect()->back()->with(['error' => $message]);
			} else {
                Admin::Updatepassword($data);
                return redirect()->back()->with(['success' => 'profile updated  successfully']);
            }
   
        }
    }
}
