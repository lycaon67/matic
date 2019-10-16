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
            {{ count($devices) }}
          </div>
          <div class="label">
            Device Count
          </div>
        </div>
        <div class="yellow statistic">
          <div class="value">
            0
          </div>
          <div class="label">
            Active Device
          </div>
        </div>
    </div>
    <div class="ui clearing divider"></div>
      <table class="ui fixed table">
        <thead>
          <tr>
            <th>Device #</th>
            <th>Device Key</th>
            <th>Key Password</th>
            <th>Type</th>
            <th>House #</th>
            <th>Status</th>
            {{-- <th>Date Created</th> --}}
          </tr>
        </thead>
        <tbody>
          @if(count($devices))
            @foreach($devices as $device)
              <tr>
                <td>{{ $device->id }}</td>
                <td>{{ $device->key }}</td>
                <td>{{ $device->keypass }}</td>
                <td>{{ $device->type }}</td>
                <td>{{ $device->houseid }}</td>
                <td>{{ $device->status }}</td>
              </tr>
            @endforeach
          @endif
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
            <form class="ui form" method="POST" action="{{ route('device.create') }}">
                @csrf
                <input type="hidden" name="devicekey" placeholder="Device Key" id="device-key">
                <input type="hidden" name="keypass" placeholder="Key Password" id="keypass">
                <div class="ui fluid selection dropdown mb-2">
                  <input type="hidden" name="type">
                  <i class="dropdown icon"></i>
                  <div class="default text" data-value="Control">Control</div>
                  <div class="menu">
                    <div class="item" data-value="Control">Control</div>
                    <div class="item" data-value="Security">Security</div>
                    <div class="item" data-value="Monitor">Monitor</div>
                  </div>
                </div>
                <button class="ui fluid positive right labeled icon button float right" onclick="uuidv4()">BUILD<i class="checkmark icon"></i></button>
            </form>
        </div>
    </div>
<!-- end modal -->
    
  <script src="js/jquery.3.2.1.min.js"></script>
  <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
  <script src="js/script.js"></script>

  <script>
    function uuidv4() {
      var key = 'xxxxxxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 36 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(36);
      });
      var keypass = 'xxxxxxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
        var r = Math.random() * 36 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(36);
      });
      
      $('#keypass').val(keypass);
      $('#device-key').val(key);
    }  
  </script>
</body>
</html>





