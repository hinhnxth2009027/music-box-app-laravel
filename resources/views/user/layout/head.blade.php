<meta charset="utf-8"/>
<link rel="apple-touch-icon" sizes="76x76" href="{{url('http://res.cloudinary.com/kee/image/upload/v1621152416/annyjvwlv2ydvuyhks9s.png')}}">
<link rel="icon" type="image/png" href="{{url('http://res.cloudinary.com/kee/image/upload/v1621152416/annyjvwlv2ydvuyhks9s.png')}}">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
<link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css')}}"/>
<link href="{{url('libs/css/bootstrap/light-bootstrap-dashboard.css?v=2.0.0')}}" rel="stylesheet"/>
<link href="{{url('libs/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet"/>
<link href="{{url('libs/css/bootstrap/demo.css')}}" rel="stylesheet"/>

<style>

    .error{
        color: red !important;
    }
    .btn_form_admin {
        width: 120px;
    }
    .modal-backdrop {
        height: 0 !important;
    }
    .overview {
        height: 350px;
        margin: 10px;
        border-radius: 10px;
    }

    #avatar_btn::before {
        content: '+';
        font-size: 20px;
        transform: translateX(19px);
        display: block;
    }

    #avatar_btn::after {
        content: 'Avatar';
        font-size: 14px;
        transform: translateY(45px) translateX(-7px);
        display: inline;
    }
    #cover_photo_btn ,#avatar_btn{
        cursor: pointer;
        transition: 0.6s;
    }

    #cover_photo_btn:hover ,#avatar_btn:hover{
        background: #e3e2e2;
    }


    #cover_photo_btn::before {
        content: '+';
        font-size: 20px;
        transform: translateX(32px);
        display: block;
    }

    #cover_photo_btn::after {
        content: 'Cover_Photo';
        font-size: 12px;
        transform: translateY(45px) translateX(-7px);
        display: inline;
    }
    .nav-mobile-menu {
        display: none!important;
    }

    .avt_cv_container > div {
        width: 70px;
        height: 70px;
        font-size: 20px;
        border-radius: 10px
    }

    .avt_cv_container > div img {
        width: 105%;
        height: 105%;
        object-fit: cover;
    }

    #avatar_show , #cover_photo_show {
        overflow: hidden;
    }




    /*::-webkit-scrollbar{*/
    /*    width: 0;*/
    /*}*/

</style>
