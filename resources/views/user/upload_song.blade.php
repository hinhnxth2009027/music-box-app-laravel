<!DOCTYPE html>
<html lang="en">
<head>
    @include('.user.layout.head')
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }
    </style>

    <title>Music box || upload</title>
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
            @if (session('upload_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> {{session('upload_success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            <div class="" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="col-md-8 mt-5 mr-auto ml-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="card-title"></h4>
                        </div>
                        {{--action="{{route("create_new_user")}}"--}}
                        <div class="card-body">
                            <form method="POST" id="create_new_song" action="{{route('song_upload')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5 ">
                                        <div class="form-group">
                                            <label for="song_name">Song name</label>
                                            <input id="song_name" name="song_name" type="text" class="form-control"
                                                   placeholder="Enter Song Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            <label for="Author">Author</label>
                                            <input id="Author" name="author" type="text"
                                                   class="form-control" placeholder="Enter Author Name">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="lyrics">Lyrics</label>
                                        <textarea id="lyrics" name="lyrics" class="form-control" placeholder="Enter Lyrics"
                                                  style="min-height: 300px">

                                        </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <button type="button" id="choose_thumbnail" class="form-control btn-warning">Thumbnail</button>
                                    </div>
{{--                                    one line comment--}}
                                    <div class="col-6 form-group">
                                        <button type="button" id="choose_Song" class="form-control btn-warning">Music files</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4 form-group d-flex justify-content-center">
                                        <img id="show_img_thumbnail"
                                            style="height: 150px;width: 150px;object-fit: cover;border-radius: 50%;border: #00bbff 3px solid"
                                            src="http://res.cloudinary.com/kee/image/upload/v1621377371/fpfphbwipforxc1isou9.png">
                                    </div>
                                    <div class="col-12 col-md-8 form-group d-flex d-flex align-items-center flex-wrap">
                                        <div class="form-control btn btn-warning" style="padding: 0!important;height: 6px">
                                            <div class="progress-container" id="progress-container" style="height: 100%">
                                                <div class="progress bg-danger" id="progress" style="height: 100%"></div>
                                                <div class="duration-wrapper">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-control d-flex justify-content-center " style="padding: 0!important;border: none!important;">
                                            <p id="btn_play" style=";height: 100%;width: 60px;color: white;cursor: pointer"
                                               class="bg-danger mr-1 d-flex align-items-center justify-content-center"><i class="fa fa-play" aria-hidden="true"></i></p>
                                            <p id="btn_load_song_play" style="float: right;height: 100%;width: 60px;color: white;cursor: pointer"
                                               class="bg-primary ml-1 d-flex align-items-center justify-content-center"><i
                                                    class="fa fa-repeat" aria-hidden="true"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style=";width: 100%;border-bottom: black 2px solid;margin-bottom: 10px"></div>
                                <button type="button" class="btn_form_admin btn btn-info btn-fill pull-right m-1">
                                    Upload
                                </button>
{{--                                <button id="submit">asdasd</button>--}}
{{--                                input hidden          --}}
                                <input type="hidden" name="song_file" id="file_song" value="">
                                <input type="hidden" name="public_by" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                <input type="hidden" name="public_by_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                <input type="hidden" name="song_key" value="{{random_int(10000000, 79999999) + random_int(1000, 7777) + random_int(10000, 77777)}}">
                                <input type="hidden" name="thumbnail" id="file_thumbnail" value="http://res.cloudinary.com/kee/image/upload/v1621377371/fpfphbwipforxc1isou9.png">
{{--                                input file--}}
                                <div class="d-none">
                                    <input type="file" id="choose_file_thumbnail">
                                    <input type="file" id="choose_file_song">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<audio></audio>
<input type="hidden" id="check_nav_active" value="upload">


@include('.user.layout.script')


<script>

    document.addEventListener('DOMContentLoaded',function (){
        const cloudName = "dvoe9idbe";
        const key = "kkkeee";
        const url = `https://api.cloudinary.com/v1_1/${cloudName}/image/upload`
        const cloudName1 = "musicbox888";
        const key1 = "qeuycrga";
        const url1 = `https://api.cloudinary.com/v1_1/${cloudName1}/upload`
        $('#choose_thumbnail').click(function (){
            $('#choose_file_thumbnail').click()
        })
        $('#choose_Song').click(function (){
            $('#choose_file_song').click()
        })
        $("#choose_file_thumbnail").change(function (){

            var txt = $("#choose_file_thumbnail").val().toString()
            if (txt[txt.length-1]=== "3" && txt[txt.length-2]=== "p" && txt[txt.length-3]=== "m" || txt[txt.length-1]=== "4" && txt[txt.length-2]=== "p" && txt[txt.length-3]=== "m"){
                alert("Vui lòng chọn một file ảnh không phải ( .mp3 .mp4 )")
            }
            else {
                var file = this.files[0];
                var formData = new FormData();
                formData.append('upload_preset',key);
                formData.append('tags','browser_upload');
                formData.append('file',file);
                axios.post(url,formData).then((result)=>{
                    $('#show_img_thumbnail').attr('src',result.data.url);
                    $('#file_thumbnail').val(result.data.url);
                }).catch((err)=>{
                    alert("đã xảy ra lỗi trong quá trình tải anh lên vui lòng thử lại")
                })
            }
        })









        $("#choose_file_song").change(function (){
            var txt = $("#choose_file_song").val().toString()
            if (txt[txt.length-1]=== "3" && txt[txt.length-2]=== "p" && txt[txt.length-3]=== "m"){
                var file = this.files[0];
                var formData = new FormData();
                formData.append('upload_preset',key1);
                formData.append('tags','browser_upload');
                formData.append('file',file);
                axios.post(url1,formData).then((result)=>{
                    $('#file_song').val(result.data.url);
                    music.pause()
                    if (music.src!==''){
                        music.src = ''
                    }
                    $('#btn_play').html('<i class="fa fa-play" aria-hidden="true"></i>')
                    isPlaying = false
                    loadSong($('#file_song').val())
                    alert('nghe thử đã sẵn sàng hãy thử click vào nút play')
                }).catch((err)=>{
                    alert("đã xảy ra lỗi trong quá trình tải nhạc lên vui lòng thử lại")
                })
            }
            else {
                alert("Vui lòng chọn file có định dạng đuôi là ( .mp3 )")
            }
        })
    })

    $('.btn_form_admin').click(function (){
        if ($('#song_name').val()!==''&&$('#Author').val()!==''&&$('#file_song').val()!==''&&$('#file_song').val()[$('#file_song').val().length-1]==='3'){
            $('#create_new_song').submit()
        }else {
            alert('vui lòng nhập và điền đầy đủ thông tin và các file cần thiết như sau\n- song name\n- author name\n- thumbnail\n- song file .mp3\n- lyrics ( có thể để rỗng )')
        }
    })






















    const music = document.querySelector('audio');
    const progressContainer = document.getElementById('progress-container');
    const progress = document.getElementById('progress');
    const currentTimeEl = document.getElementById('current-time');
    let isPlaying = false


    $('#btn_load_song_play').click(function (){

        if ($('#file_song').val()[$('#file_song').val().length-1] !== '3'){
            if ($('#file_song').val() === ''){
                alert('vui lòng chọn file nhạc trước')
            }else {
                alert('file bạn tải lên không phải là file audio vui lòng tải một file có địng dạng .mp3')
            }
        }else {
            loadSong($('#file_song').val())
            music.play()
            isPlaying = true
            $('#btn_play').html('<i class="fa fa-pause" aria-hidden="true"></i>')
        }

    })

    $('#btn_play').click(function (){
        if (isPlaying){
            isPlaying = false
            music.pause()
            $('#btn_play').html('<i class="fa fa-play" aria-hidden="true"></i>')
        }else {
            isPlaying = true
            if (music.src === ''){
                if ($('#file_song').val() === ''){
                        alert('vui lòng chọn file nhạc trước')
                }else {
                    if ($('#file_song').val()[$('#file_song').val().length-1] !== '3'){
                        alert('file bạn tải lên không phải là file audio vui lòng tải một file có địng dạng .mp3')
                    }else {
                        loadSong($('#file_song').val())
                        $('#btn_play').html('<i class="fa fa-pause" aria-hidden="true"></i>')
                        music.play()
                    }

                }
            }else {
                $('#btn_play').html('<i class="fa fa-pause" aria-hidden="true"></i>')
                music.play()
            }

        }

    })



    function loadSong(song) {
        music.src = `${song}`;
    }

    function setProgressBar(e) {
        const width = this.clientWidth;
        const clickX = e.offsetX;
        const {duration} = music;
        music.currentTime = (clickX / width) * duration;
    }

    function updateProgressBar(e) {
        if (isPlaying) {
            const {duration, currentTime} = e.srcElement;
            const progressPercent = (currentTime / duration) * 100;
            progress.style.width = `${progressPercent}%`
        }
    }



    music.addEventListener('timeupdate', updateProgressBar);
    progressContainer.addEventListener('click', setProgressBar);
</script>
</body>
</html>
