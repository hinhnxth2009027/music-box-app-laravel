<!DOCTYPE html>
<html lang="en">
<head>
    @include('.user.layout.head')
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }
    </style>

    <title>Music box || profile</title>
</head>
<body>
<div class="wrapper">
    @include('.user.layout.sidebar_left')
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg" style=" max-width: 120%;position: sticky;top: 0;z-index: 10">
            <div class="container-fluid" style="padding: 0 !important;">
            </div>
        </nav>
        {{--        content        --}}
        <div class="content">

            <div id="user_show_profile" class="container-fluid ">
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
                                            <th scope="row">Join from date</th>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="row d-flex justify-content-center">
                                        <button id="opent_UDU" class="col-5 btn btn-warning m-1 opent_UDU">Edit Profile</button>
                                    </div>
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
                                    <p>bạn chưa cập nhật kiên kết mạng xã hội nào edit profile để cập nhật</p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="col-md-8 mt-5 mr-auto ml-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="card-title"></h4>
                        </div>
                        {{--action="{{route("create_new_user")}}"--}}
                        <div class="card-body">
                            <form method="POST" id="create_new_user" action="{{route('update_profile',$user->id)}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="name">Full name</label>
                                            <input id="name" name="name" type="text" value="{{$user->name}}"
                                                   class="form-control" placeholder="Full name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="email">Email
                                                address</label>
                                            <input id="email" name="email" type="email" value="{{$user->email}}"
                                                   class="form-control" placeholder="Plzzz Enter email">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="password">Old password</label>
                                            <input id="password" name="password" type="password"
                                                   class="form-control"
                                                   placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-none">
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm Password</label>
                                            <input name="confirm_password" id="confirm_password"
                                                   type="password"
                                                   class="form-control"
                                                   placeholder="Enter the password">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">New password</label>
                                            <input id="phone" name="new_password" type="text"
                                                   class="form-control"
                                                   placeholder="Enter New password ( Optional )">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input id="phone" name="phone" type="text" value="{{$user->phone}}"
                                                   class="form-control"
                                                   placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                </div>






                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Address">Address</label>
                                            <input id="Address" name="address" type="text" value="{{$user->address}}"
                                                   class="form-control"
                                                   placeholder="Enter Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row item_for_update">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instagram">instagram <i class="fa fa-instagram" aria-hidden="true" style="color: rgba(255,0,251,0.85)"></i></label>
                                            <input id="instagram" name="instagram" type="text" value="{{$user->instagram}}"
                                                   class="form-control"
                                                   placeholder="Enter Instagram id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="facebook">facebook <i class="fa fa-facebook-square" style="color: #2868ec"></i></label>
                                            <input id="facebook" name="facebook" type="text" value="{{$user->facebook}}"
                                                   class="form-control"
                                                   placeholder="Enter Facebook link">
                                        </div>
                                    </div>
                                </div>
                                <div class="row item_for_update">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="twitter">twitter <i class="fa fa-twitter" style="color: #00bbff"></i></label>
                                            <input id="twitter" name="twitter" type="text" value="{{$user->twitter}}"
                                                   class="form-control"
                                                   placeholder="Enter Twitter id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="github">Git hub <i class="fa fa-github" aria-hidden="true" style="color: rgba(0,0,0,0.85)"></i></label>
                                            <input value="{{$user->github}}" id="github" name="github" type="text"
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
                                                   value="{{$user->birthday}}"
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
                                                 src="{{$user->avatar}}" alt="">

                                        </div>
                                        <div id="cover_photo_btn"
                                             class=" d-flex justify-content-center align-items-center"
                                             style="border: black 2px solid;margin: 0.25rem!important;"></div>

                                        <div id="cover_photo_show"
                                             class=" d-flex justify-content-center align-items-center" style="margin: 0.25rem!important;">
                                            <img id="img_cover_show"
                                                 src="{{$user->cover_photo}}" alt="">
                                        </div>

                                    </div>
                                </div>
                                <div
                                    style="height: 70px ;width: 100%;border-bottom: black 2px solid;margin-bottom: 10px"></div>
                                <button type="submit" class="btn_form_admin btn btn-info btn-fill pull-right m-1">Update</button>
                                <button type="button" id="close_CNU" class="btn_form_admin btn btn-warning btn-fill pull-right m-1">Close</button>
                                {{--     all input hiden--}}
                                <div id="input_hident" style="display: none">
                                    <input type="file" id="select_avatar">
                                    <input type="file" id="select_cover_photo">
                                </div>
                                <input type="hidden" id="post_avatar" name="avatar"
                                       value="{{$user->avatar}}">
                                <input type="hidden" id="post_cover_photo" name="cover_photo"
                                       value="{{$user->cover_photo}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<input type="hidden" id="check_nav_active" value="Profile">



@include('.user.layout.script')

<script>
    $('#password').keyup(function (){
       $('#confirm_password').val($('#password').val())

    })
    $('#close_CNU').click(function (){
        $('#exampleModalCenter').addClass('modal')
        $('#exampleModalCenter').addClass('fade')
        $('#login_table').show()
    })

    $('#close_CNU').click(function (){
        $('#exampleModalCenter').addClass('modal')
        $('#exampleModalCenter').addClass('fade')
        $('#user_show_profile').show()
    })


    $('#opent_UDU').click(function (){
        $('#user_show_profile').hide()
        $('#exampleModalCenter').removeClass('modal')
        $('#exampleModalCenter').removeClass('fade')
    })


</script>
</body>
</html>
