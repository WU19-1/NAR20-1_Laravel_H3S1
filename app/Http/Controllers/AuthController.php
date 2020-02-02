<?php

namespace App\Http\Controllers;

use App\AdminActivity;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(\auth('admin')->check()){
            $data = DB::table('admin_activities')
                ->where('admin_id','=',\auth('admin')->user()->admin_id)
                ->orderBy('last_login')->get();
            session()->put('data',$data);
            return redirect('/home');
        }
        if(\request()->cookie('remember') || Auth::check()){
            if(\request()->cookie('remember')){
            }
            return redirect('/home');
        }
        return view('auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->cookie(\Cookie::forget('remember'));
    }

    public function adminlogout(){
        $x = DB::table('admin_activities')
            ->where('admin_id','=',\auth('admin')->user()->admin_id)
            ->where('last_logout','=','')
            ->update(['last_logout' => Carbon::now()->toDateTimeString()]);
        \auth('admin')->logout();
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->email;
        $pw = $request->password;
        $res = new \Illuminate\Http\Response(redirect('/home'));

        $rem = Input::get('remember') ? true : false;

        if (Auth::guard('web')->attempt(['email'=> $email,'password' => $pw])){
            if($rem){
                $res->withCookie(cookie('remember',json_encode(Auth::user()),60));
            }
            return $res;
        }else if(\auth('admin')->attempt(['email'=> $email,'password' => $pw])){
            $adm = \auth('admin')->user();
            AdminActivity::create([
                'admin_id' => $adm->admin_id,
                'last_login' => Carbon::now()->toDateTimeString(),
                'last_logout' => '',
            ]);
            return redirect('/home');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
