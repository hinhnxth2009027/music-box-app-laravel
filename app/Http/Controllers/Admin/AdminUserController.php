<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class AdminUserController extends Controller
{





    public function list(Request $request)
    {
        $users = User::all();
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $role = $request->query('role')!="" ? $request->query('role') : "" ;
        $search = $request->query('search');
        $query_builder = User::query();
        if ($search && strlen($search) > 0) {
            $query_builder = $query_builder->where('name','like','%'.$search.'%')
                ->orWhere('email','like','%'.$search.'%')
                ->orWhere('address','like','%'.$search.'%')
                ->orWhere('birthday','like','%'.$search.'%');
        }
        if ($role!="") {
            $query_builder = $query_builder->where('role',$role);

        }
        $users = $query_builder->where('status','=',Status::ACTIVE)->paginate($limit)->appends(['search' => $search,'role'=>$role]);
        return view('admin/list_user', ['search' => $search,'users' => $users,'role' => $role,'key_word'=>$search]);
    }





    public function user_detail($id)
    {
        $user = User::find($id);
        return view('admin/user_detail', ['user' => $user]);
    }

    public function user_delete($id)
    {
        $user = User::find($id);
        $user->status = Status::DELETE;
        $user->save();
        return redirect()->route('list_user');
    }

    public function user_upgrade($id)
    {
        $user = User::find($id);
        $user->role = Role::ADMIN;
        $user->save();
        return redirect()->route('list_user');
    }
}
