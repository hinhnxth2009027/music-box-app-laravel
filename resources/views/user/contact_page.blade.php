<!DOCTYPE html>
<html lang="en">
<head>
    @include('.user.layout.head')
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }
    </style>

    <title>Music box || contact</title>
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
            @if(session('send_contact_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> {{session('send_contact_success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif

          <div class="pt-5 pb-5 col-12 d-flex justify-content-center">
              <div class="col-12 col-md-9 col-lg-9 col-xl-7 p-3" style="border-radius: 10px;box-shadow: #1a202c 0 0 590px">
                  <h1>Contact</h1><br>
                  <form action="{{route('send_contact')}}" id="contact_form" method="POST">
                      @csrf
                          <div>
                              <div class="form-group row">
                                  <div class="col-12">
                                      <label for="Your_email">Enter Your email</label>
                                      <input name="email" type="text" class="form-control" id="Your_email">
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-12 col-md-6">
                                      <label for="Your_name">Enter your name</label>
                                      <input name="name" type="text" class="form-control" id="Your_name">
                                  </div>
                                  <div class="col-12 col-md-6">
                                      <label for="phone_number">Enter your phone number</label>
                                      <input name="phone" type="text" class="form-control" id="phone_number">
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-12">
                                      <label for="message">Message</label>
                                      <textarea name="message" id="message" style="height: 300px" class="form-control"></textarea>
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-12">
                                      <button class="btn btn-primary form-control">Send</button>
                                  </div>
                              </div>




                          </div>
                  </form>
              </div>

          </div>

        </div>
    </div>

</div>
<input type="hidden" id="check_nav_active" value="Contact">



@include('.user.layout.script')

<script>
    $('#contact_form').validate({
        rules:{
            'name':{
                required:true,
                minlength:5,
                maxlength:40
            },
            'email':{
                email:true,
                required:true
            },
            'phone':{
                minlength:8,
                maxlength:13,
                required:true
            },
            'message':{
                required:true
            }
        },
        messages:{
            'name':{
                required:'Name is required',
                minlength:'Please enter your full first and last name',
                maxlength:'Please enter your real name'
            },
            'email':{
                email:'Please enter the Email in the correct format ',
                required:'Email is required'
            },
            'phone':{
                required:'Email is required',
                minlength:'Please enter the phone number in the correct format',
                maxlength:'Please enter the phone number in the correct format'
            },
            'message':{
                required:'Please enter your message'
            }
        }
    })


</script>
</body>
</html>
