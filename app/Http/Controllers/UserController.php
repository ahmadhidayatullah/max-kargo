<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
      $users = User::all();
      return view('app.users.index', [
        'title'       => 'User',
        'url'         => route('users.index'),
        'description' => '',
        'users'       => $users
      ]);
    }
}
