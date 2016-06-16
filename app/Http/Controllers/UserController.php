<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
  public function index()
  {
    return view('user.index')->with('users', DB::table('users')->orderBy('created_at')->get());
  }

  public function create(Request $request)
  {

  }
}
