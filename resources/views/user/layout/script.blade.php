<script src="{{url('libs/js/jquery/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{url('libs/js/popper.min.js')}}" type="text/javascript"></script>
<script src="{{url('libs/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('libs/js/bootstrap/bootstrap-switch.js')}}" type="text/javascript" ></script>
<script src="{{url('libs/js/bootstrap/bootstrap-notify.js')}}"></script>
<script src="{{url('libs/js/light-bootstrap-dashboard.js?v=2.0.0')}}" type="text/javascript"></script>
<script src="{{url('libs/js/demo.js')}}"></script>
<script src = "{{url('https://smtpjs.com/v3/smtp.js')}}"> </script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const cloudName = "dvoe9idbe";
    const key = "kkkeee";
    const url = `https://api.cloudinary.com/v1_1/${cloudName}/image/upload`
    //    avt vs cover photo using axios
    $("#avatar_btn").click(function (){
        $("#select_avatar").click()
    })
    $("#cover_photo_btn").click(function (){
        $("#select_cover_photo").click()
    })
    $("#select_cover_photo").change(function (){
        var file = this.files[0];
        var formData = new FormData();
        formData.append('upload_preset',key);
        formData.append('tags','browser_upload');
        formData.append('file',file);
        axios.post(url,formData).then((result)=>{
            $('#img_cover_show').attr('src',result.data.url);
            $('#post_cover_photo').val(result.data.url);
        }).catch((err)=>{
            alert("đã xảy ra lỗi trong quá trình tải anh lên vui lòng thử lại")
        })
    })
    $("#select_avatar").change(function (){
        var file = this.files[0];
        var formData = new FormData();
        formData.append('upload_preset',key);
        formData.append('tags','browser_upload');
        formData.append('file',file);
        axios.post(url,formData).then((result)=>{
            $('#img_avt_show').attr('src',result.data.url);
            $('#post_avatar').val(result.data.url);
        }).catch((err)=>{
            alert("đã xảy ra lỗi trong quá trình tải ảnh lên vui lòng kiểm tra kết nối và thử lại")
        })
    })
    //    avt vs cover photo using axios




    var page_thiz = document.querySelectorAll("#nav_container > li")
    var thaz = $("#check_nav_active").val();
    for (var i = 0 ; i < page_thiz.length ; i++){
        if (page_thiz[i].slot === thaz){
            page_thiz[i].classList.add("active")
        }
    }

    @include('.admin.layOuts.validate')
</script>
