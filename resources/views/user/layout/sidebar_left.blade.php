<div class="sidebar" data-image="{{url('libs/img/sidebar-5.jpg')}}" style="z-index: 1234567891">
    <div class="sidebar-wrapper">
        <div class="logo row">
            <div class="col-4">
                <img style="border-radius: 50%;object-fit: cover" width="40px" height="40px" src="
                @if(\Illuminate\Support\Facades\Auth::check()==false)
                {{url('http://res.cloudinary.com/kee/image/upload/v1621152416/annyjvwlv2ydvuyhks9s.png')}}
                    @else
                {{url(\Illuminate\Support\Facades\Auth::user()->avatar)}}
                @endif" alt="music box">
            </div>
            <a href="" class="simple-text">
                Music Box
            </a>
        </div>

        <ul class="nav" id="nav_container">
            <li class="nav-item " slot="Profile">
                <a class="nav-link" href="{{route('user_profile')}}">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <p>Profile</p>
                </a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == \App\Enums\Role::ADMIN)
                <li class="nav-item " slot="Contact">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <p>Admin Dashboard</p>
                    </a>
                </li>
            @endif
            <li class="nav-item " slot="discover">
                <a class="nav-link" href="{{route('homePage')}}">
                    <i class="fa fa-music" aria-hidden="true"></i>
                    <p>discover</p>
                </a>
            </li>
            <li class="nav-item " slot="my_Songs">
                <a class="nav-link" href="{{route('mysongs')}}">
                    <i class="fa fa-headphones" aria-hidden="true"></i>
                    <p>my Songs</p>
                </a>
            </li>
            <li class="nav-item " slot="upload">
                <a class="nav-link" href="{{route('song_upload')}}">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                    <p>upload song</p>
                </a>
            </li>
{{--            <li class="nav-item " slot="favourite">--}}
{{--                <a class="nav-link" href="">--}}
{{--                    <i class="fa fa-heart" aria-hidden="true"></i>--}}
{{--                    <p>favourite</p>--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item " slot="Contact">
                <a class="nav-link" href="{{route('contactPage')}}">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                    <p>Contact us</p>
                </a>
            </li>

            <li class="nav-item " slot="evaluate">
                <a class="nav-link" href="{{route('evaluate')}}">
                    <i class="fa fa-envelope-open" aria-hidden="true"></i>
                    <p>evaluate</p>
                </a>
            </li>
            <li class="nav-item " slot="about">
                <a class="nav-link" href="{{'about'}}">
                    <i class="fa fa-buysellads" aria-hidden="true"></i>
                    <p>about us</p>
                </a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::check())
                <li class="nav-item " slot="">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <p>Logout</p>
                    </a>
                </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::check()==false)
                <li class="nav-item " slot="account">
                    <a class="nav-link" href="{{route('loginPage')}}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>Sign in / Sign up</p>
                    </a>
                </li>
            @endif


        </ul>
    </div>
</div>
