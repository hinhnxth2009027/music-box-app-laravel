<!DOCTYPE html>
<html lang="en">
<head>
    @include('.admin.layOuts.head')
    <style>
    </style>
    <title>Music box || List User</title>
</head>

<body>
<div class="wrapper">
    @include('.admin.layOuts.sideBar')
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg" style="padding: 0 !important; max-width: 120%">
            <div class="container-fluid" style="padding: 0 !important;">
                <form class=" col-12" id="form_search" style="height: 100%;">
                    <div class="row col-12" style="padding: 0 !important;">
                        <div class="form-group col-7 col-md-6 d-flex align-items-center" style="padding: 2px !important;margin: 0 0 0 5px !important;">
                            <input value="{{$key_word != "" ? $key_word : "" }}" name="search" type="text" class="form-control" placeholder="search by key word" id="input_search">
                        </div>
                        <div class="form-group " style="padding: 2px !important;margin: 0 !important;display: flex !important;align-items: center !important;">
                            <button class="form-control" id="search_btn" ><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <div class="form-group" style="width: 10px;margin: 0 !important;">
                            <select class="btn btn-primary" id="filter_search" name="role">
                                @foreach(\App\Enums\Role::getValues() as $type)
                                    <option {{$role == $type ? 'selected':''}} value="{{$type}}" >{{\App\Enums\Role::getDescription($type)}}</option>
                                @endforeach
                                    <option {{$role == "" ? 'selected':''}} value="" >All</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        {{--        content        --}}
        <div class="content">
            <table class="table " style="border-radius: 10px">
                <thead>
                <tr>
                    <th class="text-dark" scope="col"><h6>id</h6></th>
                    <th class="text-dark" scope="col"><h6>user name</h6></th>
                    <th class="text-dark" scope="col"><h6>email</h6></th>
                    <th class="text-dark" scope="col"><h6>address</h6></th>
                    <th class="text-dark" scope="col"><h6 class="text-center">avatar</h6></th>
                    <th class="text-dark" scope="col"><h6 class="text-center">action</h6></th>
                </tr>
                </thead>
                <tbody>
                @for($i = sizeof($users)-1 ; $i >=0 ; $i--)
{{--                    @if($users[$i]->status === \App\Enums\Status::ACTIVE)--}}
                        <tr>
                            <th scope="row">{{$users[$i]->id}}</th>
                            <td>{{$users[$i]->name}}</td>
                            <td>{{$users[$i]->email}}</td>
                            <td>{{$users[$i]->address}}</td>
                            <td class="text-center"><img src="{{url($users[$i]->avatar)}}"
                                                         style="width: 50px;height: 50px;object-fit: cover;border-radius: 50%;

                                                         @if($users[$i]->role == 0)
                                                             border: #f80071 2px solid
                                                         @else
                                                             border: #7283f5 2px solid
                                                         @endif




                                                             "></td>
                            <td class="text-center">
                                <a href="{{route('User_detail',$users[$i]->id)}}" class="btn btn-primary">View profile</a>
                                @if($users[$i]->role == 1)
                                    <button slot="{{route('user_upgrade',$users[$i]->id)}}" data-toggle="modal" data-target="#exampleModalLong" class="btn_opent_upgrade btn btn-warning">upgrade</button>
                                    <a onclick="return confirm('Bạn Có Chắc Chắn muốn xóa  --|| {{$users[$i]->name}} ||--  ra khỏi danh sách ! Thao tác này sẽ không thể khôi phục') "
                                       href="{{route('User_delete',$users[$i]->id)}}" class="btn btn-danger">Delete</a>
                                @else
                                    <button class="btn btn-success">Administrators</button>
                                @endif
                            </td>
                        </tr>
{{--                    @endif--}}
                @endfor
                </tbody>
            </table>
            {{$users->links()}}
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-danger" id="exampleModalLongTitle">Message !!!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body" id="modal_content">
                            <p>- Are you sure you want to give this user admin rights</p>
                            <p>- If you agree, you will not have the right to withdraw this action</p>
                        </div>
                        <div class="modal-footer">
                            <a id="btn_send_upgrade" class="btn btn-primary">continue to license</a>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('.admin.layOuts.footer')
    </div>
</div>
<input type="hidden" id="check_nav_active" value="Users">
@include('.admin.layOuts.script')
<script>
    $('.btn_opent_upgrade').click(function (){
        $('#btn_send_upgrade').attr('href',this.slot)
    })
    $("#filter_search").change(function (){
        $('#input_search').val('')
        $("#form_search").submit()
    })
</script>
</body>

</html>
