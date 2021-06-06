<!DOCTYPE html>
<html lang="en">
<head>
    @include('.admin.layOuts.head')
    <title>Music box || User detail</title>
</head>

<body>
<div class="wrapper">
    @include('.admin.layOuts.sideBar')
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class="container-fluid">
                <a class="navbar-brand" href="#pablo"> Dashboard </a>
            </div>
        </nav>

        {{--        content        --}}
        <div class="content">


            <div class="container-fluid">
                <div class="row">
                    {{--                    ở đây còn html --}}
                    <div class="col-md-6 col-12 col-sm-12 m-auto" style="overflow: hidden">
                        <div class="card card-user">
                            <div class="card-image" style="height: 200px !important;">
                                <img
                                    src="{{url($user->cover_photo)}}">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <img class="avatar border-gray" src="{{url($user->avatar)}}" style="
                                    @if($user->role == 0)

                                        object-fit: cover;border: 4px solid #f80071 !important;

                                    @else

                                        object-fit: cover;border: 4px solid #7283f5 !important;

                                    @endif
                                    ">
                                    <h5 class="title text-primary">{{$user->name}}</h5>
                                    <table class="table table-striped">
                                        <thead>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td>{{$user->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Birthday</th>
                                            <td>{{$user->birthday}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td>{{$user->address}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Create At</th>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div id="box_shadow"></div>
                            <hr>
                            <div class="button-container mr-auto ml-auto">

                                @if($user->facebook!=null)
                                    <a target="_blank" href="{{url($user->facebook)}}"
                                       class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-facebook-square" style="color: #2868ec"></i>
                                    </a>
                                @endif
                                @if($user->twitter!=null)
                                    <a target="_blank" href="{{url($user->twitter)}}"
                                       class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-twitter" style="color: #00bbff"></i>
                                    </a>
                                @endif
                                @if($user->instagram!=null)
                                    <a target="_blank" href="{{url($user->instagram)}}"
                                       class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-instagram" aria-hidden="true"
                                           style="color: rgba(255,0,251,0.85)"></i>
                                    </a>
                                @endif
                                @if($user->github!=null)
                                    <a target="_blank" href="{{url($user->github)}}"
                                       class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-github" aria-hidden="true" style="color: rgba(0,0,0,0.85)"></i>
                                    </a>
                                @endif

                                @if($user->github==null&&$user->instagram==null&&$user->twitter==null&&$user->facebook==null)
                                    <p>Người dùng này chưa cập nhật các liên kết mạng xã hội</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        @include('.admin.layOuts.footer')

    </div>
</div>
@include('.admin.layOuts.script')
</body>
</html>
