<!DOCTYPE html>
<html lang="en">
<head>
    @include('.user.layout.head')
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }
    </style>

    <title>Music box || account</title>
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
        <div class="" style="border: 0!important;">

{{--            modal fade--}}

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="col-md-8 mt-5 mr-auto ml-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="card-title"></h4>
                        </div>
                        {{--action="{{route("create_new_user")}}"--}}
                        <div class="card-body">
                            <form method="POST" id="create_new_user" action="{{route('store_user')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="name">Full name</label>
                                            <input id="name" name="name" type="text"
                                                   class="form-control" placeholder="Full name">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input id="phone" name="phone" type="text"
                                                   class="form-control"
                                                   placeholder="Enter Phone Number">
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
                                                 src="https://iupac.org/wp-content/uploads/2018/05/default-avatar.png" alt="">

                                        </div>


                                        <div id="cover_photo_btn"
                                             class=" d-flex justify-content-center align-items-center"
                                             style="border: black 2px solid;margin: 0.25rem!important;"></div>

                                        <div id="cover_photo_show"
                                             class=" d-flex justify-content-center align-items-center" style="margin: 0.25rem!important;">
                                            <img id="img_cover_show"
                                                 src="http://res.cloudinary.com/dvoe9idbe/image/upload/v1620830924/jshyc2msdnccypquuuaf.jpg" alt="">
                                        </div>

                                    </div>
                                </div>
                                <div
                                    style="height: 70px ;width: 100%;border-bottom: black 2px solid;margin-bottom: 10px"></div>
                                <button type="submit" class="btn_form_admin btn btn-info btn-fill pull-right m-1">Register</button>
                                <button type="button" id="close_CNU" class="btn_form_admin btn btn-warning btn-fill pull-right m-1">Close</button>
                                {{--     all input hiden--}}
                                <div id="input_hident" style="display: none">
                                    <input type="file" id="select_avatar">
                                    <input type="file" id="select_cover_photo">
                                </div>
                                <input type="hidden" id="post_avatar" name="avatar"
                                       value="https://iupac.org/wp-content/uploads/2018/05/default-avatar.png">
                                <input type="hidden" id="post_cover_photo" name="cover_photo"
                                       value="http://res.cloudinary.com/dvoe9idbe/image/upload/v1620830924/jshyc2msdnccypquuuaf.jpg">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="box_shadow"></div>

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
            @if (session('login_error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Invalid</strong> {{session('login_error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif























            <div class="container pt-5"  id="login_table">
                <div class="row justify-content-center">
                    <div class="col-md-6 contents">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="form-block p-3" style="border: #b4b3b3 1px solid;box-shadow: #777777 20px 20px 100px">
                                    <div class="mb-4">
                                        <h3 class="text-danger"><strong>Music Box</strong></h3>
                                    </div>
                                    <form action="{{route('checkLogin')}}" method="post">
                                        @csrf
                                        <div class="form-group first">
                                            <label for="email">Email</label>
                                            <input style="height: 45px" type="text" class="form-control" id="email" name="email" value="@if(session('email')){{session('email')}}@endif" required>
                                        </div>
                                        <div class="form-group last mb-4">
                                            <label for="password">Password</label>
                                            <input style="height: 45px" type="password" class="form-control" name="password" value="@if(session('password')){{session('password')}}@endif" id="password" required>
                                        </div>
                                        <br>
                                        <input type="submit" value="Log In"
                                               class="btn btn-pill text-white btn-block btn-danger">
                                        <p class="d-block text-center my-4 text-muted"> Do not have an account? <b
                                                class="text-primary" id="open_sign_up_table" style="cursor: pointer">sign up</b></p>
                                        <div class="social-login text-center">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<audio></audio>
<input type="hidden" id="check_nav_active" value="account">
@include('.user.layout.script')

<script>
    $('#close_CNU').click(function (){
        $('#exampleModalCenter').addClass('modal')
        $('#exampleModalCenter').addClass('fade')
        $('#login_table').show()
    })
    $('#open_sign_up_table').click(function (){
        $('#login_table').hide()
        $('#exampleModalCenter').removeClass('modal')
        $('#exampleModalCenter').removeClass('fade')
    })

</script>

</body>
</html>
