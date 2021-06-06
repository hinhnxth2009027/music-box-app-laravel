<!DOCTYPE html>
<html lang="en">
<head>
    @include('.admin.layOuts.head')
    <title>Music box || Admin Dashboard</title>
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
            <div class="row col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-sm-12">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="overview row col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-sm-12 bg-info pt-3">
                        <h4 style="border-bottom: white 3px solid ; height: 60px;width: 100%;color: white">Number of participants</h4>
                        <h1 style="height: 60px;width: 100%;color: white;font-size: 50px;transform: translateY(-30px)" class="text-center">{{$countUser}} Users</h1>
                    </div>
                    <div class="overview row col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-sm-12 bg-dark pt-3">
                        <h4 style="border-bottom: white 3px solid ; height: 60px;width: 100%;color: white">Total views</h4>
                        <h1 style="height: 60px;width: 100%;color: white;font-size: 50px;transform: translateY(-30px)" class="text-center">{{$views}} Views</h1>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="overview row col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-sm-12 bg-danger pt-3">
                        <h4 style="border-bottom: white 3px solid ; height: 60px;width: 100%;color: white">Number of songs</h4>
                        <h1 style="height: 60px;width: 100%;color: white;font-size: 50px;transform: translateY(-30px)" class="text-center">{{$songs}} Songs</h1>
                    </div>
                    <div class="overview row col-12 col-sm-12 col-lg-12 col-md-12 col-xl-12 col-sm-12 bg-warning pt-3">
                        <h4 style="border-bottom: white 3px solid ; height: 60px;width: 100%;color: white">Total likes</h4>
                        <h1 style="height: 60px;width: 100%;color: white;font-size: 50px;transform: translateY(-30px)" class="text-center">{{$likes}} Likes</h1>
                    </div>
                </div>
            </div>
        </div>
        @include('.admin.layOuts.footer')
    </div>
</div>
<input type="hidden" id="check_nav_active" value="Dashboard" slot="Nguyen Xuan Hjnh">
@include('.admin.layOuts.script')
<script>

</script>
</body>
</html>
