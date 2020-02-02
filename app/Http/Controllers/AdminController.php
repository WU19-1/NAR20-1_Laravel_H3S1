<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        if(!auth('admin')->check()){
            return redirect('/login');
        }
        $data = Student::all();
        return view('admin.adminpage',compact('data'));
    }

    public function update_index($id){
        if(!auth('admin')->check()){
            return redirect('/login');
        }
        $data = Student::find($id);
        return view('admin.update',compact('data'));
    }

    public function reset(Request $request){
        if(!auth('admin')->check()){
            return redirect('/login');
        }
        $id = $request->id;
        $s = Student::find($id);
        $s->password = bcrypt('123123');
        $s->save();
        $success = 'Password reset back to 123123!';
        return view('admin.update',compact('success'));
    }

    public function update(Request $request){
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'nim' => 'digits:10|unique:students,nim,'. $id,
            'motto' => 'required',
            'images' => 'mimes:jpeg,jpg,png'
        ]);
        $user = Student::find($id);
        $user->studentdetail->motto = $request->motto;
        $user->nim = $request->nim;
        $user->student_name = $request->name;
        if($request->file('images') != null){
            $profile = $request->file('images');
            $ext = $profile->getClientOriginalExtension();
            Storage::disk('public')->put($id . '.' . $ext,\File::get($profile));
            $user->studentdetail->image = $id . '.' . $ext;
        }
        $user->save();
        $user->studentdetail->save();
        return redirect()->back()->with('success','Successfully updated user');
    }

    public function delete($id){
        Student::find($id)->studentdetail->delete();
        Student::find($id)->delete();
        return redirect()->back();
    }

    public function insert_index(){
        if(!auth('admin')->check()){
            return redirect('/login');
        }
        return view('admin.insert');
    }

    public function insert(Request $request){
        if(!auth('admin')->check()){
            return redirect('/login');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nim' => 'digits:10|unique:students,nim'
        ]);
        $user = Student::create([
            'student_name' => $request->name,
            'email' => $request->email,
            'nim' => $request->nim,
            'password' => bcrypt('asd'),
        ]);
        StudentDetail::create([
            'student_id' => $user->id,
            'motto' => 'I want to join SLC!',
            'image' => '',
        ]);
        $success = 'Successfully insert user!';
        return view('admin.insert',compact('success'));
    }
}