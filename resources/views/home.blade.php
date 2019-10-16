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
                My House
                <i id="add-house" class="icon plus square outline create-house"></i> 
            </div>
            <div class="menu side-menu">
                <div class="ui accordion item inverted">
                    @if(count($houses) > 0)
                        @foreach($houses as $house)
                            <div class="title">
                                <a>{{ $house->name }}<i class="setting icon house-setting" onclick="roomfetch({{$house->id}});"></i></a>
                            </div>
                            <div class="content">
                                @if(count($rooms) >= 1)
                                    @foreach($rooms as $room)   
                                        @if($house->id == $room->houseid)   
                                        
                                        <p class="transition hidden">
                                            {{ $room->name }}
                                        </p>
                                        @endif 
                                    @endforeach

                                @else{
                                    <p class="transition hidden">
                                        no room
                                    </p>
                                }
                                @endif
                            </div>
                        @endforeach
                    @endif
                            <div class="title">
                                <a href="#">Logout</a>    
                            </div>
                </div>
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
            {{-- Content header --}}
            <div class="ui grid stackable padded">
                <div class="content">
                    <div class="ui header">
                        House name / Room name / Controls
                    </div>
                </div>
            </div>
            {{-- End of Content header --}}
            
            
            {{-- Control content --}}

            {{-- <div class="ui grid stackable padded">
                <div class="three wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui icon header">
                                <a href="#"><i class="icon massive power red"></i></a>
                                <div class="meta">
                                    Relay 1
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- End of Control Content --}}
            {{-- room management --}}
            <div class="ui grid stackable padded">
                <div class="title">
                    <div class="ui header">
                        Room Management
                        <a href="#"><i class="icon plus create-room"></i></a>
                    </div>
                </div>
            </div>
            <div class="ui grid stackable padded" id="roomlist">
                <div class="three wide computer eight wide tablet sixteen wide mobile column">
                    <div class="ui fluid card">
                        <div class="content">
                            <div class="ui icon header">
                                <a href="#"><i class="icon massive home blue"></i></a>
                                <div class="meta">
                                    Jawu Room
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end of room management --}}
            {{-- Device managment --}}
            <div class="ui grid stackable padded">
                <div class="title">
                    <div class="ui header">
                        Device Management
                        <a href="#"><i class="icon plus add-device"></i></a>
                    </div>
                </div>
            </div>
            
            {{-- end of device management    --}}
            <div class="ui grid stackable padded">
                <div class="column">
                    <table class="ui celled striped table">
                        <thead>
                            <tr>
                                <th colspan="4">
                                Device List
                                </th>
                            </tr>
                            <tr>
                                <th>
                                #
                                </th>
                                <th>
                                    Device Key
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="collapsing">1</td>
                                <td>S5345DJF345WUEN345asdasdqw34534534s</td>
                                <td>Control</td>
                                <td class="right aligned collapsing">Active</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="ui grid stackable padded">
                <div class="four wide computer eight wide tablet sixteen wide mobile  center aligned column">
                    <div class="ui teal statistic">
                        <div class="value">
                        5,550
                        </div>
                        <div class="label">
                        Downloads
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile  center aligned column">
                    <div class="ui purple statistic">
                        <div class="value">
                        50+
                        </div>
                        <div class="label">
                        Developers
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile  center aligned column">
                    <div class="ui green statistic">
                        <div class="value">
                        800+
                        </div>
                        <div class="label">
                        Commits
                        </div>
                    </div>
                </div>
                <div class="four wide computer eight wide tablet sixteen wide mobile  center aligned column">
                    <div class="ui purple statistic">
                        <div class="value">
                        1000+
                        </div>
                        <div class="label">
                        Cups of Coffee
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!-- Modal House -->
    
<div class="ui tiny modal " id="house-modal">
        <i class="close icon"></i>
        <div class="header middle aligned center aligned">
            Build a house
        </div>
        <div class="content">
            <form class="ui form" method="POST" action="{{ route('house.create') }}">
                @csrf
                <div class="field">
                    <div class="ui left icon input">
                        <i class="home icon"></i>
                        <input type="text" placeholder="House Name" id="house-name" name="name" value="{{ old('house-name') }}" required autocomplete="housename" autofocus>
                    </div>
                </div>  
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input id="devicekey" type="text" placeholder="Device key" class="input100 form-control @error('devicekey') is-invalid @enderror" name="devicekey" required autocomplete="devicekey">
                    </div>
                </div>
                <button class="ui fluid positive right labeled icon button float right">BUILD<i class="checkmark icon"></i></button>
            </form>
        </div>
    </div>

<!-- end modal -->
    
<!-- Modal room -->
    
<div class="ui tiny modal " id="room-modal">
    <i class="close icon"></i>
    <div class="header middle aligned center aligned">
        Add Room
    </div>
    <div class="content">
        <form class="ui form" method="POST" action="{{ route('room.create') }}">
            @csrf
            <div class="field">
                <div class="ui left icon input">
                    <i class="home icon"></i>
                    <input type="hidden" id="house-id" name="houseid" value="2">
                    <input type="text" placeholder="Room Name" id="room-name" name="roomname" value="{{ old('room-name') }}" required autocomplete="roomname" autofocus>
                </div>
            </div>  
            <button class="ui fluid positive right labeled icon button float right">Add<i class="checkmark icon"></i></button>
        </form>
    </div>
</div>

<!-- end modal -->

<!-- Modal room -->
    
<div class="ui tiny modal " id="device-modal">
    <i class="close icon"></i>
    <div class="header middle aligned center aligned">
        Add Room
    </div>
    <div class="content">
        <form class="ui form" method="POST" action="{{ route('room.create') }}">
            @csrf
            <div class="field">
                <div class="ui left icon input">
                    <i class="key icon"></i>
                    <input type="hidden" id="house-id" name="houseid" value="2">
                    <input type="text" placeholder="Device Key" id="device-key" name="devicekey" value="{{ old('devicekey') }}" required autocomplete="devicekey" autofocus>
                </div>
            </div>  
            <button class="ui fluid positive right labeled icon button float right">Add<i class="checkmark icon"></i></button>
        </form>
    </div>
</div>

<!-- end modal -->


    <script src="js/jquery.3.2.1.min.js"></script>
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <script src="js/script.js"></script>




{{-- 


	<div class="wrapper">
		<div class="sidebar">
			<div class="main-sidebar">
				<div class="logo">
					<a href="" class="simple-text">
						<img src="img\icons\Matik-word-logo-white.png">
					</a>
				</div>
				<div class="profile">
					<div class="img">
						<img src="PFS_7358 d.png" width="100%">
					</div>
					<h5 class="text-center">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h5>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
			</div>
			<div class="house">
				<h3 class="text-center">House List</h3>
				<h5 data-toggle="modal" data-target="#Createhouse">Owned</h5>
				<ul>
                    @if(count($houses) > 0)
                        @foreach($houses as $house)
                            <li>
                            <h6 data-toggle="collapse" data-target="#{{ $house->name }}" onclick="contentchange(1); myclick({{ $house->id }},'{{ $house->name }}');" id="{{ $house->id }}" >{{ $house->name }}</h6>
                                <ul id="{{ $house->name }}" class="collapse">
                                    @if(count($rooms) > 0)
                                    @foreach($rooms as $room)   
                                        @if($house->id == $room->houseid)                                 
                                        <li data-toggle="collapse">{{ $house->id }} {{ $room->name }}</li>
                                        @endif 
                                    @endforeach
                                    @else{
                                        <li>no room</li>
                                    }
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                    @endif
					
				</ul>

				<h5 onclick="roomfetch()">Member</h5>
				<ul>
					<li>
						<h6 data-toggle="collapse" data-target="#Mansion3">Mansion</h6>
						<ul id="Mansion3" class="collapse">
							<li>Room</li>
							<li>Room</li>
							<li>Room</li>
						</ul>
					</li>
				</ul>
				
			</div>

			<footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <p class="copyright text-center" style="margin:0px;">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="#">MATIC : Home Automation</a>
                        </p>
                    </nav>
                </div>
            </footer>
		</div>


		<div class="main-panel">
			<div class="content">
				<div class="card card-content" id="roommanagement">
					<div class="card-header ">
						<button class="btn active" type="submit" id="rm" onclick="contentchange(1);"><h5>Room Management</h5></button>
						<button class="btn" onclick="contentchange(2);"><h5>Device Management</h5></button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="row col-md-12 col-sm-12 col-12" id="roomtable">                
                                <div class='col-md-3 col-sm-6'>
                                    <a href='#room' data-toggle='modal' data-target='#Createroom'>Add Room</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
					
                </div>
                
                <div class="card card-content" id="devicemanagement"  style="display:none;">
					<div class="card-header ">
						<button class="btn " type="submit" id="rm" onclick="contentchange(1);"><h5>Room Management</h5></button>
						<button class="btn active" onclick="contentchange(2);"><h5>Device Management</h5></button>
					</div>
					<div class="card-body">
                        <div class="row">
                            @if(count($houses) > 0)
                                @foreach($houses as $house)   
                                    @if($house->id == 2)                                 
                                    <div class="col-md-3 col-sm-6">
                                        <a href="#">{{ $house->devicekey }}</a>
                                    </div>
                                    @endif 
                                @endforeach
                            @else
                                <li style="list-style-type: none;margin-left: -25px;">no room</li>
                            
                            @endif
                            <div class="col-md-3 col-sm-6">
                                <a href="#room" data-toggle="modal" data-target="#deviceadd">Add Room</a>
                            </div>
                        </div>
					</div>
                </div>
                
                <div class="card card-content" style="display:none;">
                    <div class="card-header">
                        <h2>Mansion1 / Guest room</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="card col-md-3 col-sm-6 relay text-center">
                                <button>On</button>
                                <span>Name</span>
                                <small>Channel 1</small>
                            </div>
                            <div class="card col-md-3 col-sm-6 relay text-center">
                                <button>On</button>
                                <span>Name</span>
                                <small>Channel 1</small>
                            </div>
                            <div class="card col-md-3 col-sm-6 relay text-center">
                                <button>On</button>
                                <span>Name</span>
                                <small>Channel 1</small>
                            </div>
                            <div class="card col-md-3 col-sm-6 relay text-center">
                                <button>On</button>
                                <span>Name</span>
                                <small>Channel 1</small>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
    </div>
    
<!-- Mini Modal room add-->
    <div class="modal fade modal-mini modal-primary" id="Createroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" data-color="blue">
            <div class="modal-content" style="background:blue;">
                <div class="modal-header justify-content-center">
                    <img src="img\icons\Matik-word-logo-white.png" style="width: 300px;">
                </div>
                <div class="modal-body text-center">
                    <h2 class="text-center" style="margin-top: 10px!important; color: white;">Build a Room</h2>
                    
                    <form method="POST" action="{{ route('room.create') }}">
                       @csrf
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                        <input type="text" class="form-control" id="housenamemodal"  required name="housename" disabled>
                                        <input type="text" class="form-control" id="houseidmodal"  required name="houseid" >
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Room Name" required name="roomname">
                                </div>
                            </div>
                        </div>
    
                        
                        <button type="submit" class="btn btn-info btn-fill pull-right mb-3">Constract</button>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->

<!-- Mini Modal device add-->
<div class="modal fade modal-mini modal-primary" id="deviceadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" data-color="blue">
        <div class="modal-content" style="background:blue;">
            <div class="modal-header justify-content-center">
                <img src="img\icons\Matik-word-logo-white.png" style="width: 300px;">
            </div>
            <div class="modal-body text-center">
                <h2 class="text-center" style="margin-top: 10px!important; color: white;">add device</h2>
                
                <form method="POST" action="{{ route('device.add') }}">
                   @csrf
                   <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="housenamemodal1"  required name="housename">
                                <input type="text" class="form-control" id="houseidmodal1"  required name="houseid" >
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Device Key" required name="devicekey">
                            </div>
                        </div>
                    </div>

                    
                    <button type="submit" class="btn btn-info btn-fill pull-right mb-3">Constract</button>  
                </form>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->

<!-- Mini Modal -->
<div class="modal fade modal-mini modal-primary" id="Createhouse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" data-color="blue">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <img src="img\icons\Matik-word-logo-white.png" style="width: 300px;">
            </div>
            <div class="modal-body text-center">
                <h2 class="text-center" style="margin-top: 10px!important; color: white;">Build a House</h2>
                
                <form method="POST" action="{{ route('house.create') }}">
                   @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="House Name" required name="name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Product Key" required name="devicekey">
                            </div>
                        </div>
                    </div>  
                    <button type="submit" class="btn btn-info btn-fill pull-right mb-3">Build House</button>  
                </form>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->


<!--   Core JS Files   -->
<script src="js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="js/core/popper.min.js" type="text/javascript"></script>
<script src="js/core/bootstrap.min.js" type="text/javascript"></script>

<!-- js -->
<script type="text/javascript">
    
    const addRoom = {
        housename: document.getElementById('housenamemodal'),
        houseid: document.getElementById('houseidmodal'),
        housename1: document.getElementById('housenamemodal1'),
        houseid1: document.getElementById('houseidmodal1')
    }
    
    function myclick(hid,pbb){
        addRoom.housename.value = pbb;
        addRoom.houseid.value = hid;
        addRoom.housename1.value = pbb;
        addRoom.houseid1.value = hid;
        console.log(hid,pbb);
        roomfetch(addRoom.houseid.value);
    }

    function contentchange(num){
        var content1 = document.getElementById('roommanagement');
        var content2 = document.getElementById('devicemanagement');
        console.log(num);
        if(num == 1){
            content2.style.display = "none";
            content1.style.display = "flex";
            
        }
        if(num == 2){
            content1.style.display = "none";
            content2.style.display = "flex";
        }

    }
    
    function roomfetch(hid){
    
        $.ajax({
            url: 'room/show/'+hid,
            type: 'get',
            dataType: 'json',
            success: function(response){
                var len = 0;
                $('#roomtable').empty();
                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){
                    for(var i=0; i<len; i++){
                        var id = response['data'][i].id;
                        var houseid = response['data'][i].houseid;
                        var name = response['data'][i].name;
                        
                        var tr_str = "<div class='col-md-3 col-sm-6'>"+ name + "</div>";
                            
                        $("#roomtable").append(tr_str);
                    }
                }            
                var addroom = "<div class='col-md-3 col-sm-6'><a href='#room' data-toggle='modal' data-target='#Createroom'>Add Room</a></div>";
                $("#roomtable").append(addroom);
            }
        });
    }    
</script> --}}

</body>
</html>








