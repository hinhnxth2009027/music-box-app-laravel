<!DOCTYPE html>
<html lang="en">
<head>
    @include('.user.layout.head')
    <style>
        ::-webkit-scrollbar {
            width: 0;
        }
    </style>
    <title>Music box || About us</title>
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
            <div id="user_show_profile" class="container-fluid ">
                <div class="row">
                    {{--                    ở đây còn html --}}
                    <div class="col-md-6 col-12 col-sm-12 m-auto" style="overflow: hidden">
                        <div class="col-12">
                            <h3>About us</h3>
                        </div>
                        <div class="card card-user">
                            <div class="card-image" style="height: 200px !important;">
                                <img
                                    src="http://res.cloudinary.com/kee/image/upload/v1621484714/luab6fxuowggftmla26y.jpg">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <img class="avatar border-gray"
                                         src="http://res.cloudinary.com/kee/image/upload/v1621152416/annyjvwlv2ydvuyhks9s.png"
                                         style="">
                                    <h5 class="title text-primary">MUSIC BOX</h5>
                                    <table class="table table-striped">
                                        <thead>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Company</th>
                                            <td>KeeKee Studio</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Category</th>
                                            <td>Music</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Style</th>
                                            <td>Youthful</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Public of Date</th>
                                            <td>20-05-2021</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Time complete</th>
                                            <td>20 days</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Other platform</th>
                                            <td>Mobile - Desktop</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Sponsored from</th>
                                            <td>Vietnam Airlines - VinGroup</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Partner</th>
                                            <td><span class="text-danger">Youtube </span> - <span class="text-primary"> Facebook</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Technology</th>
                                            <td>- HTML 5 <br>
                                                - Css 3 <br>
                                                - Bootstrap 4 <br>
                                                - JavaScript ES6<br>
                                                - Jquery 3.6 <br>
                                                - Laravel 8 <br>
                                                - DB Mysql <br>
                                                - Cloud dinary
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="box_shadow"></div>
                            <hr>
                            <div class="button-container mr-auto ml-auto d-flex flex-wrap justify-content-center" style="min-height: 50px">
                                <a style="width: 110px;margin: 2px 2px" target="_blank" href="https://www.facebook.com/MixiGaming" class="btn btn-warning">FanPage</a>
                                <a style="width: 110px;margin: 2px 2px" target="_blank" href="https://www.youtube.com/channel/UCA_23dkEYToAc37hjSsCnXA" class=" btn btn-danger">Youtube</a>
                                <a style="width: 110px;margin: 2px 2px" target="_blank" href="https://www.facebook.com/dophung1989" class="btn btn-primary">Facebook</a>
                                <a style="width: 110px;margin: 2px 2px" target="_blank" href="https://www.facebook.com/groups/1212236082236816" class="btn btn-warning">Group</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="user_show_profile" class="container-fluid ">
                <div class="row">
                    {{--                    ở đây còn html --}}
                    <div class="col-md-6 col-12 col-sm-12 m-auto" style="overflow: hidden">
                        <div class="col-12">
                            <h3>About the author</h3>
                        </div>
                        <div class="card card-user">
                            <div class="card-image" style="height: 200px !important;">
                                <img
                                    src="http://res.cloudinary.com/kee/image/upload/v1621484358/wprn2powqem8mmqrzsts.jpg">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <img class="avatar border-gray"
                                         src="https://lh3.googleusercontent.com/s4W5DCwhoUb7kvGXaC8FSFLk7kQniuoOJ8DrCGKZQxxfboXv3PNPdMoyGz58LgZl3KqBiheHkQTQZtPwarAFe4pHt9NFRs9rjXTDm_2BUblVcQ0i5IoyxKnTlDPk0Y1vqxqfzpZ491TW3yy4NVSrkkKFIDU6nKAIH1bC8-XVPDx8MZZcJRUtVWm7rHjxeD-96NTYlcKnXZcFjSFbNIBLczvmwOQVTmQlP-9oyk89LBHV1mqw5mX4XiBT4FpzWAw8Ra3REqLdtTxKtuXv9b-uXpAiQt0LYyG6U8hF4VHx6hCAALKvzYDOI8ZJkq7iXxVy2vsO10GJhAA6Q3BNF3zNrUJh0HUr9FFZoa1hAC0zsOXVyig5u5fiYnbpXyZ7AXbTDgENA5TWTzbEDFWW742oLlApJLqdK4PLRg2MfdEDgtigz7a6xabp_bdA2aDUkti9gZ_c3kE98S_CgAEp5bRuTxGu-W75k_AZoaow23GCwycoxQBbl05nck6UfdNZVMySHz3uzA4fYWV-eDT44lSfGsSXc_IaZr64_zQWB1B46mYNLxbn--Lf2ZeTJUfDpvOn53zIYGxavsfyatUeVgiQUxbRMpsZnH2PCH6C9AnPCQHP7dPYFJiYnzjpZksvbuDa0Cq3ttV7WCrlKXMN9PCNmxYtOPUfk_TAmtuF3PtXLmdXqTFb4k8q_8GV4v-UOkww3dBOCSfwE0Ndu7keAuWvjRU=w888-h937-no?authuser=0"
                                         style="">
                                    <h5 class="title text-primary">Nguyen Xuan Hjnh</h5>
                                    <table class="table table-striped">
                                        <thead>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td>0369042217</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Birthday</th>
                                            <td>14-03-2002</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email 1</th>
                                            <td>nguyenhjnh2002@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email 2</th>
                                            <td>hinhnxth2009027@fpt.edu.vn</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Address</th>
                                            <td>Kim quan , Thach That , Tp Ha Noi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Student at school</th>
                                            <td>FPT aptech Ha Noi</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="box_shadow"></div>
                            <hr>
                            <div class="button-container mr-auto ml-auto">
                                <a target="_blank" href=""
                                   class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-facebook-square" style="color: #2868ec"></i>
                                </a>
                                <a target="_blank" href=""
                                   class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-instagram" aria-hidden="true"
                                       style="color: rgba(255,0,251,0.85)"></i>
                                </a>
                                <a target="_blank" href=""
                                   class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-github" aria-hidden="true" style="color: rgba(0,0,0,0.85)"></i>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="check_nav_active" value="about">
@include('.user.layout.script')
</body>
</html>
