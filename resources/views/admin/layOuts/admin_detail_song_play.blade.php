<script>
    const title = document.getElementById('title');
    const music = document.querySelector('audio');
    const progressContainer = document.getElementById('progress-container');
    const progress = document.getElementById('progress');
    const currentTimeEl = document.getElementById('current-time');
    const durationEl = document.getElementById('duration');
    const playBtn = document.getElementById('play');

    // Check if Playing
    let isPlaying = false;
    let isPlaycheck = false
    // Play & Pause
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
        isPlaycheck = true
        music.pause();
    }

    // Play or Pause Event Listener
    // playBtn.addEventListener('click', () => (isPlaying ? pauseSong() : playSong()));
    function loadSong(song) {
        music.src = song;
    }
    playBtn.onclick=function (){
        if (isPlaying) {
            pauseSong()
        }else {
            if (isPlaycheck === false){
                loadSong(this.slot);
                playSong()
            }else {
                playSong()
            }

        }
    }

    // Update DOM



    function updateProgressBar(e) {
        if (isPlaying) {
            const { duration, currentTime } = e.srcElement;
            // Update progress bar width
            const progressPercent = (currentTime / duration) * 100;
            progress.style.width = `${progressPercent}%`
            // Calculate display for duration
            const durationMinutes = Math.floor(duration/60);
            let durationSeconds = Math.floor(duration % 60);
            if (durationSeconds < 10) {
                durationSeconds = `0${durationSeconds}`;
            }
            // Delay switching duration Element to avoid NaN
            if (durationSeconds) {
                durationEl.textContent = `${durationMinutes}: ${durationSeconds}`;
            }
            // Calculate display for current time
            const currentMinutes = Math.floor(currentTime/60);
            let currentSeconds = Math.floor(currentTime % 60);
            if (currentSeconds < 10) {
                currentSeconds = `0${currentSeconds}`;
            }
            currentTimeEl.textContent = `${currentMinutes}: ${currentSeconds}`;
            var a = `${currentTimeEl.textContent}`
            var b = `${durationEl.textContent}`
            if (a===b){
                loadSong(playBtn.slot);
                playSong()
            }
        }
    }

    // Set Progress Bar
    function setProgressBar(e) {
        const width = this.clientWidth;
        const clickX = e.offsetX;
        const { duration } = music;
        music.currentTime = (clickX/width) * duration;
    }

    // On Load - Select First Song



    music.addEventListener('timeupdate', updateProgressBar);
    progressContainer.addEventListener('click', setProgressBar);
</script>
