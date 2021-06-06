<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Musics;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function overview(){
        $countUsers = sizeof(User::all());
        $likes = 0;
        $views = 0;
        $list_music = DB::table('musics')->where('status', '=', Status::ACTIVE)->get();;
        for ($i = 0 ; $i < sizeof($list_music) ; $i++){
            $likes += $list_music[$i]->like;
            $views += $list_music[$i]->views;
        }
        $songs = sizeof($list_music);
        return view('admin/index',['countUser'=>$countUsers,'likes'=>$likes,'songs'=>$songs,'views'=>$views]);
    }

    public function profile(){
        $user = User::find(Auth::id());
        return view('admin/profile',['info_user'=>$user]);
    }

    public function store(Request $request){
        $newUser = new User();
        $newUser->fill($request->all());
        $newUser->password = Hash::make($request['password']);
        $email = User::all()->where('email','=',$newUser->email);
        if (sizeof($email)==1){
            return back()->with('email_error','Email already used to register');
        }else{
            $newUser->save();
            return back()->with('register_success','successful new creation');
        }
    }




    public function update(Request $request,$id){
        $user = User::find($id);
        $data = $request->all();
        if ($data['password']){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        $user->update($data);
        $user->save();
        return redirect()->route("admin_profile");
    }


}
