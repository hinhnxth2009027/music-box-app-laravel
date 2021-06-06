<?php

namespace App\Http\Controllers\API;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Musics;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    public function list(){
        $users = User::all();
        $song = Musics::all();
        return ['users'=>$users,'songs'=>$song];
    }
    public function findById($id){
        $song = Musics::find($id);
        return $song;
    }
    public function updatebyid($id,Request $request){
        $song = Musics::find($id);
        $song->like = $request->like;
        $song->save();
        return $song;
    }




    public function addview($id,Request $request){
        $song = Musics::find($id);
        $song->views = $request->view;
        $song->save();
        return $song;
    }

}
