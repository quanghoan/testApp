<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
  public function index()
  {
    return view('user.index')->with('users', User::orderBy('created_at', 'desc')->get());
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|unique:users|max:100',
      'address' => 'required|max:300',
      'age' => 'required|numeric|digits:2'
    ]);
    $input = $request->all();
    $user = new User();
    $user->name = $input['name'];
    $user->address = $input['address'];
    $user->age = $input['age'];

    $user->save();
    return redirect('user');
  }

  public function getusers()
  {
    return User::orderBy('name')->get();
  }

  public function destroy($id)
  {
    $user = User::find($id);
    $user->delete();
    return redirect('user');
  }

  public function edit($id)
  {
    $user = User::find($id);
    return view('user.edit', compact('user'));
  }

  public function update($id, Request $request)
  {
    $user = User::find($id);
    $input = Input::all();
    $user->name = $input['name'];
    $user->address = $input['address'];
    $user->age = $input['age'];
    $user->save();
    return redirect('user');
  }
}