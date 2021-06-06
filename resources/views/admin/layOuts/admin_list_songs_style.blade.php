<style>
    /* Images created by: https://unsplash.com/@pawel_czerwinski */
    @import url('https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;800&display=swap');

    html {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        min-height: 100vh;
        font-family: sans-serif;
    }

    .player-container {
        width: 70%;
        padding: 0 20px 0 20px;
        box-sizing: border-box;
        border-radius: 20px;
    }

    .img-container {
        height: 300px;
        width: 300px;
        position: relative;
        top: -50px;
        left: 50px;
    }

    .img-container img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 5px 30px 5px rgba(0, 0, 0, 0.5);
    }

    h2 {
        font-size: 25px;
        text-align: center;
        margin: 0;
    }

    h3 {
        font-size: 20px;
        text-align: center;
        font-weight: 400;
        margin: 5px 0 0;
    }

    /* Progress */
    .progress-container {
        background: #ffffff;
        box-shadow: #fc8484 0 0 20px;
        border-radius: 5px;
        cursor: pointer;
        height: 4px;
        width: 100%;
    }

    .progress {
        background: #242323;
        position: relative;
        border-radius: 5px;
        height: 100%;
        width: 0;
        transition: width 0.1s linear;
    }

    .progress:after {
        content: ' ';
        width: 10px;
        display: block;
        position: absolute;
        border-radius: 50%;
        right: 0;
        height: 10px;
        transform: translateY(-3px);
        background: #050505;
    }


    .duration-wrapper {
        position: relative;
        top: -20px;
        height: 0;
        font-size: 12px;
        display: flex;
        justify-content: space-between;
    }

    /* Controls */
    .player-controls {
        text-align: center;
        margin-bottom: 10px;
        width: 100%;
    }


    .fas {
        font-size: 16px;
        transition: 0.6s;
        color: rgb(52, 51, 51);
        width: 50px;
        height: 50px;
        line-height: 50px;
        border-radius: 50%;
        background: #ffffff;
        cursor: pointer;
        box-shadow: black 0 0 5px;
        justify-content: center;
        user-select: none;
    }

    .fas:hover {
        color: rgb(0, 0, 0);
    }

    .main-button {
        font-size: 16px;
        position: relative;
    }

    .controll_audio {
        display: flex;
        position: sticky;
        top: 0;
        background: #f7f7f8;
        padding-top: 10px;
        box-shadow: black 0 0 50px;
        border-radius: 3px;
        z-index: 1000000;
        justify-content: center;
        align-items: center;
    }

    /* Media Query: iPhone (Vertical) */
    @media screen and (max-width: 376px) {
        .player-container {
            width: 95vw;
        }

        .img-container {
            left: 29px;
        }

        h2 {
            font-size: 20px;
        }

        h3 {
            font-size: 15px;
        }

        .player-controls {
            top: -10px;
            left: 100px;
        }
    }
</style>
