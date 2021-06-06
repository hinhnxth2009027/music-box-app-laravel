<!DOCTYPE html>
<html lang="en">
<head>
    @include('.user.layout.head')
    <style>
        #back_to_top{
            transition: 0.3s;
            cursor: pointer;
        }
        #back_to_top:hover{
            background: #a746b0!important;
        }

        #song_control > i:hover {
            color: #f52d60 !important;
        }

        .btn_text_play_music:hover {
            color: white;
        }

        .fa-heart {
            cursor: pointer;
        }

        #song_control i {
            transition: 0.3s;
            cursor: pointer;
        }

        .active_repeat_one:after {
            content: '1';
            color: #f53c3c !important;
            font-family: sans-serif;
            font-size: 10px;
        }

        .active_repeat_one {
            color: #f53c3c !important;
        }

        .active_repeat {
            color: #f53c3c !important;
        }

        .active_random {
            color: #f53c3c !important;
        }

        @media only screen and (max-width: 2800px) {
            #thumbnail_song {
                height: 370px;
            }
        }

        @media only screen and (max-width: 1550px) {
            #thumbnail_song {
                height: 270px;
            }
        }

        @media only screen and (max-width: 1350px) {
            #thumbnail_song {
                height: 240px;
            }
        }

        @media only screen and (max-width: 1350px) {
            #thumbnail_song {
                height: 280px;
            }
        }

        @media only screen and (max-width: 575px) {
            #thumbnail_song {
                height: auto;
            }
        }

        .progress-container {
            background: #fff;
            border-radius: 5px;
            cursor: pointer;
            transform: translateY(-15px);
            height: 4px !important;
            width: 100%;
        }

        .progress {
            background: #f84c4c;
            border-radius: 5px;
            height: 100%;
            width: 0;
            transition: width 0.1s linear;
        }

        .duration-wrapper {
            position: relative;
            top: -20px;
            display: flex;
            height: 1px;
            justify-content: space-between;
        }

        .show_list_song_play {
            width: 320px !important;
        }

        .item_song {
            cursor: pointer;
            transition: 0.4s;
        }

        .item_song:hover {
            background: rgba(249, 249, 249, 0.2) !important;
            z-index: 123456;
        }

        .item_song:hover > i {
            color: white !important;
        }

        ::-webkit-scrollbar {
            width: 0;
        }

        .music_item {
            transition: 0.3s;
        }
        .music_item:hover{
            box-shadow: black 0 0 10px;
            transform: translateY(-5px);
            z-index: 23456789;
        }


        .dropdown-menu  {
            z-index: 1234566666;
        }

        .btn_text_play_music {
            margin-top: 1px;
            border-radius: 3px;
            transition: 0.3s;
        }
        .btn_text_play_music:hover {
            background: black !important;
        }


        .fa-list:hover {
            color: #f53967 !important;
        }

        .img_publicer {
            cursor: pointer;
            transition: 0.3s;
        }
        .img_publicer:hover {
            border: red 2px solid!important;
            opacity: 1!important;
        }

        .status_admin {
            border: #f45959 4px solid!important;
        }
        .status_user {
            border: #8472f7 4px solid!important;
        }

    </style>
    <title>Music box || home</title>
</head>
<body>
<div class="wrapper">
    @include('.user.layout.sidebar_left')
    <div class="" id="show_list_song_play"
         style="height: 500px;position: fixed;z-index: 1000000000;right: 10px;top: 70px;width: 0;overflow: hidden;transition: 0.6s;background: rgba(0,0,0,0.79)">
        <div style="height: 100%;width: 100%;position: relative">
            <div style="height: 11%">
                <button id="btn_close_list_song"
                        style="position: absolute;top: 5px;left: 5px;color: black;font-weight: bold"
                        class="btn btn-warning d-block"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                <button id="btn_speed" style="position: absolute;top: 5px;left: 60px;color: black;font-weight: bold" class="btn btn-warning d-block bg-white">speed 1x</button>
            </div>
            <div style="width: 100%;height: 89%;overflow: scroll">
                <div style="width: 100%; position: relative" class="list_song_container p-1"></div>
            </div>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg" style=" max-width: 120%;position: sticky;top: 0;z-index: 23456799;">
            <div class="container-fluid" style="padding: 0 !important;">
                <div class=" col-12" id="form_search" style="height: 100%;">
                    <div class="row col-12 d-flex justify-content-center align-items-center" style="padding: 0 !important;margin: 0!important;">
                        <div class="form-group col-12 col-md-6 d-flex align-items-center"
                             style="padding: 2px !important;margin: 0 0 0 5px !important;">
                            <input value="" name="search" type="text" class="form-control" placeholder="Search keyword ( author , lyrics , poster...vv ) "
                                   id="input_search">
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="modal_show_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 23456799!important;">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 750px!important;margin-bottom: 100px;z-index: 23456799!important;">
                <div class="modal-content" style="margin-bottom: 100px;z-index: 23456799!important;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hi !!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body card card-user mt-4">
                        <div class="">
                            <div class="card-image" style="height: 250px">
                                <img id="info_publicer_cover_photo" src="">
                            </div>

                            <div class="card-body">
                                <div class="author">

                                    <img id="info_publicer_avatar" class="avatar border-gray status_user" src=""
                                         style="object-fit: cover;">
                                    <h5 class="title" id="info_publicer_name" ></h5>
                                    <table class="table table-striped">
                                        <thead>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td id="info_publicer_email"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td id="info_publicer_phone" ></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Birthday</th>
                                            <td id="info_publicer_birthday" ></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" >Address</th>
                                            <td id="info_publicer_address" ></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Date of join</th>
                                            <td id="info_publicer_join" ></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <hr>
                            <div class="button-container mr-auto ml-auto d-flex justify-content-center">
                                    <a id="facebook_info" target="_blank" href="" class="btn d-none btn-simple wertyuiop btn-link btn-icon">
                                        <i class="fa fa-facebook-square" style="color: #2868ec"></i>
                                    </a>
                                    <a id="twitter_info" target="_blank" href="" class="btn d-none btn-simple wertyuiop btn-link btn-icon">
                                        <i class="fa fa-twitter" style="color: #00bbff"></i>
                                    </a>
                                    <a id="instagram_info" target="_blank" href="" class="btn d-none btn-simple wertyuiop btn-link btn-icon">
                                        <i class="fa fa-instagram" aria-hidden="true" style="color: rgba(255,0,251,0.85)"></i>
                                    </a>
                                    <a id="github_info" target="_blank" href="" class="btn d-none btn-simple wertyuiop btn-link btn-icon">
                                        <i class="fa fa-github" aria-hidden="true" style="color: rgba(0,0,0,0.85)"></i>
                                    </a>
                                    <p class="error_user_info d-none">Người dùng này chưa thêm các liên kết mạng xã hội khác</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p id="isadmin">người dùng này là quản trị viên</p>
                        <button type="button" class="btn btn-secondary d-none" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{--        content        --}}
        <div class="content" style="padding: 0!important;margin-bottom: 85px">
            @if (session('noAdmin'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Ohh no</strong> {{session('noAdmin')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            @if (session('login_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Good</strong> {{session('login_success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            <div class="col-12 row music_container" style="padding: 0!important;margin: 0">
                @for($i = sizeof($musics)-1 ; $i>=0 ; $i--)
                    @if($musics[$i]->status === \App\Enums\Status::ACTIVE)
                        <div slot="{{$musics[$i]->song_name}} {{$musics[$i]->author}} {{$musics[$i]->lyrics}} {{$musics[$i]->public_by}} {{$musics[$i]->public_by_id}}" class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3 d-inline-block music_item" style="padding: 5px!important;">
                            <div class="col-12 " style="padding: 0!important;margin: 0;position: relative">
                                <img data-toggle="modal" data-target="#modal_show_user" class="img_publicer public_by_id{{$musics[$i]->public_by_id}}" src="http://res.cloudinary.com/kee/image/upload/v1621419275/lgjvddfrvepedkiezfzt.gif" alt="" style="width: 45px;height: 45px;position: absolute;object-fit: cover;left: 5px;top: 5px;border-radius: 50%;border: #00bbff 2px solid;opacity: 0.7;">
                                <div class="dropdown" style="position: absolute;top: 10px;right: 10px">
                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button accesskey="{{$musics[$i]->song_name}}"
                                                elementTiming="{{$musics[$i]->lyrics}}~!!!~{{$musics[$i]->thumbnail}}~!!!~{{$musics[$i]->song_key}}~!!!~{{$musics[$i]->id}}"
                                                nonce="{{$musics[$i]->author}}" slot="{{$musics[$i]->song_file}}"
                                                class="dropdown-item text-dark add_tolist">Add to play list
                                        </button>
                                        <button class="dropdown-item text-dark">Song Info</button>
                                    </div>
                                </div>
                                <img id="thumbnail_song" src="{{$musics[$i]->thumbnail}}"
                                     style="width: 100%; object-fit: cover"
                                     alt="">
                            </div>
                            <div class="col-12 row"
                                 style="height: 70px ;margin: 0 !important;padding: 0!important;background: #ffffff">
                                <div class="col-10 col-sm-9 col-md-9 col-lg-9"
                                     style="height: 100%;padding: 0 !important;">
                                    <div class="pl-1" style="height: 35%;overflow: hidden"><p style="font-size: 15px;">
                                            <strong>{{$musics[$i]->song_name}}</strong>
                                        </p></div>
                                    <div class="pl-1" style="height: 20%">
                                        <p style="font-size: 13px">{{$musics[$i]->author}}</p>
                                    </div>
                                    <div style="height: 50%" class="d-flex align-items-center pl-1">
                                        <i slot="{{$musics[$i]->id}}" style="font-size: 22px;color: #fc4b4b"
                                           class="fa fa-heart" aria-hidden="true"></i>&nbsp;&nbsp;
                                        <strong style="font-size: 15px" class="text-secondary"><span
                                                id="{{$musics[$i]->song_key}}"></span></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i
                                            style="font-size: 22px;color: #c671ff" class="fa fa-eye"
                                            aria-hidden="true"></i>&nbsp;&nbsp;
                                        <strong style="font-size: 15px" class="text-secondary"><span
                                                id="~!!!~{{$musics[$i]->song_key}}"></span></strong>
                                    </div>
                                </div>
                                {{--                                autocapitalize="{{$music->lyrics}}"--}}
                                <div accesskey="{{$musics[$i]->song_name}}"
                                     elementTiming="{{$musics[$i]->lyrics}}~!!!~{{$musics[$i]->thumbnail}}~!!!~{{$musics[$i]->song_key}}~!!!~{{$musics[$i]->id}}"
                                     nonce="{{$musics[$i]->author}}" slot="{{$musics[$i]->song_file}}"
                                     style="height: 100%;cursor: pointer;transition: 0.3s;background: #fc87ad "
                                     class="d-flex align-items-center p-1 justify-content-center col-2 col-sm-3 col-md-3 col-lg-3 text-light  btn_text_play_music">
                                    <strong
                                        elementTiming="{{$musics[$i]->lyrics}}~!!!~{{$musics[$i]->thumbnail}}~!!!~{{$musics[$i]->song_key}}~!!!~{{$musics[$i]->id}}"
                                        accesskey="{{$musics[$i]->song_name}}"
                                        nonce="{{$musics[$i]->author}}">play</strong>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
                {{--                @foreach($musics as $music)--}}
                {{--                @endforeach--}}
            </div>
        </div>
    </div>
    <div class="col-12 position-fixed fixed-bottom d-flex justify-content-center"
         style="height: 60px;z-index: 1234567890!important;">
        <div id="control_container" class="col-12 col-sm-10 col-md-7 col-lg-7 col-xl-6 bg-dark d-none"
             style="height: 150%;transform: translateY(-25px);border-radius: 2px;z-index: 1234567890!important;">
            <div class="col-12 d-flex justify-content-center align-items-center" id="song_control" style="height: 60%">
                <i style="color: white" id="btn_active_random" class="m-2 fa fa-random " aria-hidden="true"></i>
                <i style="color: white;font-size: 20px" class=" m-2 fa fa-backward" id="previous_song"
                   aria-hidden="true"></i>
                <i id="btn_icon_play"
                   style="width: 40px;height: 40px;font-size: 18px;background: white;border-radius: 50%;transform: translateY(3px)"
                   class="d-flex justify-content-center align-items-center m-2 fa fa-play" aria-hidden="true"></i>
                <i id="btn_icon_pause"
                   style="width: 40px;height: 40px;font-size: 18px;background: white;border-radius: 50%;transform: translateY(3px)"
                   class="d-none justify-content-center align-items-center m-2 fa fa-pause" aria-hidden="true"></i>
                <i style="color: white;font-size: 20px" class=" m-2 fa fa-forward" id="next_song"
                   aria-hidden="true"></i>
                <i style="color: white" accesskey="1" id="btn_control_repeat" class="m-2 fa fa-repeat"
                   aria-hidden="true"></i>
            </div>
            <i style="position: absolute;right: 15px;top:10px;font-size: 20px;color: white;cursor: pointer;transition: 0.3s"
               class="fa fa-list" aria-hidden="true"></i>
            <i id="show_lyrics"
               style="position: absolute;left: 15px;top:10px;font-size: 20px;color: white;cursor: pointer;transition: 0.3s"
               class="fa fa-file-text" aria-hidden="true" data-toggle="modal" data-target="#exampleModalLong"></i>
            <div class="col-12">
                <div class="col-12 d-flex flex-wrap justify-content-center" style="height: 50%">
                    <p class="text-light d-inline" id="show_name_song_play" style="font-size: 12px"></p>
                    <div class="progress-container" id="progress-container">
                        <div class="progress" id="progress"></div>
                        <div class="duration-wrapper">
                            <span style="color: white;font-size: 11px" id="current-time">0:00</span>
                            <span style="color: white;font-size: 11px" id="duration">0:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <i id="back_to_top" style="position: fixed ; bottom: 15px ;right: 7px;font-size: 20px;width: 30px;height: 30px;background: #f83a3a;color: white;z-index: 1234567890;border-radius: 3px;border: #3a3a3a 2px solid" class="fa fa-arrow-up d-flex justify-content-center align-items-center" aria-hidden="true"></i>
    </div>



</div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true" style="margin-bottom: 100px;margin-top: 65px!important;">
    <div class="modal-dialog" role="document" style="margin-bottom: 135px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Lyrics : <span id="name_song7439"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="lyrics_content"></p>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<audio></audio>
<input type="hidden" id="check_nav_active" value="discover">
<input type="hidden" id="lyrics_inputt">
<input type="hidden" id="check_song_active">
@include('.user.layout.script')
@include('.user.layout.indexjs')
</body>
</html>
{{--// music.playbackRate = 2--}}
