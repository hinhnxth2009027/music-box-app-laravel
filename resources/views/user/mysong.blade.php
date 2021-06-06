<!DOCTYPE html>
<html lang="en">
<head>
    @include('.user.layout.head')
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }
        .content_song_info {
            height: 370px;
        }
        @media only screen and (min-width: 1450px) {
            .content_song_info1 {
                height: 370px;
            }
        }
        @media only screen and (max-width: 1449px) {
            .content_song_info1 {
                height: 260px;
            }
        }
        @media only screen and (max-width: 980px) {
            .content_song_info1 {
                height: 370px;
            }
            .song_name{
                width: 100%;
                overflow: hidden;
                height: 29px;
            }
        }
        @media only screen and (max-width: 770px) {
            .content_song_info {
                padding: 0!important;
                margin: 0!important;
            }
            #songs_public {
                padding: 0!important;
            }
            .content {
                padding: 0!important;
            }
            .content_song_info1 {
                height: 240px;
            }
            .song_name{
                width: 100%;
                overflow: hidden;
                height: 29px;
            }
        }
        @media only screen and (max-width: 500px) {
            .content_song_info {
                height: 400px!important;
            }
            .content_song_info1 {
                height: 140px;
            }
            .song_name{
                width: 100%;
                overflow: hidden;
                height: 29px;
            }
        }
        .navbar {
            padding: 0 10px!important;
        }
    </style>
    <title>Music box || my songs</title>
</head>
<body>
<div class="wrapper">
    @include('.user.layout.sidebar_left')
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg" style=" max-width: 120%;position: sticky;top: 0;z-index: 10">
            <div class="container-fluid" style="padding: 0 !important;">
                <div>
                    <button id="song_public" class="btn btn-primary">The song is public</button>
                    <button id="song_private" class="btn btn-warning">Unreleased song</button>
                </div>
                <button class="btn btn-primary d-none "><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
        </nav>
        {{--        content        --}}
        <div class="content">
            <div class="col-12" id="songs_public">
                <div class="col-12 d-flex justify-content-center">
                    @if(sizeof($songspl) >=1)
                        <h1 style="font-size: 50px;font-family: sans-serif;" class="text-success">
                            Has been licensed
                        </h1>
                    @endif
                </div>
                @if(sizeof($songspl) >=1)
                    @for($i = sizeof($songspl)-1 ; $i>=0 ; $i--)
                        <div  class=" content_song_info col-12 d-flex justify-content-center mb-4" style=";overflow: hidden;">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-8 row" style="margin: 0;padding: 0;box-shadow: black 0 0 100px">
                                <div class="col-5">
                                    <img class="content_song_info1" src="{{$songspl[$i]->thumbnail}}"
                                         style="width: 100%;object-fit: cover;border-radius: 5px" alt="">
                                </div>
                                <div class="col-7" style="overflow: hidden;height: 100%">
                                    <div class="col-12" style="height: 30%">
                                        <p class="text-danger song_name"
                                           style="font-size:    20px;margin-bottom: 3px!important;">{{$songspl[$i]->song_name}}</p>
                                        <p class="text-secondary"
                                           style="font-size: 16px;margin-bottom: 3px!important;">{{$songspl[$i]->author}}</p>
                                        <p class="text-secondary"
                                           style="font-size: 12px;margin-bottom: 3px!important;">{{$songspl[$i]->created_at}}</p>
                                        <div>
                                            <i class="text-danger fa fa-heart"  aria-hidden="true"></i>&nbsp;<span
                                                style="font-size: 16px;font-weight: bold">{{$songspl[$i]->like}}</span>&nbsp;&nbsp;&nbsp;
                                            <i class="text-primary fa fa-eye" aria-hidden="true"></i>&nbsp; <span
                                                style="font-size: 16px;font-weight: bold">{{$songspl[$i]->views}}</span>
                                        </div>
                                    </div>
                                    <div class="col-12" style="height: 70%;overflow: scroll">
                                        @if($songspl[$i]->lyrics != '')
                                            <p style="font-size: 13px">{{$songspl[$i]->lyrics}}</p>
                                        @else
                                            <p style="font-size: 13px">bài hát của bạn hiện chưa có lời đi đến<a href="#">: thêm lời bài hát</a></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                @else
                    <div class="col-12 d-flex justify-content-center mb-4" style="height: 370px;overflow: hidden;">
                        <div class="col-6 row d-flex" style="margin: 0;padding: 0;box-shadow: black 0 0 100px">
                            <img
                                src="https://images.unsplash.com/photo-1525120334885-38cc03a6ec77?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8&w=1000&q=80"
                                style="width: 100%" alt="">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center mb-4" style="height: 370px;overflow: hidden;">
                        @if(sizeof($songspv) == 0)
                            <div class="col-9 d-flex justify-content-center">
                                <p style="font-weight: 600;font-size: 24px" class="text-secondary">
                                    Có vẻ như bạn chưa có bài đăng nào cả bấm <a href="{{route('song_upload_page')}}"><span>vào đây</span></a> để đi
                                    đến upload
                                </p>
                            </div>
                        @else
                            <div class="col-9 d-flex justify-content-center">
                                <p style="font-weight: 600;font-size: 24px" class="text-secondary">
                                    những bài hát bạn đăng tải đang chờ xét duyệt
                                </p>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <div style="display: none" class="col-12 " id="songs_private">
                <div class="col-12 d-flex justify-content-center">
                    @if(sizeof($songspv) >=1)
                        <h1 style="font-size: 50px;font-family: sans-serif;" class="text-primary">
                            waiting for review
                        </h1>
                    @endif
                </div>

                @if(sizeof($songspv) >=1)
                    @for($i = sizeof($songspv)-1 ; $i>=0 ; $i--)
                        <div class="col-12 d-flex justify-content-center mb-4 content_song_info" style=";overflow: hidden;">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-8 row" style="margin: 0;padding: 0;box-shadow: black 0 0 100px">
                                <div class="col-5">
                                    <img class="content_song_info1" src="{{$songspv[$i]->thumbnail}}"
                                         style="width: 100%;object-fit: cover;border-radius: 5px" alt="">
                                </div>
                                <div class="col-7" style="overflow: hidden;height: 100%">
                                    <div class="col-12" style="height: 25%">
                                        <p class="text-danger song_name"
                                           style="font-size:    20px;margin-bottom: 3px!important;">{{$songspv[$i]->song_name}}</p>
                                        <p class="text-secondary"
                                           style="font-size: 16px;margin-bottom: 3px!important;">{{$songspv[$i]->author}}</p>
                                        <p class="text-secondary"
                                           style="font-size: 12px;margin-bottom: 3px!important;">{{$songspv[$i]->created_at}}</p>
                                    </div>
                                    <div class="col-12" style="height: 75%;overflow: scroll">
                                        @if($songspv[$i]->lyrics != '')
                                            <p style="font-size: 13px">{{$songspv[$i]->lyrics}}</p>
                                        @else
                                            <br>
                                            <p style="font-size: 16px" class="text-secondary">bài hát của bạn hiện chưa có lời
                                                <a href="#">: thêm lời bài hát</a> </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                @else
                    <div class="col-12 d-flex justify-content-center mb-4" style="height: 370px;overflow: hidden;">
                        <div class="col-6 row d-flex" style="margin: 0;padding: 0;box-shadow: black 0 0 100px">
                            <img
                                src="https://images.unsplash.com/photo-1525120334885-38cc03a6ec77?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8&w=1000&q=80"
                                style="width: 100%" alt="">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center mb-4" style="height: 370px;overflow: hidden;">
                        <div class="col-9 d-flex justify-content-center">
                            <p style="font-weight: 600;font-size: 24px" class="text-secondary">
                                Có vẻ như bạn chưa có bài đăng nào cả bấm <a href="{{route('song_upload_page')}}"><span>vào đây</span></a> để đi đến
                                upload
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="check_nav_active" value="my_Songs">
@include('.user.layout.script')
<script>
    $('#song_public').click(function () {
        $('#songs_public').show()
        $('#songs_private').hide()
    })
    $('#song_private').click(function () {
        $('#songs_public').hide()
        $('#songs_private').show()
    })

    // sidebar


</script>
</body>
</html>
