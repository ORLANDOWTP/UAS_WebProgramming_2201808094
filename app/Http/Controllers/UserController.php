<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('login',compact(['categories']));
    }
    public function indexRegister()
    {
        $categories=Category::all();
        return view('register',compact(['categories']));
    }
    public function manageUser(){
        $categories=Category::all();
        $users=User::where('role','user')->get();
        return view('manage-user',compact(['categories','users']));
    }
    public function login(LoginRequest $request){
        $auth=(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => $request->role]));
        if ($auth) {
            return redirect('/');
        }
        return back()->withErrors('Wrong email and password')->withInput();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
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
    public function store(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role='user';
        $user->save();
        return back()->with('success', 'Successfully registered account');
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profilePage(){
        $categories=Category::all();
        return view('profile',compact(['categories']));
    }
    public function update(ProfileRequest $request)
    {
        $user=User::find(Auth::user()->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->save();
        return back()->with('success', 'Successfully updated profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back();
    }
}
