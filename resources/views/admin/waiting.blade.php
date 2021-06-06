<!DOCTYPE html>
<html lang="en">
<head>
    @include('.admin.layOuts.head')
    @include('.admin.layOuts.admin_list_songs_style')
    <style>
        .btn_case_witting_null {
            width: 125px;
        }
        tr > td {
            cursor: pointer;
        }
        tr:hover {
            background: #e4f5fb;
        }
    </style>
    <title>Music box || Waiting</title>
</head>

<body>
<div class="wrapper">
    @include('.admin.layOuts.sideBar')
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg" style="padding: 0 !important; max-width: 120%">
            <div class="container-fluid" style="padding: 0 !important;">
                <form class=" col-12" id="form_search" style="height: 100%;">
                    <div class="row col-12" style="padding: 0 !important;">
                        <div class="form-group col-7 col-md-6 d-flex align-items-center"
                             style="padding: 2px !important;margin: 0 0 0 5px !important;">
                            <input value="" name="search" type="text"
                                   class="form-control" placeholder="search by key word" id="input_search">
                        </div>
                        <div class="form-group "
                             style="padding: 2px !important;margin: 0 !important;display: flex !important;align-items: center !important;">
                            <button class="form-control" id="search_btn"><i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                        {{--                        <div class="form-group" style="max-width: 100%;margin: 0 !important;overflow: hidden">--}}

                        {{--                            <select class="btn btn-primary" id="filter_search" name="role">--}}
                        {{--                                <option {{$role == \App\Enums\Status::ACTIVE ? 'selected':''}} value="{{$type}}">Low to High</option>--}}
                        {{--                                <option {{$role == \App\Enums\Status::DELETE ? 'selected':''}} value="{{$type}}">High to Low</option>--}}
                        {{--                                <option {{$role == "" ? 'selected':''}} value="">All</option>--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}
                    </div>
                </form>
            </div>
        </nav>
        <p style="height: 20px;margin-bottom: 0;position: sticky;top: 0;background: #f7f7f7;z-index: 100">
            <marquee behavior="" direction="">
                <span>{{$keyword != '' ? 'Search results for keyword : '.$keyword : ''}}</span>
            </marquee>
        </p>

        {{--        content        --}}
        <div class="content" style="padding-top: 0!important;">
            <div class="controll_audio" style="display: none;">
                <span aria-hidden="true" style="font-size: 25px;cursor: pointer;position: absolute;top: 0;right: 10px" id="music_close">&times;</span>
                <div class="player-container">
                    <div class="player-controls">
                        <i class="fas fa fa-play main-button" id="play" title="Play" aria-hidden="true"></i>
                    </div>
                    <div class="progress-container" id="progress-container">
                        <div class="progress" id="progress"></div>
                        <div class="duration-wrapper">
                            <span id="current-time">0:00</span>
                            <span id="duration">00:00</span>
                        </div>
                    </div>
                    <h6 style="font-weight: 500;margin-top: 7px" class="text-dark">Bạn đang nghe bài hát: <span id="show_song_name"></span> -- của giọng ca :<span id="show_author_name"></span></h6>
                </div>
                <audio></audio>
            </div>
            <br>
            <input type="hidden" id="audio_play">

                @if($deactive >=1)
                <table class="table" style="border-radius: 10px">
                    <thead>
                    <tr>
                        <th class="text-dark" scope="col"><h6>id</h6></th>
                        <th class="text-dark" scope="col"><h6>Song name</h6></th>
                        <th class="text-dark" scope="col"><h6>author</h6></th>
                        <th class="text-dark" scope="col"><h6>public by</h6></th>
                        <th class="text-dark" scope="col"><h6 class="text-center">thumbnail</h6></th>
                        <th class="text-dark" scope="col"> <h6 class="text-center">action</h6></th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = sizeof($songs)-1 ;$i >=0 ; $i--)
                        @if($songs[$i]->status === \App\Enums\Status::DEACTIVE)
                            <tr>
                                <th scope="row">{{$songs[$i]->song_key}}</th>
                                <td data-toggle="modal" data-target="#exampleModalLong" title="{{$songs[$i]->song_name}}" slot="{{$songs[$i]->lyrics}}" class="show_lyrics_btn" >{{$songs[$i]->song_name}}</td>
                                <td data-toggle="modal" data-target="#exampleModalLong" title="{{$songs[$i]->song_name}}" slot="{{$songs[$i]->lyrics}}" class="show_lyrics_btn" >{{$songs[$i]->author}}</td>
                                <td data-toggle="modal" data-target="#exampleModalLong" title="{{$songs[$i]->song_name}}" slot="{{$songs[$i]->lyrics}}" class="show_lyrics_btn" >{{$songs[$i]->public_by}}</td>
                                <td data-toggle="modal" data-target="#exampleModalLong" title="{{$songs[$i]->song_name}}" slot="{{$songs[$i]->lyrics}}" class="show_lyrics_btn text-center"><img  src="{{url($songs[$i]->thumbnail)}}" style="width: 50px;height: 50px;object-fit: cover;border-radius: 50%"></td>
                                <td class="text-center">
                                    <button slot="{{$songs[$i]->song_file}}~!~!~{{$songs[$i]->song_name}}~!~!~{{$songs[$i]->author}}" class="btn btn-primary btn_play_song_admin">Play</button>
                                    <a href="{{route('detail_song',$songs[$i]->id)}}" class="btn btn-warning">Detail</a>
                                    <a onclick="return confirm('Bằng cách đồng ý với thao tác này bài hát --|| {{$songs[$i]->song_name}} ||--  do người dùng --|| {{$songs[$i]->public_by}} ||--  đăng tải sẽ chuyển sang trạng thái Pubic')" href="{{route('release_song',$songs[$i]->id)}}" class="btn btn-success">Release</a>
                                    <a onclick="return confirm('bạn có chắc chắn là muốn xóa bài hát --|| {{$songs[$i]->song_name}} ||-- ra khổi khỏi danh sách chờ phê duyệt')" href="{{route('delete_song_waiting',$songs[$i]->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endif
                    @endfor
                    </tbody>
                </table>
                <div class="modal fade" style=" background: rgba(0,0,0,0.2);padding-left: 0 !important;" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="margin-top: 200px !important;float: right !important;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Lyrics : <span id="show_name_song"></span></h5>
                            </div>
                            <div class="modal-body form-group p-3" id="modal_content">
                                <p id="content_lyrics"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn_close btn-warning" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div style="width: 100%;background: #eeeeee;height: 800px" class="text-center pt-5">
                        <h1 class="text-danger">Hiện tại chưa có bài đăng nào mới</h1>
                        <br>
                        <img src="{{url('https://icons-for-free.com/iconfiles/png/512/music+icon-1320184414432119131.png')}}" alt="music box" style="height: 270px;width: 270px">
                        <br><br>
                        <a href="{{route('dashboard')}}" class="btn_case_witting_null btn btn-dark" >DASHBOARD</a>
                        <a href="{{route('admin_profile')}}" class="btn_case_witting_null btn btn-danger" >PROFILE</a>
                        <a href="{{route('list_user')}}" class="btn_case_witting_null btn btn-success" >LIST USERS</a>
                        <br><br>
                        <a href="{{route('list_songs')}}" class="btn_case_witting_null btn btn-warning" >LIST SONGS</a>
                        <a href="#" class="btn_case_witting_null btn btn-info" >CONTACT</a>
                        <a href="#" class="btn_case_witting_null btn btn-secondary" >FEEDBACK</a>
                        <br><br>
                        <a href="#" class="btn_case_witting_null btn btn-primary">DISCOVER</a>
                    </div>
                @endif
        </div>

        @include('.admin.layOuts.footer')

    </div>
</div>
<input type="hidden" id="check_nav_active" value="Waiting">
</body>
@include('.admin.layOuts.script')
@include('.admin.layOuts.admin_list_songs_play')
<script>
    $('.show_lyrics_btn').click(function (){
        $('#content_lyrics').text(this.slot)
        $('#show_name_song').text(this.title)
    })
</script>

</html>
