<!DOCTYPE html>
<html lang="en">
<head>
    @include('.admin.layOuts.head')
    <title>Music box || Profile</title>
</head>

<body>
<div class="wrapper">
    @include('.admin.layOuts.sideBar')
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('dashboard')}}"> Dashboard </a>
            </div>
        </nav>

        {{--        content        --}}
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    {{--                    ở đây còn html --}}
                    <div class="col-md-5 col-12 col-sm-12 m-auto" style="overflow: hidden">
                        <div class="card card-user">
                            <div class="card-image">
                                <img
                                    src="{{url($info_user->cover_photo)}}">
                            </div>

                            <div class="card-body">
                                <div class="author">

                                    <img class="avatar border-gray"
                                         src="{{url($info_user->avatar)}}"
                                         style="object-fit: cover">
                                    <h5 class="title">{{$info_user->name}}</h5>
                                    <table class="table table-striped">
                                        <thead>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{$info_user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td>{{$info_user->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Birthday</th>
                                            <td>{{$info_user->birthday}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td>{{$info_user->address}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Create At</th>
                                            <td>{{$info_user->created_at}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="row d-flex justify-content-center">
                                        <button class="col-5 btn btn-warning m-1 opent_UDU" data-toggle="modal"
                                                data-target="#exampleModalCenter">Edit Profile
                                        </button>
                                        <button class="col-5 btn btn-primary m-1 opent_CNU" id="opent_CNU"
                                                data-toggle="modal" data-target="#exampleModalCenter">Create New User
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @if (session('email_error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error</strong> {{session('email_error')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            @endif
                            @if (session('register_success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>good</strong> {{session('register_success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            @endif

                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="col-md-8 mt-5 mr-auto ml-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title" id="card-title"></h4>
                                        </div>
                                        {{--action="{{route("create_new_user")}}"--}}
                                        <div class="card-body">
                                            <form method="POST" id="create_new_user">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-4 ">
                                                        <div class="form-group">
                                                            <label for="name">Username</label>
                                                            <input id="name" name="name" type="text"
                                                                   class="form-control" placeholder="Username">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="form-group">
                                                            <label for="email">Email
                                                                address</label>
                                                            <input id="email" name="email" type="email"
                                                                   class="form-control" placeholder="Plzzz Enter email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input id="password" name="password" type="password"
                                                                   class="form-control"
                                                                   placeholder="Enter password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="confirm_password">Confirm Password</label>
                                                            <input name="confirm_password" id="confirm_password"
                                                                   type="password"
                                                                   class="form-control"
                                                                   placeholder="Enter the password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="phone">Phone</label>
                                                            <input id="phone" name="phone" type="text"
                                                                   class="form-control"
                                                                   placeholder="Enter Phone Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <div class="form-group">
                                                            <label for="demo_overview_minimal">Role</label><br>
                                                            <select id="demo_overview_minimal" name="role" class="form-control">
                                                                @foreach(\App\Enums\Role::getValues() as $type)
                                                                    <option
                                                                        value="{{$type}}"@if($type === 0){{'selected'}}@endif>{{\App\Enums\Role::getDescription($type)}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="Address">Address</label>
                                                            <input id="Address" name="address" type="text"
                                                                   class="form-control"
                                                                   placeholder="Enter Address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row item_for_update">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="instagram">instagram <i class="fa fa-instagram" aria-hidden="true" style="color: rgba(255,0,251,0.85)"></i></label>
                                                            <input id="instagram" name="instagram" type="text"
                                                                   class="form-control"
                                                                   placeholder="Enter Instagram id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="facebook">facebook <i class="fa fa-facebook-square" style="color: #2868ec"></i></label>
                                                            <input id="facebook" name="facebook" type="text"
                                                                   class="form-control"
                                                                   placeholder="Enter Facebook link">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row item_for_update">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="twitter">twitter <i class="fa fa-twitter" style="color: #00bbff"></i></label>
                                                            <input id="twitter" name="twitter" type="text"
                                                                   class="form-control"
                                                                   placeholder="Enter Twitter id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="github">Git hub <i class="fa fa-github" aria-hidden="true" style="color: rgba(0,0,0,0.85)"></i></label>
                                                            <input id="github" name="github" type="text"
                                                                   class="form-control"
                                                                   placeholder="Enter Github link">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="birthday">Birthday</label>
                                                            <input id="birthday" name="birthday" type="date"
                                                                   class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 px-1 row m-1 avt_cv_container">
                                                        <div id="avatar_btn"
                                                             class=" d-flex justify-content-center align-items-center"
                                                             style="border: black 2px solid;margin: 0.25rem!important;"></div>

                                                        <div id="avatar_show"
                                                             class=" d-flex justify-content-center align-items-center" style="margin: 0.25rem!important;">
                                                            <img id="img_avt_show"
                                                                 src="" alt="">

                                                        </div>


                                                        <div id="cover_photo_btn"
                                                             class=" d-flex justify-content-center align-items-center"
                                                             style="border: black 2px solid;margin: 0.25rem!important;"></div>

                                                        <div id="cover_photo_show"
                                                             class=" d-flex justify-content-center align-items-center" style="margin: 0.25rem!important;">
                                                            <img id="img_cover_show"
                                                                 src="" alt="">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div
                                                    style="height: 70px ;width: 100%;border-bottom: black 2px solid;margin-bottom: 10px"></div>
                                                <button type="submit" class="btn_form_admin btn btn-info btn-fill pull-right m-1">Submit</button>
                                                <button type="button" id="close_CNU" class="btn_form_admin btn btn-warning btn-fill pull-right m-1">Close</button>
                                                {{--     all input hiden--}}
                                                <div id="input_hident" style="display: none">
                                                    <input type="file" id="select_avatar">
                                                    <input type="file" id="select_cover_photo">
                                                </div>
                                                <input type="hidden" id="post_avatar" name="avatar"
                                                       value="">
                                                <input type="hidden" id="post_cover_photo" name="cover_photo"
                                                       value="">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="box_shadow"></div>
                            <hr>
                            <div class="button-container mr-auto ml-auto">

                                @if($info_user->facebook!=null)
                                    <a target="_blank" href="{{url($info_user->facebook)}}" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-facebook-square" style="color: #2868ec"></i>
                                    </a>
                                @endif
                                @if($info_user->twitter!=null)
                                    <a target="_blank" href="{{url($info_user->twitter)}}" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-twitter" style="color: #00bbff"></i>
                                    </a>
                                @endif
                                @if($info_user->instagram!=null)
                                    <a target="_blank" href="{{url($info_user->instagram)}}" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-instagram" aria-hidden="true" style="color: rgba(255,0,251,0.85)"></i>
                                    </a>
                                @endif
                                @if($info_user->github!=null)
                                    <a target="_blank" href="{{url($info_user->github)}}" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-github" aria-hidden="true" style="color: rgba(0,0,0,0.85)"></i>
                                    </a>
                                @endif
                                @if($info_user->github==null&&$info_user->instagram==null&&$info_user->twitter==null&&$info_user->facebook==null)
                                    <p>Chỉnh sửa profile để thêm các liên kết mạng xã hội</p>
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
<input type="hidden" id="check_nav_active" value="Profile">
</body>
@include('.admin.layOuts.script')
<script>
    $('.opent_CNU').click(function (){
        var data =$('#exampleModalCenter');
        data.addClass('show');
        data.show();
        var box = $("#box_shadow")
        box.addClass('modal-backdrop')
        box.addClass('show')
        box.addClass('fade')
        $('.item_for_update').hide()
        $("#card-title").text("Create New User")
        $("#create_new_user").attr("action","{{route("create_new_user")}}");
        $('#name').val("")
        $('#email').val("")
        $('#phone').val("")
        $('#Address').val("")
        $('#birthday').val("")
        $('#post_avatar').val("https://iupac.org/wp-content/uploads/2018/05/default-avatar.png")
        $('#post_cover_photo').val("https://data.webnhiepanh.com/wp-content/uploads/2020/11/21105453/phong-canh-1.jpg")
        $('#img_avt_show').attr('src','https://iupac.org/wp-content/uploads/2018/05/default-avatar.png')
        $('#img_cover_show').attr('src','https://data.webnhiepanh.com/wp-content/uploads/2020/11/21105453/phong-canh-1.jpg')
        $('#instagram').val("")
        $('#facebook').val({{""}})
        $('#twitter').val({{""}})
        $('#github').val({{""}})
    });



    $('.opent_UDU').click(function (){
        var data =$('#exampleModalCenter');
        data.addClass('show');
        data.show();
        var box = $("#box_shadow")
        box.addClass('modal-backdrop')
        box.addClass('show')
        box.addClass('fade')
        $('.item_for_update').show()
        $("#card-title").text("Edit Profile")
        $("#create_new_user").attr("action","{{route("update_user",$info_user->id)}}");
        $('#name').val("{{$info_user->name}}")
        $('#email').val("{{$info_user->email}}")
        $('#phone').val("{{$info_user->phone}}")
        $('#Address').val("{{$info_user->address}}")
        $('#birthday').val("{{$info_user->birthday}}")
        $('#post_avatar').val("{{$info_user->avatar}}")
        $('#post_cover_photo').val("{{$info_user->cover_photo}}")
        $('#img_avt_show').attr('src','{{$info_user->avatar}}')
        $('#img_cover_show').attr('src','{{$info_user->cover_photo}}')

        $('#instagram').val("{{$info_user->instagram}}")


        $('#facebook').val("{{$info_user->facebook}}")


        $('#twitter').val("{{$info_user->twitter}}")


        $('#github').val("{{$info_user->github}}")




    });
</script>

</html>
