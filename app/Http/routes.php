<?php
use App\User;
use Illuminate\Http\Request;

// Route::get('/', function () {
//   $users = User::orderBy('created_at', 'desc')->get();
//   return view('index', ['users' => $users]);
// });
// /**
//  * Add A New user
//  */
// Route::post('/user', function (Request $request) {
//   $validator = Validator::make($request->all(), [
//     'name' => 'required|max:100',
//     'address' => 'required|max:300',
//     'age' => 'numeric|max:2'
//   ]);
//   if ($validator->fails()) {
//     return redirect('/')
//       ->withInput()
//       ->withErrors($validator);
//   }
//   $user = new User;
//   $user->name = $request->name;
//   $user->address = $request->address;
//   $user->age = $request->age;
//   $user->save();
//   return redirect('/');
// });
// /**
//  * Delete An Existing user
//  */
// Route::delete('/user/{id}', function ($id) {
//   User::findOrFail($id)->delete();
//   return redirect('/');
// });
Route::get('/', function () {
  return view('welcome');
});

// Route::group(['middleware' => ['web']], function () {
Route::resource('user', 'UserController');
Route::get('getusers', 'UserController@getusers');
Route::get('user/{$id}/edit', 'UserController@edit');
Route::post('user/create', 'UserController@update');
// });