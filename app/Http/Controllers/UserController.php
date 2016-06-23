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
      'age' => 'required|numeric|min:10|digits:2',
      'photo' => 'required|max:1024'
    ]);
    $input = $request->all();
    $user = new User();
    $user->name = $input['name'];
    $user->address = $input['address'];
    $user->age = $input['age'];
    $photo = $request->file('photo');
    $photo_name = $photo->getClientOriginalName();
    $photo->move('avatar', $photo_name);
    $user->photo = $photo_name;
    $user->save();
    return redirect('user');
  }

  public function getusers()
  {
    return User::orderBy('created_at', 'desc')->get();
  }

  public function destroy($id)
  {
    $user = User::find($id);
    $user->delete();
    return redirect('user');
  }

  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('user.edit')->withUser($user);
  }

  public function update($id, Request $request)
  {
    $user = User::findOrFail($id);

    $this->validate($request, [
      'name' => 'required|max:100',
      'address' => 'required|max:300',
      'age' => 'required|numeric|digits:2',
      // 'photo' => 'required'
    ]);
    $input = $request->all();
    $user->name = $input['name'];
    $user->address = $input['address'];
    $user->age = $input['age'];
    $user->photo = $input['photo'];
    $user->save();
    return redirect('user');
  }
}