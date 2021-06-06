<script>
    const title = document.getElementById('title');
    const music = document.querySelector('audio');
    const progressContainer = document.getElementById('progress-container');
    const progress = document.getElementById('progress');
    const currentTimeEl = document.getElementById('current-time');
    const durationEl = document.getElementById('duration');
    const playBtn = document.getElementById('play');
    let isPlaying = false;
    function playSong() {
        isPlaying = true;
        playBtn.classList.replace('fa-play', 'fa-pause');
        playBtn.setAttribute('title', 'Pause');
        music.play();
    }
    function pauseSong() {
        isPlaying = false;
        playBtn.classList.replace('fa-pause', 'fa-play');
        playBtn.setAttribute('title', 'Play');
        music.pause();
    }
    playBtn.addEventListener('click', () => (isPlaying ? pauseSong() : playSong()));
    function loadSong(song) {
        music.src = song;
    }
    function updateProgressBar(e) {
        if (isPlaying) {
            const { duration, currentTime } = e.srcElement;
            const progressPercent = (currentTime / duration) * 100;
            progress.style.width = `${progressPercent}%`
            const durationMinutes = Math.floor(duration/60);
            let durationSeconds = Math.floor(duration % 60);
            if (durationSeconds < 10) {
                durationSeconds = `0${durationSeconds}`;
            }
            if (durationSeconds) {
                durationEl.textContent = `${durationMinutes}: ${durationSeconds}`;
            }
            const currentMinutes = Math.floor(currentTime/60);
            let currentSeconds = Math.floor(currentTime % 60);
            if (currentSeconds < 10) {
                currentSeconds = `0${currentSeconds}`;
            }
            currentTimeEl.textContent = `${currentMinutes}: ${currentSeconds}`;
            var a = `${currentTimeEl.textContent}`
            var b = `${durationEl.textContent}`
            if (a===b){
                $('.controll_audio').hide()
            }
        }
    }
    function setProgressBar(e) {
        const width = this.clientWidth;
        const clickX = e.offsetX;
        const { duration } = music;
        music.currentTime = (clickX/width) * duration;
    }
    $('.btn_play_song_admin').click(function (){
        $('.controll_audio').show()
        var text = (this.slot).split("~!~!~")
        $('#show_song_name').text(text[1])
        $('#show_author_name').text(text[2])
        pauseSong()
        $('#audio_play').val(text[0])
        loadSong(document.getElementById('audio_play').value);
        playSong()
    })
    $('#music_close').click(function (){
        pauseSong()
        $('.controll_audio').hide()
    })
    music.addEventListener('timeupdate', updateProgressBar);
    progressContainer.addEventListener('click', setProgressBar);
</script>
