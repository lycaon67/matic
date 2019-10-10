
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- CSRF Token --> 
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="Semantic-UI-CSS-master/semantic.min.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <nav class="ui top fixed transparent borderless fluid menu">
        <div class="ui container">
            <div class="left menu">
                <img src="img/icons/Matik-word-logo-white.png" style="width: 178px!important;">
            </div>
            <div class="right menu">
                <a class="ui item log-in">
                    <i class="icon user"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="team-section">
        <h1>Our Team</h1>
        <span class="border"></span>
        <div class="ps">
            <a href="#team1"><img src="img/team/jawu.jpg" alt=""></a>
            <a href="#team2"><img src="img/team/kisil.jpg" alt=""></a>
            <a href="#team3"><img src="img/team/nikko.jpg" alt=""></a>
            <a href="#team4"><img src="img/team/yayam.jpg" alt=""></a>
        </div>
        <div class="section" id="team1">
            <span class="name">Juan Gray</span>
            <span class="border"></span>
            <p>I am Juan Gray</p>
        </div>
        <div class="section" id="team2">
            <span class="name">Quezel Karm</span>
            <span class="border"></span>
            <p>I am Quezel Karm</p>
        </div>
        <div class="section" id="team3">
            <span class="name">Nikko</span>
            <span class="border"></span>
            <p>I am Nikko</p>
        </div>
        <div class="section" id="team4">
            <span class="name">William Ponce</span>
            <span class="border"></span>
            <p>I am William Ponce</p>
        </div>
    </div>

    <div class="login-box">
        <i class="close icon hide-btn"></i>
        <form action="{{ route('login.custom') }}" method="POST" class="login-form">
            @csrf
            <h1><img src="img/icons/Matik-word-logo-white.png" width="300px" alt=""></h1>    
            <input type="text" class="txtb" placeholder="E-mail address" name="email">
            <input type="password" class="txtb" placeholder="Password" name="password">
            <input type="submit" class="login-btn" value="Login">
        </form>
    </div>

  <script src="js/jquery.3.2.1.min.js"></script>
  <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>
