<script>
    document.addEventListener('DOMContentLoaded', function () {
        axios.get('{{route('findAllSongs')}}').then((result) => {
            for (let i = 0; i < result.data.users.length; i++) {
                var img_show_user_public_song = $(`.public_by_id${result.data.users[i].id}`)
                if (img_show_user_public_song !== null) {
                    img_show_user_public_song.attr("src", result.data.users[i].avatar)
                    var data_phone = result.data.users[i].phone.split('')
                    data_phone[data_phone.length-4]='x'
                    data_phone[data_phone.length-5]='x'
                    data_phone[data_phone.length-6]='x'
                    var data_email = result.data.users[i].email.split('')
                    data_email[0]='_'
                    data_email[1]='_'
                    data_email[2]='_'
                    data_email[3]='_'
                    var email = ''
                    var phone = ''
                    for (let i =0 ; i< data_phone.length ; i++){
                        phone+= data_phone[i]
                    }
                    for (let i =0 ; i< data_email.length ; i++){
                        email+= data_email[i]
                    }
                    img_show_user_public_song.attr("slot", `${email}~!!!~${phone}~!!!~${result.data.users[i].name}~!!!~${result.data.users[i].birthday}~!!!~${result.data.users[i].address}~!!!~${result.data.users[i].facebook}~!!!~${result.data.users[i].instagram}~!!!~${result.data.users[i].github}~!!!~${result.data.users[i].twitter}~!!!~${result.data.users[i].created_at}~!!!~${result.data.users[i].avatar}~!!!~${result.data.users[i].cover_photo}~!!!~${result.data.users[i].role}`)
                }
            }
            for (let i = 0; i < result.data.songs.length; i++) {
                var id = result.data.songs[i].song_key
                var like_display = document.getElementById(`${id}`)
                var view_display = document.getElementById(`~!!!~${id}`)
                if (like_display !== null) {
                    like_display.innerText = result.data.songs[i].like
                    view_display.innerText = result.data.songs[i].views
                }
            }
        }).catch((err) => {
            alert("Hiện không có kết nối")
            console.log(err)
        })
        $('.align-items-center>.fa-heart').click(function () {
            axios.get(`${location.protocol + '//' + location.host + '/api/findsongbyid/' + this.slot}`).then((rerult) => {
                var like = rerult.data.like + 1
                axios.get(`${location.protocol + '//' + location.host + '/api/updatebyid/' + this.slot + '/?like=' + like}`).then((res) => {
                    var like_display = document.getElementById(`${res.data.song_key}`)
                    like_display.innerText = res.data.like
                })
            }).catch((err) => {
                alert("không có kết nối tới cơ sở dữ liệu")
                console.log(err)
            })
        })
    })
    $('#btn_active_random').click(function () {
        $('#btn_active_random').toggleClass('active_random')
        if ($('.active_random').length===1){
            isRandom = true
        }else {
            isRandom = false
        }
    })
    const music = document.querySelector('audio');
    const progressContainer = document.getElementById('progress-container');
    const progress = document.getElementById('progress');
    const currentTimeEl = document.getElementById('current-time');
    const durationEl = document.getElementById('duration');
    let list_songs = []
    let isPlaying = false;
    let play_index = 0
    let isRepeat = false
    let isRepeatOne = false
    let isRandom = false
    let iscountView = false
    let addview = []
    let playx0_75 = false
    let playx1_25 = false
    let playx1_5 = false
    let playx2 = false

    $('.add_tolist').click(function (e) {
        if (!isPlaying){
            $('#show_list_song_play').removeClass('show_list_song_play')
            $('#show_list_song_play').addClass('show_list_song_play')
        }else {
            document.querySelector('.fa-list').style.transform= "translateY(50px)"
            document.querySelector('.fa-list').style.transform= "scale(1.2)"
            document.querySelector('.fa-list').style.color = 'red'
            setTimeout(function(){document.querySelector('.fa-list').style.transform= "translateY(0)" ; }, 300);
            setTimeout(function(){document.querySelector('.fa-list').style.color = '#fff' ; }, 300);
        }

        addToList(e, this.slot)
    })
    $('#btn_close_list_song').click(function () {
        $('#show_list_song_play').removeClass('show_list_song_play')
    })
    $('.btn_text_play_music').click(function (e) {
        play_index = 0
        $('#show_list_song_play').addClass('show_list_song_play')
        var data = `${e.target.elementTiming}`.split('~!!!~')
        let r = Math.random().toString(36).substring(7);
        let song = {
            'indexz': data[3],
            'name': e.target.accessKey,
            'author': e.target.nonce,
            'audio': this.slot,
            'lyrics': data[0],
            'thumbnail': data[1],
            'id': data[2],
            'check': r
        }
        list_songs[0] = song

        loadSong(list_songs[0].audio)
        playSong(e)
        $('#check_song_active').val(`${r}`)
        $('#lyrics_inputt').val(`${song.lyrics}`)

        var items = document.querySelectorAll('.item_song')
        if (items[0] !== undefined) {
            items[0].classList.add('ituyrdfdtdtuytuyiyt')
            document.querySelector('.ituyrdfdtdtuytuyiyt').slot = `${song.check}`
            document.querySelector('.ituyrdfdtdtuytuyiyt').innerHTML = `<img style="height: 50px;width: 50px;object-fit: cover" src="${song.thumbnail}" alt="">
                    <i id="${song.check}" style="color: rgba(255,255,255,0.55);font-size: 20px;transform: translateX(-33px)translateY(13px);transition: 0.3s" class="fa icon_status_play fa-pause" aria-hidden="true"></i>
                    <div style="text-overflow:ellipsis;width: 220px;">
                        <p class="pt-1" style="color: white;margin: 0!important;font-size: 13px;transform: translateY(-3px);height: 23px;overflow: hidden">${song.name}</p>
                        <p class="pt-1" style="color: white;margin: 0!important;font-size: 12px;transform: translateY(-3px);height: 15px">${song.author}</p>
                    </div>`
            var one_index = document.querySelectorAll('.item_song')
            one_index[0].onclick =  function (){
                if (play_index === 0 && isPlaying){
                    music.pause()
                    isPlaying = false
                    $('#btn_icon_play').removeClass('d-none');
                    $('#btn_icon_play').addClass('d-flex');
                    $('#btn_icon_pause').addClass('d-none');
                    $('#btn_icon_pause').removeClass('d-flex')
                    $(`#${list_songs[0].check}`).removeClass('fa-pause')
                    $(`#${list_songs[0].check}`).addClass('fa-play')
                }else if (play_index ===0 && !isPlaying) {
                    music.play()
                    if (playx2){
                        music.playbackRate = 2
                    }
                    if (playx1_5){
                        music.playbackRate = 1.5
                    }
                    if (playx1_25){
                        music.playbackRate = 1.25
                    }
                    if (playx0_75){
                        music.playbackRate = 0.75
                    }
                    isPlaying = true
                    $('#btn_icon_play').removeClass('d-flex');
                    $('#btn_icon_play').addClass('d-none');
                    $('#btn_icon_pause').addClass('d-flex');
                    $('#btn_icon_pause').removeClass('d-none')
                    $(`#${list_songs[0].check}`).addClass('fa-pause')
                    $(`#${list_songs[0].check}`).removeClass('fa-play')
                }else if (play_index !==0){
                    if (!isPlaying && $('#check_song_active').val()===''){
                        $('#control_container').removeClass('d-none')
                        $('#btn_icon_play').removeClass('d-flex');
                        $('#btn_icon_play').addClass('d-none');
                        $('#btn_icon_pause').addClass('d-flex');
                        $('#btn_icon_pause').removeClass('d-none')
                    }
                    $('.icon_status_play').removeClass('fa-pause')
                    $('.icon_status_play').addClass('fa-play')
                    $(`#${list_songs[0].check}`).addClass('fa-pause')
                    $(`#${list_songs[0].check}`).removeClass('fa-play')
                    $('#check_song_active').val(`${list_songs[0].check}`)
                    $('#show_name_song_play').text(`${list_songs[0].name} : ${list_songs[0].author}`)
                    play_index = 0
                    if (!isPlaying){
                        isPlaying=true
                    }
                    loadSong(list_songs[0].audio)
                    music.play()
                    if (playx2){
                        music.playbackRate = 2
                    }
                    if (playx1_5){
                        music.playbackRate = 1.5
                    }
                    if (playx1_25){
                        music.playbackRate = 1.25
                    }
                    if (playx0_75){
                        music.playbackRate = 0.75
                    }
                }
            }











            var btn_close_one =  document.querySelectorAll('.asdsaddsadsadasd')
            var de = document.querySelectorAll('.item_song')[0]
            btn_close_one[0].onclick = function (){
                de.remove()
                $('#control_container').addClass('d-none')
                $('#btn_icon_play').addClass('d-flex');
                $('#btn_icon_play').removeClass('d-none');
                $('#btn_icon_pause').removeClass('d-flex');
                $('#btn_icon_pause').addClass('d-none')
                $('#check_song_active').val('')
                isPlaying = false
                music.pause()
                play_index-1
            }
        }



        else {
            $('.list_song_container').append(`<div slot="${song.check}" class="row item_song eerrttyuttuytuy${song.check}" style="height: 50px;box-sizing: border-box;margin: 0!important;position: relative;width: 290px" onclick="
if (isPlaying){
    if ('${song.check}'===$('#check_song_active').val()){
        isPlaying=false;
        music.pause();
        $('.icon_status_play').removeClass('fa-pause');
        $('.icon_status_play').addClass('fa-play');
        $('#btn_icon_play').removeClass('d-none');
        $('#btn_icon_play').addClass('d-flex');
        $('#btn_icon_pause').addClass('d-none');
        $('#btn_icon_pause').removeClass('d-flex')
    }else {
        music.src='${song.audio}';
        $('#show_name_song_play').text('${song.name} : ${song.author}')
        music.play();
        if (playx2){
                    music.playbackRate = 2
                }
                if (playx1_5){
                    music.playbackRate = 1.5
                }
                if (playx1_25){
                        music.playbackRate = 1.25
                    }
                if (playx0_75){
                    music.playbackRate = 0.75
                }
        play_index = list_songs.findIndex(x => x.check === '${song.check}')
        $('.icon_status_play').removeClass('fa-pause');
        $('.icon_status_play').addClass('fa-play');
        $('#check_song_active').val('${song.check}');
        $('#${song.check}').removeClass('fa-play');
        $('#${song.check}').addClass('fa-pause');
        $('#btn_icon_play').removeClass('d-none');
        $('#btn_icon_play').addClass('d-none');
        $('#btn_icon_pause').addClass('d-flex');
        $('#btn_icon_pause').removeClass('d-none')
    }
}else {
    if ('${song.check}'===$('#check_song_active').val()){
        music.play();
        if (playx2){
                    music.playbackRate = 2
                }
                if (playx1_5){
                    music.playbackRate = 1.5
                }
                if (playx1_25){
                        music.playbackRate = 1.25
                    }
                if (playx0_75){
                    music.playbackRate = 0.75
                }
        play_index = list_songs.findIndex(x => x.check === '${song.check}')
        isPlaying=true;
        $('.icon_status_play').removeClass('fa-pause');
        $('.icon_status_play').addClass('fa-play');
        $('#check_song_active').val('${song.check}');
        $('#${song.check}').removeClass('fa-play');
        $('#${song.check}').addClass('fa-pause');
        $('#btn_icon_play').removeClass('d-flex');
        $('#btn_icon_play').addClass('d-none');
        $('#btn_icon_pause').removeClass('d-none')
        $('#btn_icon_pause').addClass('d-flex');
    }
    else{
        if ($('#check_song_active').val()===''){
            $('#control_container').removeClass('d-none')
        }
        isPlaying = true;
        $('#check_song_active').val('${song.check}')
        $('#show_name_song_play').text('${song.name} : ${song.author}')
        music.src = '${song.audio}'
        music.play();
        if (playx2){
                    music.playbackRate = 2
                }
                if (playx1_5){
                    music.playbackRate = 1.5
                }
                if (playx1_25){
                        music.playbackRate = 1.25
                    }
                if (playx0_75){
                    music.playbackRate = 0.75
                }
        play_index = list_songs.findIndex(x => x.check === '${song.check}')
        this.firstElementChild.nextElementSibling.classList.remove('fa-play');
        this.firstElementChild.nextElementSibling.classList.add('fa-pause');
        $('#btn_icon_play').removeClass('d-flex');
        $('#btn_icon_play').addClass('d-none');
        $('#btn_icon_pause').addClass('d-flex');
        $('#btn_icon_pause').removeClass('d-none')
    }
}">
                <img style="height: 50px;width: 50px;object-fit: cover" src="${song.thumbnail}" alt="hjnh">
                    <i id="${song.check}" style="color: rgba(255,255,255,0.56);font-size: 20px;transform: translateX(-33px)translateY(13px);transition: 0.3s" class="fa icon_status_play fa-play" aria-hidden="true"></i>
                    <div style="text-overflow:ellipsis;width: 220px;">
                        <p class="pt-1" style="color: white;margin: 0!important;font-size: 13px;transform: translateY(-3px);height: 23px;overflow: hidden">${song.name}</p>
                        <p class="pt-1" style="color: white;margin: 0!important;font-size: 12px;transform: translateY(-3px);height: 15px">${song.author}</p>
                    </div>
                </div>


                <i onclick=" $('.eerrttyuttuytuy${song.check}').remove();
                this.remove();
                var index_delete = list_songs.findIndex(x => x.check === '${song.check}')
                list_songs.splice(0,1)
                if (index_delete < play_index){
                play_index-1
                }
                if ('${song.check}'===$('#check_song_active').val()){
                $('#control_container').addClass('d-none')
                $('#check_song_active').val('')
                isPlaying = false
                music.pause()
                }
                 " class="fa asdsaddsadsadasd fa-times-circle" aria-hidden="true" style="color: white; font-size: 16px;z-index: 12345;position: absolute;right: 4px;transform: translateY(-50px);cursor: pointer;"></i>`)
        }













        var check = $('#check_song_active').val()
        $('.icon_status_play').removeClass('fa-pause')
        $('.icon_status_play').addClass('fa-play')
        $(`#${check}`).removeClass('fa-play')
        $(`#${check}`).addClass('fa-pause')
    })
    $('#show_lyrics').click(function (){
        if(list_songs[play_index].lyrics === ''){
            $('#lyrics_content').text('lời bài hát chưa được tác giả cập nhật !.')
        }else {
            $('#lyrics_content').text(list_songs[play_index].lyrics)
        }
        $('#name_song7439').text(list_songs[play_index].name)

    })
    function addToList(e, slott) {
        var data = `${e.target.elementTiming}`.split('~!!!~')
        let r = Math.random().toString(36).substring(7);
        let song = {
            'indexz': data[3],
            'name': e.target.accessKey,
            'author': e.target.nonce,
            'audio': slott,
            'lyrics': data[0],
            'thumbnail': data[1],
            'id': data[2],
            'check': r
        }
        list_songs.push(song)
        $('.icon_status_play').removeClass('fa-pause')
        $('.icon_status_play').addClass('fa-play')
        $('.list_song_container').append(`<div onclick="
if (isPlaying){
    if ('${song.check}'===$('#check_song_active').val()){
        isPlaying=false;
        music.pause();
        $('.icon_status_play').removeClass('fa-pause');
        $('.icon_status_play').addClass('fa-play');
        $('#btn_icon_play').removeClass('d-none');
        $('#btn_icon_play').addClass('d-flex');
        $('#btn_icon_pause').addClass('d-none');
        $('#btn_icon_pause').removeClass('d-flex')
    }else {
        music.src='${song.audio}';
        $('#show_name_song_play').text('${song.name} : ${song.author}')
        music.play();
        if (playx2){
                    music.playbackRate = 2
                }
                if (playx1_5){
                    music.playbackRate = 1.5
                }
                if (playx1_25){
                        music.playbackRate = 1.25
                    }
                if (playx0_75){
                    music.playbackRate = 0.75
                }
        play_index = list_songs.findIndex(x => x.check === '${song.check}')
        $('.icon_status_play').removeClass('fa-pause');
        $('.icon_status_play').addClass('fa-play');
        $('#check_song_active').val('${song.check}');
        $('#${song.check}').removeClass('fa-play');
        $('#${song.check}').addClass('fa-pause');
        $('#btn_icon_play').removeClass('d-none');
        $('#btn_icon_play').addClass('d-none');
        $('#btn_icon_pause').addClass('d-flex');
        $('#btn_icon_pause').removeClass('d-none')
    }
}else {
    if ('${song.check}'===$('#check_song_active').val()){
        music.play();
        if (playx2){
                    music.playbackRate = 2
                }
                if (playx1_5){
                    music.playbackRate = 1.5
                }
                if (playx1_25){
                        music.playbackRate = 1.25
                    }
                if (playx0_75){
                    music.playbackRate = 0.75
                }
        play_index = list_songs.findIndex(x => x.check === '${song.check}')
        isPlaying=true;
        $('.icon_status_play').removeClass('fa-pause');
        $('.icon_status_play').addClass('fa-play');
        $('#check_song_active').val('${song.check}');
        $('#${song.check}').removeClass('fa-play');
        $('#${song.check}').addClass('fa-pause');
        $('#btn_icon_play').removeClass('d-flex');
        $('#btn_icon_play').addClass('d-none');
        $('#btn_icon_pause').removeClass('d-none')
        $('#btn_icon_pause').addClass('d-flex');
    }
    else{
        if ($('#check_song_active').val()===''){
            $('#control_container').removeClass('d-none')
        }
        isPlaying = true;
        $('#check_song_active').val('${song.check}')
        $('#show_name_song_play').text('${song.name} : ${song.author}')
        music.src = '${song.audio}'
        music.play();
        if (playx2){
                    music.playbackRate = 2
                }
                if (playx1_5){
                    music.playbackRate = 1.5
                }
                if (playx1_25){
                        music.playbackRate = 1.25
                    }
                if (playx0_75){
                    music.playbackRate = 0.75
                }
        play_index = list_songs.findIndex(x => x.check === '${song.check}')
        this.firstElementChild.nextElementSibling.classList.remove('fa-play');
        this.firstElementChild.nextElementSibling.classList.add('fa-pause');
        $('#btn_icon_play').removeClass('d-flex');
        $('#btn_icon_play').addClass('d-none');
        $('#btn_icon_pause').addClass('d-flex');
        $('#btn_icon_pause').removeClass('d-none')
    }
}"
slot="${song.check}" class="row item_song eerrttyuttuytuy${song.check}" style="height: 50px;box-sizing: border-box;margin: 0!important;position: relative;width: 290px">
                <img style="height: 50px;width: 50px;object-fit: cover" src="${song.thumbnail}" alt="hjnh">
                    <i id="${song.check}" style="color: rgba(255,255,255,0.56);font-size: 20px;transform: translateX(-33px)translateY(13px);transition: 0.3s" class="fa icon_status_play fa-play" aria-hidden="true"></i>
                    <div style="text-overflow:ellipsis;width: 220px;">
                        <p class="pt-1" style="color: white;margin: 0!important;font-size: 13px;transform: translateY(-3px);height: 23px;overflow: hidden">${song.name}</p>
                        <p class="pt-1" style="color: white;margin: 0!important;font-size: 12px;transform: translateY(-3px);height: 15px">${song.author}</p>
                    </div>
                </div>
                <i onclick=" $('.eerrttyuttuytuy${song.check}').remove();
                this.remove();
                var index_delete = list_songs.findIndex(x => x.check === '${song.check}')
                list_songs.splice(index_delete,1)
                if (index_delete < play_index){
                play_index-1
                }
                if ('${song.check}'===$('#check_song_active').val()){
                $('#control_container').addClass('d-none')
                $('#check_song_active').val('')
                isPlaying = false
                music.pause()
                }
                 " class="fa asdsaddsadsadasd fa-times-circle" aria-hidden="true" style="color: white; font-size: 16px;z-index: 12345;position: absolute;right: 4px;transform: translateY(-50px);cursor: pointer;"></i>`)
        var check = $('#check_song_active').val()
        $('.icon_status_play').removeClass('fa-pause')
        $('.icon_status_play').addClass('fa-play')











        if (!isPlaying){
            var checkk = $('#check_song_active').val();

                $(`#${checkk}`).addClass('fa-play');
                $(`#${checkk}`).removeClass('fa-pause');

        }else {
            $(`#${check}`).removeClass('fa-play')
            $(`#${check}`).addClass('fa-pause')
        }




        var one_index = document.querySelectorAll('.item_song')
        one_index[0].onclick =  function (){
            if (play_index === 0 && isPlaying){
                music.pause()
                isPlaying = false
                $('#btn_icon_play').removeClass('d-none');
                $('#btn_icon_play').addClass('d-flex');
                $('#btn_icon_pause').addClass('d-none');
                $('#btn_icon_pause').removeClass('d-flex')
                $(`#${list_songs[0].check}`).removeClass('fa-pause')
                $(`#${list_songs[0].check}`).addClass('fa-play')
            }else if (play_index ===0 && !isPlaying) {
                music.play()
                if (playx2){
                    music.playbackRate = 2
                }
                if (playx1_5){
                    music.playbackRate = 1.5
                }
                if (playx1_25){
                    music.playbackRate = 1.25
                }
                if (playx0_75){
                    music.playbackRate = 0.75
                }
                isPlaying = true
                $('#btn_icon_play').removeClass('d-flex');
                $('#btn_icon_play').addClass('d-none');
                $('#btn_icon_pause').addClass('d-flex');
                $('#btn_icon_pause').removeClass('d-none')
                $(`#${list_songs[0].check}`).addClass('fa-pause')
                $(`#${list_songs[0].check}`).removeClass('fa-play')
            }else if (play_index !==0){
                if (!isPlaying){
                    $('#control_container').removeClass('d-none')
                    $('#btn_icon_play').removeClass('d-flex');
                    $('#btn_icon_play').addClass('d-none');
                    $('#btn_icon_pause').addClass('d-flex');
                    $('#btn_icon_pause').removeClass('d-none')
                }
                $('.icon_status_play').removeClass('fa-pause')
                $('.icon_status_play').addClass('fa-play')
                $(`#${list_songs[0].check}`).addClass('fa-pause')
                $(`#${list_songs[0].check}`).removeClass('fa-play')
                $('#check_song_active').val(`${list_songs[0].check}`)
                $('#show_name_song_play').text(`${list_songs[0].name} : ${list_songs[0].author}`)
                play_index = 0
                if (!isPlaying){
                    isPlaying=true
                }
                loadSong(list_songs[0].audio)
                music.play()
                if (playx2){
                    music.playbackRate = 2
                }
                if (playx1_5){
                    music.playbackRate = 1.5
                }
                if (playx1_25){
                    music.playbackRate = 1.25
                }
                if (playx0_75){
                    music.playbackRate = 0.75
                }
            }
        }
















        var btn_close_one =  document.querySelectorAll('.asdsaddsadsadasd')
        var de = document.querySelectorAll('.item_song')[0]
        btn_close_one[0].onclick = function (){
            de.remove()
            $('#control_container').addClass('d-none')
            $('#btn_icon_play').addClass('d-flex');
            $('#btn_icon_play').removeClass('d-none');
            $('#btn_icon_pause').removeClass('d-flex');
            $('#btn_icon_pause').addClass('d-none')
            $('#check_song_active').val('')
            isPlaying = false
            play_index-1
            music.pause()
        }
    }
    $('#btn_icon_play').click(function () {
        isPlaying = true
        $('#btn_icon_pause').removeClass('d-none')
        $('#btn_icon_pause').addClass('d-flex')
        $('#btn_icon_play').addClass('d-none')
        $('#btn_icon_play').removeClass('d-flex')
        var check_song_activeval = $('#check_song_active').val()
        $(`#${check_song_activeval}`).removeClass('fa-play')
        $(`#${check_song_activeval}`).addClass('fa-pause')
        music.play()
        if (playx2){
            music.playbackRate = 2
        }
        if (playx1_5){
            music.playbackRate = 1.5
        }
        if (playx1_25){
            music.playbackRate = 1.25
        }
        if (playx0_75){
            music.playbackRate = 0.75
        }
    })
    $('.fa-list').click(function () {
        $('#show_list_song_play').toggleClass('show_list_song_play')
    })
    $('#btn_icon_pause').click(function () {
        isPlaying = false
        $('#btn_icon_play').removeClass('d-none')
        $('#btn_icon_play').addClass('d-flex')
        $('#btn_icon_pause').addClass('d-none')
        $('#btn_icon_pause').removeClass('d-flex')
        $('.icon_status_play').removeClass('fa-pause')
        $('.icon_status_play').addClass('fa-play')
        music.pause()
    })
    function playSong(e) {
        isPlaying = true
        $('#control_container').removeClass('d-none')
        $('#btn_icon_pause').removeClass('d-none')
        $('#btn_icon_pause').addClass('d-flex')
        $('#btn_icon_play').addClass('d-none')
        $('#btn_icon_play').removeClass('d-flex')
        $('#show_name_song_play').text(`${e.target.accessKey} : ${e.target.nonce}`)
        music.play()
        if (playx2){
            music.playbackRate = 2
        }
        if (playx1_5){
            music.playbackRate = 1.5
        }
        if (playx1_25){
            music.playbackRate = 1.25
        }
        if (playx0_75){
            music.playbackRate = 0.75
        }
    }
    $('#next_song').click(function () {
        play_index++
        if (play_index > list_songs.length - 1) {
            play_index = 0
        }
        loadSong(list_songs[play_index].audio)
        $('#show_name_song_play').text(`${list_songs[play_index].name} : ${list_songs[play_index].author}`)
        music.play()
        if (playx2){
            music.playbackRate = 2
        }
        if (playx1_5){
            music.playbackRate = 1.5
        }
        if (playx1_25){
            music.playbackRate = 1.25
        }
        if (playx0_75){
            music.playbackRate = 0.75
        }
        $('.icon_status_play').removeClass('fa-pause')
        $('.icon_status_play').addClass('fa-play')
        $(`#${list_songs[play_index].check}`).removeClass('fa-play')
        $(`#${list_songs[play_index].check}`).addClass('fa-pause')
        $('#check_song_active').val(`${list_songs[play_index].check}`)
        $('#btn_icon_play').removeClass('d-flex');
        $('#btn_icon_play').addClass('d-none');
        $('#btn_icon_pause').addClass('d-flex');
        $('#btn_icon_pause').removeClass('d-none')
        isPlaying = true
    })
    $('#previous_song').click(function () {
        play_index--
        if (play_index < 0) {
            play_index = list_songs.length - 1
        }
        loadSong(list_songs[play_index].audio)
        $('#show_name_song_play').text(`${list_songs[play_index].name} : ${list_songs[play_index].author}`)
        music.play()
        if (playx2){
            music.playbackRate = 2
        }
        if (playx1_5){
            music.playbackRate = 1.5
        }
        if (playx1_25){
            music.playbackRate = 1.25
        }
        if (playx0_75){
            music.playbackRate = 0.75
        }
        $('.icon_status_play').removeClass('fa-pause')
        $('.icon_status_play').addClass('fa-play')
        $(`#${list_songs[play_index].check}`).removeClass('fa-play')
        $(`#${list_songs[play_index].check}`).addClass('fa-pause')
        $('#check_song_active').val(`${list_songs[play_index].check}`)
        $('#btn_icon_play').removeClass('d-flex');
        $('#btn_icon_play').addClass('d-none');
        $('#btn_icon_pause').addClass('d-flex');
        $('#btn_icon_pause').removeClass('d-none')
        isPlaying = true
    })
    function updateProgressBar(e) {
        if (isPlaying) {
            const {duration, currentTime} = e.srcElement;
            const progressPercent = (currentTime / duration) * 100;
            progress.style.width = `${progressPercent}%`
            const durationMinutes = Math.floor(duration / 60);
            let durationSeconds = Math.floor(duration % 60);
            if (durationSeconds < 10) {
                durationSeconds = `0${durationSeconds}`;
            }
            if (durationSeconds) {
                durationEl.textContent = `${durationMinutes}: ${durationSeconds}`;
            }
            const currentMinutes = Math.floor(currentTime / 60);
            let currentSeconds = Math.floor(currentTime % 60);
            if (`${currentTime}`[0]==='6' && addview.length === 1 && `${currentTime}`[1]!=='.'){
                if (addview[0]==='hjnh'){
                    var song_index = list_songs[play_index].indexz
                    axios.get(`${location.protocol + '//' + location.host + '/api/findsongbyid/' + song_index}`).then((rerult) => {
                        var view = rerult.data.views + 1
                        axios.get(`${location.protocol + '//' + location.host + '/api/addview/' + song_index + '/?view=' + view}`).then((res) => {
                            var view_display = document.getElementById(`~!!!~${list_songs[play_index].id}`)
                            view_display.innerText = res.data.views
                        })
                    }).catch((err) => {
                        alert("không có kết nối tới cơ sở dữ liệu")
                        console.log(err)
                    })
                }
                addview[0] = '2'
            }else if (`${currentTime}`[0]==='6' && addview.length === 0 && `${currentTime}`[1]!=='.'){
                addview.push('hjnh')
            }else if (`${currentTime}`[1]!=='.' && `${currentTime}`[1]!=='0') {
                addview.splice(0,1)
            }
            if (currentSeconds < 10) {
                currentSeconds = `0${currentSeconds}`;
            }
            currentTimeEl.textContent = `${currentMinutes}: ${currentSeconds}`;
        }
    }
    music.onended = function () {
        if (isRepeatOne) {
            music.play()
            if (playx2){
                music.playbackRate = 2
            }
            if (playx1_5){
                music.playbackRate = 1.5
            }
            if (playx1_25){
                music.playbackRate = 1.25
            }
            if (playx0_75){
                music.playbackRate = 0.75
            }
        } else if (isRepeat) {
            play_index++
            if (play_index > list_songs.length - 1) {
                play_index = 0
            }
            loadSong(list_songs[play_index].audio)
            $('#show_name_song_play').text(`${list_songs[play_index].name} : ${list_songs[play_index].author}`)
            music.play()
            if (playx2){
                music.playbackRate = 2
            }
            if (playx1_5){
                music.playbackRate = 1.5
            }
            if (playx1_25){
                music.playbackRate = 1.25
            }
            if (playx0_75){
                music.playbackRate = 0.75
            }
            $('.icon_status_play').removeClass('fa-pause')
            $('.icon_status_play').addClass('fa-play')
            $(`#${list_songs[play_index].check}`).removeClass('fa-play')
            $(`#${list_songs[play_index].check}`).addClass('fa-pause')
            $('#check_song_active').val(`${list_songs[play_index].check}`)
        } else {
            if (isRandom){
                var index_random = Math.floor(Math.random() * list_songs.length)
                loadSong(list_songs[index_random].audio)
                music.play()
                if (playx2){
                    music.playbackRate = 2
                }
                if (playx1_5){
                    music.playbackRate = 1.5
                }
                if (playx1_25){
                    music.playbackRate = 1.25
                }
                if (playx0_75){
                    music.playbackRate = 0.75
                }
                $('#show_name_song_play').text(`${list_songs[index_random].name} : ${list_songs[index_random].author}`)
                var key = $('#check_song_active').val()
                $(`#${key}`).removeClass('fa-pause')
                $(`#${key}`).addClass('fa-play')
                $('#check_song_active').val(`${list_songs[index_random].check}`)
                var key1 = $('#check_song_active').val()
                $(`#${key1}`).removeClass('fa-play')
                $(`#${key1}`).addClass('fa-pause')
                play_index = index_random
            }else {
                $('#btn_icon_play').removeClass('d-none')
                $('#btn_icon_play').addClass('d-flex')
                $('#btn_icon_pause').addClass('d-none')
                $('#btn_icon_pause').removeClass('d-flex')
                $('.icon_status_play').removeClass('fa-pause')
                $('.icon_status_play').addClass('fa-play')
                isPlaying = false
            }
        }
    }
    $('#btn_control_repeat').click(function (e) {
        if (Number(e.target.accessKey) === 1) {
            $('#btn_control_repeat').addClass('active_repeat')
            $('#btn_control_repeat').removeClass('active_repeat_one')
            isRepeat = true
            isRepeatOne = false
            e.target.accessKey = 2
        } else if (Number(e.target.accessKey) === 2) {
            $('#btn_control_repeat').addClass('active_repeat_one')
            $('#btn_control_repeat').removeClass('active_repeat')
            isRepeat = false
            isRepeatOne = true
            e.target.accessKey = 3
        } else {
            $('#btn_control_repeat').removeClass('active_repeat_one')
            $('#btn_control_repeat').removeClass('active_repeat')
            isRepeat = false
            isRepeatOne = false
            e.target.accessKey = 1
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
    music.addEventListener('timeupdate', updateProgressBar);
    progressContainer.addEventListener('click', setProgressBar);







    $('#btn_speed').click(function (){
        if ($('#btn_speed').text()==='speed 1x'){
            music.playbackRate = 1.25
            $('#btn_speed').text('speed 1.25x')
            playx0_75 = false
            playx1_25 = true
            playx1_5 = false
            playx2 = false
        }else if ($('#btn_speed').text()==='speed 1.25x'){
            music.playbackRate = 1.5
            $('#btn_speed').text('speed 1.5x')
            playx0_75 = false
            playx1_25 = false
            playx1_5 = true
            playx2 = false
        }else if ($('#btn_speed').text()==='speed 1.5x'){
            music.playbackRate = 2
            $('#btn_speed').text('speed 2x')
            playx0_75 = false
            playx1_25 = false
            playx1_5 = false
            playx2 = true
        }
        else if ($('#btn_speed').text()==='speed 2x'){
            music.playbackRate = 0.75
            $('#btn_speed').text('speed 0.75x')
            playx0_75 = true
            playx1_25 = false
            playx1_5 = false
            playx2 = false
        }else {
            music.playbackRate = 1
            $('#btn_speed').text('speed 1x')
            playx0_75 = false
            playx1_25 = false
            playx1_5 = false
            playx2 = false
        }
    })





    $('.img_publicer').click(function (){
        var user_data = this.slot.split('~!!!~')
        $('#info_publicer_email').text(user_data[0])
        $('#info_publicer_phone').text(user_data[1])
        $('#info_publicer_name').text(user_data[2])
        $('#info_publicer_birthday').text(user_data[3])
        $('#info_publicer_address').text(user_data[4])
        var date1=user_data[9].split('')
        var date=''
        for (let i = 0; i < 10; i++) {
            date+=date1[i]
        }
        $('#info_publicer_join').text(date)
        $('#info_publicer_cover_photo').attr('src',user_data[11])
        $('#info_publicer_avatar').attr('src',user_data[10])
        if (user_data[5]==='null'&&user_data[6]==='null'&&user_data[7]==='null'&&user_data[8]==='null'){
            $('.error_user_info').removeClass('d-none')
            $('.wertyuiop').addClass('d-none')
        }else {
            if (user_data[5]!=='null'){
                $('#facebook_info').removeClass('d-none')
                $('#facebook_info').attr('href',user_data[5])
            }else {
                $('#facebook_info').addClass('d-none')
            }
            if (user_data[6]!=='null'){
                $('#instagram_info').removeClass('d-none')
                $('#instagram_info').attr('href',user_data[6])
            }else {
                $('#instagram_info').addClass('d-none')
            }
            if (user_data[7]!=='null'){
                $('#github_info').removeClass('d-none')
                $('#github_info').attr('href',user_data[7])
            }else {
                $('#github_info').addClass('d-none')
            }
            if (user_data[8]!=='null'){
                $('#twitter_info').removeClass('d-none')
                $('#twitter_info').attr('href',user_data[8])
            }else {
                $('#twitter_info').addClass('d-none')
            }
            $('.error_user_info').addClass('d-none')
        }
        if (user_data[12]==='1'){
            $('#info_publicer_avatar').removeClass('status_admin')
            $('#info_publicer_avatar').addClass('status_user')
            $('#isadmin').addClass('d-none')
        }else {
            $('#info_publicer_avatar').removeClass('status_user')
            $('#info_publicer_avatar').addClass('status_admin')
            $('#isadmin').removeClass('d-none')
        }
    })

    var itemsSearch = document.querySelectorAll(".music_item")
    var searchKey = $('#input_search')

    searchKey.keyup(function (){
        $('div').animate({scrollTop:0}, '400');
        for (let i = 0; i < itemsSearch.length; i++) {
            var check = itemsSearch[i].slot.toLowerCase().search(searchKey.val().toLowerCase())

            if (check === -1){
                itemsSearch[i].classList.add("d-none")
                itemsSearch[i].classList.remove("d-inline-block")
            }
            else{
                itemsSearch[i].classList.remove("d-none")
                itemsSearch[i].classList.add("d-inline-block")
            }
        }
    })

    $('#back_to_top').click(function (){
        $('div').animate({scrollTop:0}, '400');
    })

</script>
