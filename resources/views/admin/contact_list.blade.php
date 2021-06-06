<!DOCTYPE html>
<html lang="en">
<head>
    @include('.admin.layOuts.head')
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <title>Music box || Admin Contact</title>
</head>

<body>
<div class="wrapper">
    @include('.admin.layOuts.sideBar')
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg" style="padding: 0 !important; max-width: 120%">
            <div class="container-fluid" style="padding: 0 !important;">
                <form class=" col-12" id="form_search" style="height: 100%;">
                    <div class="row col-12" style="padding: 0 !important;">
                        <div class="form-group col-7 col-md-6 d-flex align-items-center"
                             style="padding: 2px !important;margin: 0 0 0 5px !important;">
                            <input value="" name="search" type="text"
                                   class="form-control" placeholder="search by key word" id="input_search">
                        </div>
                        <div class="form-group "
                             style="padding: 2px !important;margin: 0 !important;display: flex !important;align-items: center !important;">
                            <button class="form-control" id="search_btn"><i class="fa fa-search" aria-hidden="true"></i>
                            </button>
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
                    <th class="text-dark" scope="col"><h6>email</h6></th>
                    <th class="text-dark" scope="col"><h6>name</h6></th>
                    <th class="text-dark" scope="col"><h6>phone</h6></th>
                    <th class="text-dark" scope="col"><h6>mesage</h6></th>
                    <th class="text-dark" scope="col"> <h6 class="text-center">action</h6></th>
                </tr>
                </thead>
                <tbody>
                @for($i = sizeof($contact)-1; $i>=0 ; $i--)
                    <tr class="feedback_content_root">

                        <td style="cursor: pointer">{{$contact[$i]->email}}</td>
                        <td style="cursor: pointer">{{$contact[$i]->name}}</td>
                        <td style="cursor: pointer">{{$contact[$i]->phone}}</td>
                        <td style="cursor: pointer"><div class="col-10">{{$contact[$i]->message}}</div></td>
                        <td class="text-center" >
                                <button data-toggle="modal" data-target="#exampleModalLong" slot="{{$contact[$i]->email}}" class="btn btn-primary send_mail">reply email</button>
                                <a onclick="return confirm('bạn có chắc chắn xóa thông tin này')" href="{{route('delete_contact',$contact[$i]->id)}}"  class="btn btn-danger">delete</a>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
            {{$contact->links()}}
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Send mail</h5>
                        </div>
                        <div class="modal-body form-group" id="modal_content">
                            <input type="hidden" id="send_to">
                            <label style="width: 100%">
                                <textarea id="email_msg" style="min-height: 300px;width: 100%" class="form-control" placeholder="Please enter your reply"></textarea>
                            </label>
                        </div>
                        <div class="modal-footer">
                            <button onclick="sendEmail()" style="width: 120px" data-dismiss="modal" class="btn btn-primary">Send</button>
                            <button type="button" class="btn btn_close btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('.admin.layOuts.footer')
    </div>
</div>
<input type="hidden" id="check_nav_active" value="Contact">
@include('.admin.layOuts.script')
<script>
    $('.send_mail').click(function (){
        $('#email_msg').val('')
        $('#send_to').val(this.slot)
    })
    function sendEmail() {
        var send_to = document.getElementById('send_to').value;
        var msg = document.getElementById('email_msg').value;
        var chars = ['a','s','q','w','f','g','h','j','k','m','3','?','~','$','#','@','*','^','o','%','J','*',')','P','[','b','M','n','c','u','x','z','8','Q','$','u','6','h','8','0','3','8','d','a','s','q','w','f','g','h','j','k','m','i','?','~','$','#','@','s','^','o','%','J','*',')','P','[','b','M','n','v','c','x','z','8','Q','$','5','x','h','f','0','3','l','d'];
        Email.send({
            Host: "smtp.gmail.com",
            Username : `${chars[68+5+5-18+8]+chars[18-2+5-3]+chars[15+5+10]+chars[18/2]+chars[2*10+9]+chars[87657352-87657351]+chars[50+1+2]+chars[50+22]+chars[41*2/2*2/2]+chars[75-5+1+5-1]+chars[38+8-4-3-1]+chars[15-5+6-1]+chars[5*5/5]+chars[52-2+2]+chars[43+1-2+1]+chars[53-3+4-1]+chars[84+84-84]+'.'+chars[28+8-8]+chars[18-8+8]+chars[9*10/10]}`,
            Password : `${chars[68+5+5-18+8-18]+chars[68+5+5-18+8-18+21] +chars[68+5+5-18+8-18+21-61]+chars[68+5+5-18+8-18+21-61-5]+'1'+chars[68+5+5-18+8-18+21-61-5+5]+chars[68+5+5-18+8-18+21-61-5+5+31]+chars[68+5+5-18+8-18+21-61-5+5+31-1]+chars[68+5+5-18+8-18+21-61-5+5+31-1-1]}`,
            To : send_to,
            From : `${chars[68-18+8+5+5]+chars[18-3+5-2]+chars[15+5+10]+chars[18/2]+chars[2*10+9]+chars[87657352-87657351]+chars[50+1+2]+chars[50+22]+chars[41*2/2*2/2]+chars[75-5+1+5-1]+chars[38+8-4-3-1]+chars[15-5+6-1]+chars[5*5/5]+chars[52-2+2]+chars[43+1-2+1]+chars[53-3+4-1]+chars[84+84-84]+'.'+chars[28+8-8]+chars[18-8+8]+chars[9*10/10]}`,
            Subject : "------MUSIC BOX-----",
            Body : `
                    <h1 style="color: red">MAIL FROM MUSIC BOX<h1>
                    <p>---------------------------------------</p>
                    <p style="font-size: 16px"><strong>${msg}</strong></p>
                    <p style="font-size: 13px">Thank you for giving us your feedback</p>`,
        }).then(
            message => alert("Send mail success")
        );
    }
</script>
</body>
</html>
