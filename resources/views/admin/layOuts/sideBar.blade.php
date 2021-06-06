<div class="sidebar" data-image="{{url('libs/img/sidebar-5.jpg')}}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{route("dashboard")}}" class="simple-text">
                Music Box
            </a>
        </div>

        <ul class="nav" id="nav_container">

            <li class="nav-item " slot="Dashboard">
                <a class="nav-link" href="{{route("dashboard")}}">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item " slot="Profile">
                <a class="nav-link" href="{{route("admin_profile")}}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <p>Profile</p>
                </a>
            </li>
            <li class="nav-item " slot="Users">
                <a class="nav-link" href="{{route("list_user")}}">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <p>List Users</p>
                </a>
            </li>
            <li class="nav-item " slot="Songs">
                <a class="nav-link" href="{{route("list_songs")}}">
                    <i class="fa fa-music" aria-hidden="true"></i>
                    <p>List Songs</p>
                </a>
            </li>
            <li class="nav-item " slot="Waiting">
                <a class="nav-link" href="{{route("list_songs_waiting")}}">
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                    <p>Waiting for approval</p>
                </a>
            </li>
            <li class="nav-item " slot="Contact">
                <a class="nav-link" href="{{route('contact_list')}}">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                    <p>Contact</p>
                </a>
            </li>
            <li class="nav-item " slot="feedback">
                <a class="nav-link" href="{{route('feedback_list')}}">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <p>feedback</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('homePage')}}">
                    <i class="fa fa-google-wallet" aria-hidden="true"></i>
                    <p>Go to home page</p>
                </a>
            </li>

        </ul>
    </div>
</div>
