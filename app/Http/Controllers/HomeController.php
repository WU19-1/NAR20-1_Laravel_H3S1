<?php

namespace App\Http\Controllers;

use App\AdminActivity;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        if(\auth('admin')->check()){
            AdminActivity::orderBy('last_login','desc')->first()
                ->where('last_logout','=','')
                ->update(['last_logout' => Carbon::now()->toDateTimeString()]);
            $data = AdminActivity::all();
            $i = 1;
            return view('home',compact('data','i'));
        }
        else if(\request()->hasCookie('remember')){
            if(\auth()->check() == false){
                $x = DB::table('schedules')->join('courses','schedules.course_id','=','courses.course_id')
                    ->where('student_id','=',json_decode(\request()
                        ->cookie('remember'))->id)->where('date','=',Carbon::now()->toDateString())->get();
                return view('home',compact('x'));
            }
            $x = DB::table('schedules')->join('courses','schedules.course_id','=','courses.course_id')
                ->where('student_id','=',Auth::user()->id)->where('date','=',Carbon::now()->toDateString())->get();
            return view('home',compact('x'));
        }
        else if(Auth::check()){
            $x = DB::table('schedules')->join('courses','schedules.course_id','=','courses.course_id')
                ->where([
                    ['student_id','=',Auth::user()->id],
                    ['date','=',Carbon::now()->toDateString()]
                ])->get();
            return view('home',compact('x'));
        }
        abort(403);
        return \redirect('/login');
    }

    public function profile(){
        if(Auth::check() == false) abort(403);
        return view('profile');
    }

    public function schedule(){
        if(Auth::check() == false) abort(403);
        $x = DB::table('schedules')->join('courses','schedules.course_id','=','courses.course_id')
            ->where('student_id','=',Auth::user()->id)->orderBy('schedules.date')->get();
        return view('schedule',compact('x'));
    }

    public function update_profile(Request $request){
        if(Auth::check() == false) abort(403);
        \request()->validate([
            'images' => 'mimes:jpg,png,jpeg',
            'desc' => 'required'
        ]);
        $user = Auth::user()->studentdetail;
        $motto = $request->get('desc');
        if($request->file('images') != null){
            $profile = $request->file('images');
            $ext = $profile->getClientOriginalExtension();
            Storage::disk('public')->put(Auth::user()->id . '.' . $ext,\File::get($profile));
            $user->image = Auth::user()->id . '.' . $ext;
        }
        $user->motto = $motto;
        $user->save();

        $success = 'Successfully update profile!';

        return view('profile',compact('success'));
    }

    public function updatepw(Request $request){
        if(Auth::check() == false) abort(403);
        $messages = [
            'old_password.required' => 'Please input your old password field',
            'password_confirmation.required' => 'Please input confirm password field',
            'password.confirmed' => 'Password and your confirm password field is different',
        ];
        $validator = \Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'confirmed',
            'password_confirmation' => 'required'
        ],$messages);
//        dd(bcrypt($request->input('old_password')));
        if($validator->fails()){
            $errorupdate = $validator->errors()->first();
            return \redirect('/profile')->with('errorupdate',$errorupdate);
        }
        if(password_verify($request->old_password,Auth::user()->password) == false){
            return \redirect('/profile')->with('errorupdate','The old password password is not valid');
        }
        $user = Auth::user();
        $user->password = bcrypt($request->password_confirmation);
        $user->save();
        return \redirect()->back()->with('successupdate','Password successfully changed!');
    }
}
