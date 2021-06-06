<!DOCTYPE html>
<html lang="en">
<head>
    @include('.admin.layOuts.head')
    @include('.admin.layOuts.admin_song_detail_style')
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }
    </style>
    <title>Music box || Song detail</title>
</head>

<body>
<div class="wrapper">
    @include('.admin.layOuts.sideBar')
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg " >
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> Dashboard </a>
            </div>
        </nav>
        <nav class="navbar navbar-expand-sm" style="position: sticky;top: 0;z-index: 1123456">
            <div class="container-fluid d-flex justify-content-center ">
                <span class="text-danger">Public by : {{$song->public_by}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                {{$song->like}} &nbsp;<i class="fa fa-heart" aria-hidden="true" style="color: #f14e4e"></i>
                &nbsp;&nbsp;&nbsp;&nbsp;
                {{$song->views}} &nbsp;<i class="fa fa-eye" aria-hidden="true" style="color: #252525"></i>
            </div>
        </nav>

        {{--        content        --}}
        <div class="content">

            <div class="col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-sm-12 row ml-0" style="z-index: 100;overflow: hidden">


                <div style=" height: 600px;position: sticky;top: 30px;z-index: 100" class="col-12 col-md-7">
                    <div class="col-12 d-flex justify-content-center " style="height: 50%;">
                        <img src="{{url($song->thumbnail)}}" style="height: 300px;width: 300px;box-shadow: black 0 5px 20px;border-radius: 8px;object-fit: cover">
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-4 mb-3">
                        <h2>{{$song->song_name}}</h2>
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-4 mb-3">
                        <h5>{{$song->author}}</h5>
                    </div>

                    <div class="col-12" style="height: 50%">
                        <div class="controll_audio">
                            <div class="player-container">
                                <div class="player-controls">
                                    <i slot="{{$song->song_file}}" class="fas fa fa-play main-button" id="play" title="Play" aria-hidden="true"></i>
                                </div>
                                <div class="progress-container" id="progress-container">
                                    <div class="progress" id="progress"></div>
                                    <div class="duration-wrapper">
                                        <span id="current-time">0:00</span>
                                        <span id="duration">00:00</span>
                                    </div>
                                </div>
                            </div>
                            <audio></audio>
                        </div>
                    </div>


                </div>





                <div class="col-12 col-md-5 d-flex justify-content-center">
                <div class="col-12 col-xl-6 col-md-9" style="overflow: scroll;max-height: 600px">
                    <h3>{{$song->song_name}}</h3><br>

                    @if($song->lyrics != null)
                        {{$song->lyrics}}
                    @else
                        <p class="text-secondary">Hiện tại lời bài hát này chưa được tác giả cập nhật</p>
                        <img src="https://qotoqot.com/sad-animations/img/200/silent_tears/silent_tears.png" alt="false" style="width: 100%">
                    @endif

                </div>
                </div>

            </div>
            <br><br>

        </div>

        @include('.admin.layOuts.footer')

    </div>
</div>
</body>
@include('.admin.layOuts.script')
@include('.admin.layOuts.admin_detail_song_play')

</html>
