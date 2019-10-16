<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matic: Home Automation</title>

    <link rel="stylesheet" href="Semantic-UI-CSS-master/semantic.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="layout pushable">
    <!-- Sidebar -->
    <div class="ui sidebar inverted vertical menu sidebar-menu" id="sidebar">
        <div class="item ">
            <img src="img/icons/Matik-word-logo-white.png" style="width: 178px!important;">    
        </div>        
        <div class="item divider">
            <div class="card">
                <div class="content">
                    <img class="right floated mini ui image" src="img/jenny.jpg">
                    <div class="header">
                        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                    </div>
                    <div class="meta">
                        {{ Auth::user()->email }}
                    </div>
                </div>
            </div>
        </div>
        <div class="item divider">
            <div class="header">
                <i class="icon home alternate"></i>
                Add Device
                <i id="add-house" class="icon plus square outline create-house"></i> 
            </div>
            <div class="menu side-menu">
            </div>  
        </div>
    </div>
    <!-- End Sidebar -->
    

    <!-- Topbar -->
    <nav class="ui top fixed inverted menu">
        <div class="left menu">
            <a class="sidebar-menu-toggler item" data-target="#sidebar">
                <i class="sidebar icon"></i>
            </a>
        </div>
        <div class="right menu">
            <div class="item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a> 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf      
                </form>
            </div>
        </div>
    </nav>
    <!-- End Topbar -->
    <!-- Pusher -->
    <div class="pusher">
        <div class="main-content">
        <div class="ui huge four statistics">
  <div class="statistic">
  </div>
  <div class="teal statistic">
    <div class="value">
      23
    </div>
    <div class="label">
      Device Count
    </div>
  </div>
  <div class="yellow statistic">
    <div class="value">
     6
    </div>
    <div class="label">
      Active Device
    </div>
  </div>
    </div>
    <div class="ui clearing divider"></div>

            <table class="ui fixed table">
            <thead>
                 <tr><th>Device</th>
                 <th>House ID</th>
                 <th>Device Key</th>
                 <th>Device Type</th>
                 <th>Status</th>
                 <th>Date Created</th>

                 </tr></thead>
            <tbody>
             <tr>
                 <td>1</td>
                 <td>1</td>
                 <td>qwe1234</td>
                 <td>C</td>
                 <td>Active</td>
                 <td>00-00-0000</td>
             </tr>
             <tr>
                 <td>2</td>
                 <td>2</td>
                 <td>rwe123</td>
                 <td>S</td>
                 <td>Not Active</td>
                 <td>00-00-0000</td>
             </tr>
             <tr>
                 <td>3</td>
                 <td>3</td>
                 <td>tyu123</td>
                 <td>S</td>
                 <td>Active</td>
                 <td>00-00-0000</td>
             </tr>
            </tbody>
            </table>
            </div>
            </div>
    
<!-- Modal House -->
    
<div class="ui tiny modal " id="house-modal">
        <i class="close icon"></i>
        <div class="header middle aligned center aligned">
            Add Device
        </div>
        <div class="content">
            <form class="ui form" method="POST" action="{{ route('house.create') }}">
                @csrf
                <div class="field">
                    <div class="ui left icon input">
                        <i class="home icon"></i>
                        <input type="text" placeholder="Device Key" id="devicekey" name="name" value="{{ old('devicekey') }}" required autocomplete="devicekey" autofocus>
                    </div>
                </div>
                <div class="ui fluid selection dropdown">
                        <input type="hidden" name="user">
                        <i class="dropdown icon"></i>
                        <div class="default text">Control</div>
                            <div class="menu">
                             <div class="item" data-value="jenny">
                             <img class="ui mini avatar image" src="/images/avatar/small/jenny.jpg">
                             Control
                             </div>
                             <div class="item" data-value="elliot">
                             <img class="ui mini avatar image" src="/images/avatar/small/elliot.jpg">
                             Security
                             </div>
                             <div class="item" data-value="stevie">
                             <img class="ui mini avatar image" src="/images/avatar/small/stevie.jpg">
                             Maintain
                         </div>
                        </div>
                            </div>
                <button class="ui fluid positive right labeled icon button float right">BUILD<i class="checkmark icon"></i></button>
            </form>
        </div>
    </div>

<!-- end modal -->
    


    <script src="js/jquery.3.2.1.min.js"></script>
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="js/script.js"></script>




</body>
</html>








