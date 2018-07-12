<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Resume</title>
    <meta name="keywords" content="Блог, IT, гаджеты, PHP, програмирование">
    <meta name="description" content="Актуальные новости из мира програмирования и гаджетов">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous">
    </script>
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
          crossorigin="anonymous">
    <link rel="stylesheet" href="/css/landing.css">
    <link rel="stylesheet" type="text/css"
          media="only screen and (max-width: 720px), only screen and (max-device-width: 480px)"
          href="/css/landing_mobile.css" />
    <script src="/js/landing.js"></script>
</head>

<body>
    <nav id="menu">
        <a id="menu-button" href="#">
            <span class="menu-button-bar"></span>
        </a>

        <div id="menu-slider">
            <div id="menu-header">
                <h3 id="menu-header-title">{{$user->name}}</h3>
                <h4 id="menu-header-subtitle">Web Developer</h4>
            </div>

            <ul id="menu-list">
                <li>
                    <span class="menu-icon">
                        <i class="fas fa-home"></i>
                    </span>
                    <a href="#header-slider">Home</a>
                </li>

                <li>
                    <span class="menu-icon">
                        <i class="fas fa-user-tie"></i>
                    </span>
                    <a href="#about-me-section">About me</a>
                </li>

                <li>
                    <span class="menu-icon">
                        <i class="fas fa-code-branch"></i>
                    </span>
                    <a href="#">Work Experience</a>
                </li>

                <li>
                    <span class="menu-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </span>
                    <a href="#">Education</a>
                </li>

                <li>
                    <span class="menu-icon">
                        <i class="far fa-chart-bar"></i>
                    </span>
                    <a href="#">Skills</a>
                </li>

                <li>
                    <span class="menu-icon">
                        <i class="fas fa-briefcase"></i>
                    </span>
                    <a href="#">Portfolio</a>
                </li>

                <li>
                    <span class="menu-icon">
                        <i class="fas fa-handshake"></i>
                    </span>
                    <a href="#">Hire me</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="landing-container" class="container-fluid">
        <header id="header">
            <div id="header-slider" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption">
                            <h1>Let's Make Something Great</h1>
                            <p>Web aplication of your dream</p>
                        </div>
                        <img class="d-block w-100" src="/img/slide_1.jpg" alt="First slide">
                        <div class="carousel-shadow-transparent"></div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <h1>Designing & Developing</h1>
                            <p>All stages of development</p>
                        </div>
                        <img class="d-block w-100" src="/img/slide_2.jpg" alt="Second slide">
                        <div class="carousel-shadow-transparent"></div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <h1>{{$user->name}}</h1>
                            <p>Frontend & Backend Developer</p>
                        </div>
                        <img class="d-block w-100" src="/img/slide_3.jpg" alt="Third slide">
                        <div class="carousel-shadow-transparent"></div>
                    </div>
                </div>

                <div id="carousel-button-wrapper">
                    <a id="carousel-button" href="#">
                        Hire Me
                    </a>
                </div>

                <a class="carousel-control-prev" href="#header-slider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#header-slider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>

        @include('about', array('user' => $user))
    </div>
</body>
</html>
