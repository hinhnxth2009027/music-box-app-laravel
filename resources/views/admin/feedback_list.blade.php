<!DOCTYPE html>
<html lang="en">
<head>
    @include('.admin.layOuts.head')
    <style>
        .feedback_content_root:hover {
            background: #e7f1f5;
        }
    </style>
    <title>Music box || Admin feedback</title>
</head>
<body>
<div class="wrapper">
    @include('.admin.layOuts.sideBar')
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg" style="padding: 0 !important; max-width: 120%">
            <div class="container-fluid" style="padding: 0 !important;">
                <form class=" col-12" id="form_search" style="height: 100%;">
                    <div class="row col-12" style="padding: 0 !important;">
                        <div class="form-group" style="margin: 0 !important;">
                            <label for="filter_search_star" class="ml-4">Star<i class="fa fa-star" aria-hidden="true"></i></label>
                            <select class="btn btn-primary" id="filter_search_star" name="star">
                                <option {{$star == 1 ? 'selected':''}} value="1">1</option>
                                <option {{$star == 2 ? 'selected':''}} value="2">2</option>
                                <option {{$star == 3 ? 'selected':''}} value="3">3</option>
                                <option {{$star == 4 ? 'selected':''}} value="4">4</option>
                                <option {{$star == 5 ? 'selected':''}} value="5">5</option>
                                <option {{$star == '' ? 'selected':''}} value="">All</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin: 0 !important;">
                            <label for="filter_search_star" class="ml-4">Status</label>
                            <select class="btn btn-primary" id="filter_search" name="status">
                                <option {{$status == 1 ? 'selected':''}} value="{{\App\Enums\Status::ACTIVE}}">ACTIVE</option>
                                <option {{$status == 0 ? 'selected':''}} value="{{\App\Enums\Status::DEACTIVE}}">DISABLED</option>
                                <option {{$status == '' ? 'selected':''}} value="">All</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        {{--        content        --}}
        <div class="content">
            <table class="table" style="border-radius: 10px">
                <thead>
                <tr>
                    <th class="text-dark" scope="col"><h6>user id</h6></th>
                    <th class="text-dark" scope="col"><h6>email</h6></th>
                    <th class="text-dark" scope="col"><h6>star</h6></th>
                    <th class="text-dark" scope="col"><h6>status</h6></th>
                    <th class="text-dark" scope="col"><h6 class="text-center">action</h6></th>
                </tr>
                </thead>
                <tbody>
                @for($i = sizeof($feedbacks)-1; $i>=0 ; $i--)
                    <tr class="feedback_content_root">
                        <th data-toggle="modal" data-target="#exampleModalLong" style="cursor: pointer"
                            class="feedback_content" slot="{{$feedbacks[$i]->message}}"
                            scope="row">{{$feedbacks[$i]->user_id}}</th>
                        <td data-toggle="modal" data-target="#exampleModalLong" style="cursor: pointer"
                            class="feedback_content" slot="{{$feedbacks[$i]->message}}">{{$feedbacks[$i]->email}}</td>
                        <td data-toggle="modal" data-target="#exampleModalLong" style="cursor: pointer"
                            class="feedback_content"
                            slot="{{$feedbacks[$i]->message}}">@include('.admin.layOuts.check_star_feedback')</td>
                        <td data-toggle="modal" data-target="#exampleModalLong" style="cursor: pointer"
                            class="feedback_content" slot="{{$feedbacks[$i]->message}}">
                            @if($feedbacks[$i]->status == 1)
                                ACTIVE
                            @else
                                DISABLED
                            @endif
                        </td>
                        <td class="text-center">
                            @if($feedbacks[$i]->status == 1)
                                <a href="{{route('feedback_deactive',$feedbacks[$i]->id)}}"
                                   onclick="return confirm('thao tác này sẽ chỉ giúp ẩn đi phản hồi trên giao diện người dùng và không ảnh hưởng đến kết quả đánh giá \ntiếp tục')"
                                   class="btn btn-danger">Hidden</a>
                            @else
                                <a href="{{route('feedback_active',$feedbacks[$i]->id)}}"
                                   onclick="return confirm('trước đó bạn hoặc ai đó đã ẩn phản hồi này bây giờ bạn có muốn nó xuất hiện trở lại không \ntiếp tục')"
                                   class="btn btn-warning">Show</a>
                            @endif
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
                        </div>
                        <div class="modal-body" id="modal_content">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{$feedbacks->links()}}
        </div>
        @include('.admin.layOuts.footer')
    </div>
</div>
<input type="hidden" id="check_nav_active" value="feedback">
@include('.admin.layOuts.script')
<script>
    $('.feedback_content').click(function () {
        $('#modal_content').text(this.slot)
    })
    $("#filter_search").change(function (){
        $('#input_search').val('')
        $("#form_search").submit()
    })
    $("#filter_search_star").change(function (){
        $('#input_search').val('')
        $("#form_search").submit()
    })
</script>
</body>
</html>
