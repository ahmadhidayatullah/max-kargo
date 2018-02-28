<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller{
  
  public function index(){
    $users = User::all();
    return view('app.users.index', [
      'title'       => 'User',
      'url'         => route('users.index'),
      'description' => '',
      'users'       => $users
      ]);
    }
    
    public function store(Request $request) {
      $validator = Validator::make($request->all(), [
        'name'      => 'required',
        'email'     => 'required|unique:users',
        'password_confirmation'  => 'required|min:4',
        'password'  => 'required|min:4',
        'level'     => 'required',

        ]);
        if ($validator->fails()) {
          return redirect()->back()
          ->withErrors($validator)
          ->withInput()
          ->with('message', format_message('Gagal Input !','danger'));
        }
        $name     = $request->name;
        $email    = $request->email;
        $password = bcrypt($request->password);
        $phone    = $request->phone;
        $address  = $request->address;
        $level    = $request->level;
        
        
        $user = User::create([
          'name'     => $name,
          'email'    => $email,
          'password' => $password,
          'phone'    => $phone,
          'address'  => $address,
          'level'    => $level,
          ]);
          
          if ($user) {
            return redirect()->route('users.index')->with('message', format_message('Success insert data !','success'));
          }else {
            return redirect()->route('users.index')->with('message', format_message('Gagal Insert !','danger'));
          }
          
        }
        
        public function show($id)
        {
          return User::where('id',$id)->get();
          
        }
        
        public function update(Request $request,$id){
          $destionation =  Destination::find($id);
          
          $destionation->code = $request->code;
          $destionation->name = $request->name;
          $destionation->province = $request->province;
          $destionation->estimate = $request->estimate;
          
          if ($destionation->save()) {
            return redirect()->route('users.index')->with('message', format_message('Success update data !','success'));
          }else {
            return redirect()->route('users.index')->with('message', format_message('Failed update data !','danger'));
          }
        }
        
        public function destroy($id){
          User::find($id)->delete();
          
          return redirect()->route('users.index')->with('message', format_message('Success delete data !','success'));
        }
      }
      