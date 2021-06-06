<?php

namespace App\Http\Controllers\User;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Musics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    public function mysongs(){
//        $songsPublic = Musics::all();
        $songsPublic = Musics::where([['public_by_id','=',Auth::id()],['status','=',Status::ACTIVE]])->get();
        $songsPrivate = Musics::where([['public_by_id','=',Auth::id()],['status','=',Status::DEACTIVE]])->get();
        return view('user/mysong',['songspl'=>$songsPublic,'songspv'=>$songsPrivate]);
    }
    public function song_upload(){
        return view('user/upload_song');
    }
    public function action_song_upload(Request $request){
        $song = new Musics();
        $song -> fill($request->all());
        $song->save();
        return back()->with('upload_success','You have successfully uploaded now wait for the song to be approved by lightning');
    }
}
