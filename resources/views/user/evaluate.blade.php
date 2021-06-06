<!DOCTYPE html>
<html lang="en">
<head>
    @include('.user.layout.head')
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }
        .is_star {
            color: #ffd900;
            font-size: 20px;
            margin: 0 3px;
        }
    </style>

    <title>Music box || evaluate</title>
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
            @if(session('send_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> {{session('send_success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
        <div class="col-12 d-flex justify-content-center" style="padding: 0!important;">
            <div class="col-12 col-md-9 col-lg-8 col-xl-6" style="padding: 0!important;">
                <div class="col-12" style="padding: 0!important;" >
                    <div class="col-12 d-flex justify-content-center align-items-center flex-wrap position-sticky " style="top: 55px;background: #67cef4!important;z-index: 100;border-radius: 6px">
                        <h3 class="col-12 text-danger text-center pr-3">Overall rating</h3>
                        <p style="margin: 0!important;">{{print round($starw,3)}}<i class="fa is_star fa-star" aria-hidden="true"></i></p>
                        <div class="col-12 d-flex justify-content-center mt-2">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mb-3">viết đánh giá</button>
                            @else
                                <p>vui lòng đăng nhập để làm đánh giá</p>
                            @endif
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('evaluate_send')}}" id="send_feedback" method="post">
                                        @csrf
                                        <i class="fa is_star fa-star-check fa-star" aria-hidden="true"></i>
                                        <i class="fa is_star fa-star-check fa-star-o" aria-hidden="true"></i>
                                        <i class="fa is_star fa-star-check fa-star-o" aria-hidden="true"></i>
                                        <i class="fa is_star fa-star-check fa-star-o" aria-hidden="true"></i>
                                        <i class="fa is_star fa-star-check fa-star-o" aria-hidden="true"></i>
                                        <div class="form-group">
                                            <label for="mesage">Message</label>
                                            <textarea name="message" style="min-height: 150px" id="mesage" class="form-control"></textarea>
                                            <input type="hidden" name="star" id="star_count">
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                                <input type="hidden" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="submit_form" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 m-auto">
                        @foreach($feedbacks as $i=>$feedback)
                            <div class="row d-flex align-items-center mt-2" style="height: 35px">
                                <img style=" width: 35px;height: 35px;object-fit: cover ;border-radius: 50%;border: #00bbff 2px solid" class="mr-2" src="{{$feedback->user->avatar}}" alt="">
                                <p style="line-height: 35px;font-size: 12px;color: #1a202c;font-family: sans-serif;margin: 0!important;">{{$feedback->user->name}}</p>
                            </div>
                            <p class="ml-5 " style="margin: 0 30px;transform: translateY(-10px)!important;">
                                @if($feedback->star == 1)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($feedback->star == 2)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($feedback->star == 3)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @elseif($feedback->star == 4)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @endif
                            </p>
                            <p class="ml-5 mt-1">{{$feedback->message}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

</div>
<input type="hidden" id="check_nav_active" value="evaluate">



@include('.user.layout.script')

<script>
    $('.fa-star-check').click(function (){
        $('.fa-star-check').removeClass('fa-star')
        $('.fa-star-check').addClass('fa-star-o')
        var countStar = $('.fa-star-check').index(this)+1
        var showStar = document.querySelectorAll('.fa-star-check')
        for (let i = 0; i < countStar ; i++) {
            showStar[i].classList.add('fa-star')
            showStar[i].classList.remove('fa-star-o')
        }
        $('#star_count').val(countStar)
    })

$('#submit_form').click(function (){
    if ($('#star_count').val()!==''){
        $('#send_feedback').submit()
    }else {
        alert('vui lòng đánh giá sao trước khi gửi')
    }

})

</script>
</body>
</html>
