<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Musics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSongsController extends Controller
{




    public function list(Request $request){
        $songs = Musics::all();
        $limit = $request->query('limit') ? $request->query('limit') : 20;
        $search = $request->query('search');
        $query_builder = Musics::query();
        if ($search && strlen($search)>0){
        $query_builder = $query_builder->where('song_key','like','%'.$search.'%')
            ->orWhere('song_name','like','%'.$search.'%')
            ->orWhere('author','like','%'.$search.'%')
            ->orWhere('public_by','like','%'.$search.'%')
            ->orWhere('like','like','%'.$search.'%')
            ->orWhere('lyrics','like','%'.$search.'%');
            $songs = $query_builder->paginate($limit)->appends(['search' => $search]);
        }else{
            $songs = DB::table('musics')->where('status', '=', Status::ACTIVE)->Paginate($limit);
        }
        return view('admin/list_songs',['songs'=>$songs,'keyword'=>$search]);
    }



    public function list_waiting(Request $request){
        $songs = Musics::all();
        $limit = $request->query('limit') ? $request->query('limit') : 20;
        $search = $request->query('search');
        $query_builder = Musics::query();
        if ($search && strlen($search)>0){
            $query_builder = $query_builder->where('song_key','like','%'.$search.'%')
                ->orWhere('song_name','like','%'.$search.'%')
                ->orWhere('author','like','%'.$search.'%')
                ->orWhere('public_by','like','%'.$search.'%')
                ->orWhere('like','like','%'.$search.'%')
                ->orWhere('lyrics','like','%'.$search.'%');
            $songs = $query_builder->paginate($limit)->appends(['search' => $search]);
        }else{
            $songs = DB::table('musics')->where('status', '=', Status::DEACTIVE)->Paginate($limit);
        }
//        $songs = DB::table('musics')->where('status', '=', Status::DEACTIVE)->Paginate(10);
        $song_deactive = sizeof(Musics::all()->where('status',Status::DEACTIVE));
        return view('admin/waiting',['songs'=>$songs,'deactive'=>$song_deactive,'keyword'=>$search]);
    }
    public function release($id){
        $song = Musics::find($id);
        $song->status = Status::ACTIVE;
        $song->save();
        return redirect()->route('list_songs_waiting');
    }
    public function delete_song($id){
        $song = Musics::find($id);
        $song->delete();
        return redirect()->route('list_songs');
    }
    public function delete_song_waiting($id){
        $song = Musics::find($id);
        $song->delete();
        return redirect()->route('list_songs_waiting');
    }
    public function detail_song($id){
        $song = Musics::find($id);
        return view('admin/song_detail',['song'=>$song]);
    }
}
