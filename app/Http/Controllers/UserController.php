<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use SebastianBergmann\Type\Type;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {

            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['avatar' => $filename]);
        }

        return redirect()->back();
    }

    public function index()
    {
        $data = [
            'name' => 'neptune',
            'email' => 'neptune@gmail.com',
            'password' => 'passsword',
            'mobile' => 564943486464,
        ];
        #User::create($data);
        // DB::insert('insert into users (name,email,password)values(?,?,?)', [
        //     'simon', 'simon@gmail.com', 'password',
        // ]);
        #$users = DB::select('select * from users');
        #DB::update('update users set name = ? where id = 1', ['saturn']);
        #DB::delete('delete from users where id = 36');
        #$users = DB::select('select * from users');
        // $user = new User();
        // $user->name = 'titanium';
        // $user->email = 'titanium@gmail.com';
        // $user->password = 'password';
        // $user->save();
        #$user = User::all();
        // User::where('id', 9)->delete();
        // User::where('id', 10)->update(['name' => 'neptune']);
        $user = User::all();
        return $user;
        return view('main');
    }
}
